<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Calls;
use Rodrigotutz\Controller;

class App extends Controller {

    private $user;
    private $call;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages/");
        if(!isset($_SESSION['userId'])) {
            $this->router->redirect("web.home");
        }
        $this->user = (new User())->findById($_SESSION['userId']);
        $this->call = new CAlls();
    }

    public function index($data){
        $query = $data['query'];
        $calls = null;

        if(!isset($data['query'])) {
            $calls = $this->call->find()->order("id DESC")->limit(5)->fetch(true);
        } else {
            $calls = $this->call->find("(name LIKE :query) OR (at_number LIKE '%$query%') OR (situation LIKE :query) OR (entity LIKE :query) OR (call_case LIKE :query)", "query=%{$query}%")->fetch(true);
        }

        if(!$calls) {   
            $calls = null;
        }

        $this->view->addData([
            "title" => "Atendimentos",
            "calls" => $calls,
        ]);
        echo $this->view->render("app/index");
    }

    public function logout() {
        session_destroy();
        $this->router->redirect("web.home",[
            "info" => "logout"
        ]);
    }

    public function register($data) {

        $atNumber = filter_var($data['atNumber'], FILTER_DEFAULT);
        $name = filter_var($data['name'], FILTER_DEFAULT);
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $entity = filter_var($data['entity'], FILTER_DEFAULT);
        $system = filter_var($data['system'], FILTER_DEFAULT);
        $situation = filter_var($data['situation'], FILTER_DEFAULT);
        $case = filter_var($data['case'], FILTER_DEFAULT);

        if(!$atNumber || !$name || !$email || !$entity || !$case) {
            $this->router->redirect("app.index", [
                "error" => "invalid-fields"
            ]);
        }

        $this->call->at_number = $atNumber;
        $this->call->name = $name;
        $this->call->email = $email;
        $this->call->entity = $entity;
        $this->call->system = $system;
        $this->call->situation = $situation;
        $this->call->call_case = $case;

        if(!$this->call->save()) {
            $this->router->redirect("app.index", [
                'error' => "invalid-fields"
            ]);
        }

        $this->router->redirect("app.index", [
            'success' => "call-created"
        ]);
        
    }

    public function preview($data) {

        $callId = filter_var($data['id'], FILTER_DEFAULT);

        if(!$callId) {
            $this->router->redirect("app.index", [
                "error" => "try-later"
            ]);
        }

       $callById =  $this->call->findById($callId);

       if(!$callById) {
        $this->router->redirect("app.index", [
            "error" => "call-not-found"
        ]);
       }

        $this->view->addData([
            "title" => "Veja seu chamado",
            "call" => $callById
        ]);

        echo $this->view->render("app/preview");
    }

    public function me(): void {
        $this->view->addData([
            "title" => "Página do usuário",
            "user" => $this->user
        ]);

        echo $this->view->render("app/me");
    }

    public function delete($data) {
        $id = filter_var($data['id'], FILTER_DEFAULT);

        $deleteCall = $this->call->findById($id);

        if(!$deleteCall) {
            $this->router->redirect("app.index", [
                "error" => "call-not-found"
            ]);
        }

        $deleteCall->destroy();

        $this->router->redirect("app.index", [
            "success" => "call-deleted"
        ]);
    }

    public function update($data) {
        $callById = $this->call->findById($data['id']); 
        
        $callById->at_number = $data['atNumber'];
        $callById->name = $data['name'];
        $callById->email = $data['email'];
        $callById->entity = $data['entity'];
        $callById->system = $data['system'];
        $callById->situation = $data['situation'];
        $callById->call_case =$data['case'];
        
        $callById->save();

        $this->router->redirect("app.preview", [
            "id" => $data['id'],
            "success" => "call-updated"
        ]);
        
    }
}