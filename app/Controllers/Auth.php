<?php

namespace App\Controllers;

use App\Models\Users;
use Rodrigotutz\Controller;
use App\Helpers\Mail;

class Auth extends Controller {
    
    private $user;
    private $email;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
        $this->user = new Users();
        $this->email = new Mail();
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

        if(!$this->user->save()) {
            $this->router->redirect("web.home", ["error" => $this->user->fail()->getMessage()]);
        }
        
        $this->email->add(
            "Confirme a criação da sua conta",
            $this->view->render("mail/email", [
                "user" => $this->user,
                "messageTitle" => "Sua conta foi criada!",
                "message" => "Para continuar basta clicar no botão abaixo para confirmar seu e-mail",
                "action" => "Confirmar e-mail",
                "link" => $this->router->route("auth.confirm", [
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

        $_SESSION["userId"] = $userByEmail->id;
        $_SESSION['userType'] = $userByEmail->type;
        $this->router->redirect("app.index");
    }

    public function logout() {
        session_destroy();
        $this->router->redirect("web.home",[
            "info" => "logout"
        ]);
    }

    public function newPass($data) {
        $oldPass = filter_var($data['password'], FILTER_DEFAULT);
        $newPass = filter_var($data['newpass'], FILTER_DEFAULT);

        $userBySession = $this->user->findById($_SESSION['userId']);

        if(!$oldPass || !$newPass) {
            $this->router->redirect("app.me", [
                "error" => "invalid-fields"
            ]);
        }

        if(!password_verify($oldPass, $userBySession->password)) {
            $this->router->redirect("app.me", [
                "error" => "invalid-old-pass"
            ]);
        }

        $userBySession->password = $newPass;
        
        if(!$userBySession->save()) {
            $this->router->redirect("app.me", [
                "error" => $userBySession->fail()
            ]);
        }

        $this->router->redirect("app.me", [
            "success" => "pass-updated"
        ]);
        
    }

    public function resetPass($data) {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        
        if(!$email) {
            $this->router->redirect("web.alterpass", [
                "error" => "invalid-fields"
            ]);
        }
        
        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail) {
            $this->router->redirect("web.alterpass", [
                "error" => "email-not-found"
            ]);
        }
        
        $userByEmail->confirm_token = md5(rand());

        $this->email->add(
            "Altere a sua senha!",
            $this->view->render("mail/email", [
                "user" => $this->user,
                "messageTitle" => "Altere a sua senha",
                "message" => "Para alterar a sua senha basta clicar no botão abaixo",
                "action" => "Alterar senha",
                "link" => $this->router->route("web.newkey", [
                    "email" => $userByEmail->email,
                    "token" => $userByEmail->confirm_token
                ])
            ]),
            $userByEmail->first_name,
            $userByEmail->email
        );

        if(!$this->email->send()) {
            $this->router->redirect("web.alterpass", ["error" => "not-allowed"]);
        }
        
        if(!$userByEmail->save()) {
            $this->router->redirect("web.alterpass", ["error" => $userByEmail->fail()->getMessage()]);
        }
    
        $this->router->redirect("web.alterpass", ["success" => "user-created"]);

    }
}