<?php

namespace App\Controllers;

use Rodrigotutz\Controller;
use App\Models\Users;

class Web extends Controller {

    private $user;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages/");
        if(isset($_SESSION['userId'])) {
            $this->router->redirect("app.index");
        }

        $this->user = new Users();
    }

    public function home(): void {

        $this->view->addData([
            "title" => "Página Inicial | " . getenv("APP_NAME"),
        ]);
        echo $this->view->render("web/login");
    }

    public function alterpass(): void {
        $this->view->addData([
            "title" => "Altere a sua senha | " . getenv("APP_NAME"),
        ]);
        echo $this->view->render("web/alterpass");
    }

    public function newKey($data) {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $token = filter_var($data['token'], FILTER_DEFAULT);

        if(!$email || !$token) {
            $this->router->redirect("web.alterpass", [
                "error" => "not-allowed"
            ]);
        }

        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail) {
            $this->router->redirect("web.alterpass", [
                "error" => "email-not-found"
            ]);
        }

        if($token != $userByEmail->confirm_token) {
            $this->router->redirect("web.alterpass", [
                "error" => "not-allowed"
            ]);
        }

        if(isset($data['pass'])) {
            $pass = filter_var($data['pass'], FILTER_DEFAULT);
            $passre = filter_var($data['passre'], FILTER_DEFAULT);
            if($data['pass'] === "" || $data['passre'] === "") {
                $this->router->redirect("web.newkey", [
                    "email" => $data['email'],
                    "token" => $data['token'],
                    "error" => "invalid-fields"
                ]);
            }

            if(!$pass || !$passre) {
                $this->router->redirect("web.newkey", [
                    "email" => $data['email'],
                    "token" => $data['token'],
                    "error" => "invalid-fields"
                ]);  
            }

            if($pass != $passre) {
                $this->router->redirect("web.newkey", [
                    "email" => $data['email'],
                    "token" => $data['token'],
                    "error" => "different-passwords"
                ]);
            }

            $userByEmail->password = $pass;
            $userByEmail->confirm_token = null;

            if(!$userByEmail->save()) {
                $this->router->redirect("web.newkey", [
                    "email" => $data['email'],
                    "token" => $data['token'],
                    "error" => $userByEmail->fail()->getMessage()
                ]);
            }

            $this->router->redirect("web.home", [
                "success" => "pass-updated"
            ]);
        }

        $this->view->addData([
            "title" => "Altere sua senha"
        ]);

        echo $this->view->render("web/newpass");
    }

}