<?php

namespace App\Controllers;

use App\Models\User;
use Rodrigotutz\Controller;

class Web extends Controller {

    private $user;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages/");
        if(isset($_SESSION['userId'])) {
            $this->router->redirect("app.index");
        }
        $this->user = new User();
    }

    public function home(): void {

        $this->view->addData([
            "title" => "Página Inicial | " . getenv("APP_NAME"),
        ]);
        echo $this->view->render("web/home");
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

        if(!$userByEmail || !password_verify($passwd, $userByEmail->passwd)) {
            $this->router->redirect("web.home", [
                "error" => "invalid-auth"
            ]);
        }

        $_SESSION['userId'] = $userByEmail->id;

        $this->router->redirect("app.index");
    }

}