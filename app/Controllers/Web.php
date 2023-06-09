<?php

namespace App\Controllers;

use App\Helpers\Mail;
use App\Models\User;
use Rodrigotutz\Controller;

class Web extends Controller {

    private $user;
    private $email;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages/");
        if(isset($_SESSION['userId'])) {
            $this->router->redirect("app.index");
        }
        $this->user = new User();
        $this->email = new Mail();
    }

    public function home(): void {

        $this->view->addData([
            "title" => "Página Inicial | " . getenv("APP_NAME"),
        ]);
        echo $this->view->render("web/login");
    }

    public function login($data) {

        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $passwd = filter_var($data['passwd'], FILTER_DEFAULT);

        if(!$email || !$passwd) {
            $this->router->redirect("web.home", [
                "error" => "invalid-fields"
            ]);
        }

        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail || !password_verify($passwd, $userByEmail->password)) {
            $this->router->redirect("web.home", [
                "error" => "invalid-auth"
            ]);
        }

        if($userByEmail->confirmed_at === null) {
            $this->router->redirect("web.home", ["warning" => "user-not-confirmed"]);
        }

        $_SESSION['userId'] = $userByEmail->id;

        $this->router->redirect("app.index");
    }

    public function register($data): void {
        $first_name =  filter_var($data['first_name'], FILTER_DEFAULT);
        $last_name = filter_var($data['last_name'], FILTER_DEFAULT);
        $email =  filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($data['password'], FILTER_DEFAULT);
        $password_re =  filter_var($data['password_re'], FILTER_DEFAULT);

        if(!$first_name || !$last_name || !$email || !$password || !$password_re) {
            $this->router->redirect("web.home", ["error" => "invalid-fields"]);
        }

        if($password != $password_re) {
            $this->router->redirect("web.home", ["error" => "different-passwords"]);
        }

        $this->user->first_name = $first_name;
        $this->user->last_name = $last_name;
        $this->user->email = $email;
        $this->user->password = $password;
        $this->user->confirm_token = md5(rand());

        $this->email->add(
            "Confirme a criação da sua conta",
            $this->view->render("mail/email", [
                "user" => $this->user,
                "link" => $this->router->route("web.confirm", [
                    "email" => $this->user->email,
                    "token" => $this->user->confirm_token
                ])
            ]),
            $this->user->first_name,
            $this->user->email
        );

        if(!$this->email->send()) {
            $this->router->redirect("web.home", ["error" => "not-allowed"]);
        }
        
        if(!$this->user->save()) {
            $this->router->redirect("web.home", ["error" => $this->user->fail()->getMessage()]);
        }

    
        $this->router->redirect("web.home", ["success" => "user-created"]);
    }

    public function confirm($data) {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $token = filter_var($data['token'], FILTER_DEFAULT);

        if(!$email || !$token) {
            $this->router->redirect("web.home", ["error" => "not-allowed"]);
        }

        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail || $token != $userByEmail->confirm_token) {
            $this->router->redirect("web.home", ["error" => "not-allowed"]);
        }

        $userByEmail->confirmed_at = date("Y/m/d");
        $userByEmail->confirm_token = null;

        $userByEmail->save();

        $this->view->addData([
            "title" => "E-mail Confirmado com sucesso"
        ]);
        echo $this->view->render("web/confirmed");
    }

}