<?php

namespace Rodrigotutz;

use League\Plates\Engine;

abstract class Controller {
    
    protected $router;
    protected $view;
    protected $class = null;
    protected $message = null;

    public function __construct($router, $path) {
        $this->router = $router;
        $this->error();
        $this->success();
        $this->warning();
        $this->info();
        $this->view = new Engine($path, "php");
        $this->view->addData([
            "router" => $router,
            "class" => $this->class,
            "message" => $this->message
        ]);
    }

    public function error() {
        if(isset($_GET['error'])) {
            if($_GET['error'] === "invalid-fields") {
                $this->message = "Preencha todos os campos";
                $this->class = "danger";
            }
            if($_GET['error'] === "invalid-auth") {
                $this->message = "E-mail ou senha inválido(os)";
                $this->class = "danger";
            }

            if($_GET['error'] === "call-not-found") {
                $this->message = "Chamado não encontrado";
                $this->class = "danger";
            }

            if($_GET['error'] === "different-passwords") {
                $this->message = "As senhas devem ser iguais";
                $this->class = "danger";
            }

            if($_GET['error'] === "used-email") {
                $this->message = "O e-mail já está em uso!";
                $this->class = "danger";
            }

            if($_GET['error'] === "not-allowed") {
                $this->message = "Tente novamente mais tarde";
                $this->class = "danger";
            }

            if($_GET['error'] === "confirm-not-allowed") {
                $this->message = "Tente novamente mais tarde";
                $this->class = "danger";
            }

            if($_GET['error'] === "invalid-password-lenght") {
                $this->message = "A senha deve ter pelo menos 8 caracteres!";
                $this->class = "danger";
            }

            if($_GET['error'] === "call-not-found") {
                $this->message = "Chamado não encontrado!";
                $this->class = "danger";
            }

            if($_GET['error'] === "invalid-old-pass") {
                $this->message = "Senha antiga incorreta!";
                $this->class = "danger";
            }

            if($_GET['error'] === "email-not-found") {
                $this->message = "O e-mail informado não foi encontrado!";
                $this->class = "danger";
            }

            if($_GET['error'] === "user-deleted") {
                $this->message = "Usuário deletado com sucesso";
                $this->class = "danger";
            }

            if($_GET['error'] === "file-not-imported") {
                $this->message = "O arquivo não pôde ser importado!";
                $this->class = "danger";
            }
        }  
    }

    public function info() {
        if(isset($_GET['info'])) {
            if($_GET['info'] === "logout") {
                $this->message = "Até mais!";
                $this->class = "primary";
            }
        }  
    }

    public function warning() {
        if(isset($_GET['warning'])) {
            if($_GET['warning'] === "user-not-confirmed") {
                $this->message = "Confirme seu e-mail para logar";
                $this->class = "warning";
            }
        } 
    }

    public function success() {
        if(isset($_GET['success'])) {
            if($_GET['success'] === "call-created") {
                $this->message = "Atendimento criado";
                $this->class = "success";
            }
            
            if($_GET['success'] === "user-created") {
                $this->message = "Confirme seu e-mail para continuar";
                $this->class = "success";
            }
            
            if($_GET['success'] === "call-deleted") {
                $this->message = "Chamado deletado!";
                $this->class = "success";
            }
            
            if($_GET['success'] === "call-updated") {
                $this->message = "Chamado atualizado!";
                $this->class = "success";
            }
            
            if($_GET['success'] === "pass-updated") {
                $this->message = "Senha Atualizada!";
                $this->class = "success";
            }
            
            if($_GET['success'] === "system-created") {
                $this->message = "Sistema criado!";
                $this->class = "success";
            }
            
            if($_GET['success'] === "user-admin-created") {
                $this->message = "Usuário criado!";
                $this->class = "success";
            }

            if($_GET['success'] === "file-imported") {
                $this->message = "Arquivo Importado com sucesso!";
                $this->class = "success";
            }
        }  
    }
}