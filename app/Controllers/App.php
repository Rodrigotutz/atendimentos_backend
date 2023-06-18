<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Calls;
use App\Models\Situations;
use App\Models\Systems;
use DateTime;
use Rodrigotutz\Controller;

class App extends Controller {

    private $user;
    private $call;
    private $created_at;
    private $systems;
    private $situations;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages/");
        if(!isset($_SESSION['userId'])) {
            $this->router->redirect("web.home");
        }
        $this->user = (new Users())->findById($_SESSION['userId']);
        $this->call = new Calls();
        $this->created_at = (new DateTime($this->user->created_at))->format("d/m/Y");
        $this->systems = new Systems();
        $this->situations = new Situations();
    }

    public function index($data){
        $query = null;
        $registers = 0;
        $systems = $this->systems->find()->fetch(true);
        $situations = $this->situations->find()->fetch(true);

        if(isset($data['query'])) {
            $query = $data['query'];
        }
        $calls = null;

        if ($qtdRegisters = $this->call->find()->count()) {
            $registers = $qtdRegisters;
        }

        if(!isset($data['query']) && $_SESSION['userType'] == 'admin') {
            $calls = $this->call->find()->order("id DESC")->limit(15)->fetch(true);
        } elseif(!isset($data['query']) && $_SESSION['userType'] == 'user') {
            $calls = $this->user->calls();
        } elseif(!isset($data['query']) && $_SESSION['userType'] == 'guest') {
            $calls = null;
            if(isset($data['query']) ) {
                $calls = $this->call->find("(at_number LIKE '%$query%')", "query=%{$query}%")->order("id DESC")->fetch(true);
            }
        } else {
            $calls = $this->call->find("(name LIKE :query) OR (at_number LIKE '%$query%') OR (situation LIKE :query) OR (system LIKE :query) OR (entity LIKE :query) OR (call_case LIKE :query)", "query=%{$query}%")->order("id DESC")->fetch(true);
        }

        if(!$calls) {   
            $calls = null;
        }

        $this->view->addData([
            "title" => "Atendimentos",
            "calls" => $calls,
            "registers" => $registers,
            "systems" => $systems,
            "situations" => $situations
        ]);
        echo $this->view->render("app/index");
    }

    public function tips(): void {
        $this->view->addData([
            "title" => "Dicas"
        ]);

        echo $this->view->render("app/tips");
    }
    
    public function register($data) {
        $userId = $this->user->id;
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

        $this->call->user_id = $userId;
        $this->call->at_number = $atNumber;
        $this->call->name = $name;
        $this->call->email = $email;
        $this->call->entity = $entity;
        $this->call->system = $system;
        $this->call->situation = $situation;
        $this->call->call_case = $case;
        
        if(isset($data['generalError'])) {
            $this->call->general_error = true;
        }
        
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
        $systems = $this->systems->find()->fetch(true);
        $situations = $this->situations->find()->fetch(true);

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
            "call" => $callById,
            "systems" => $systems,
            "situations" => $situations
        ]);

        echo $this->view->render("app/preview");
    }

    public function me(): void {
        $this->view->addData([
            "title" => "Página do usuário",
            "user" => $this->user,
            "created_at" => $this->created_at
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
        $callById->general_error =$data['generalError'];
        
        if(isset($data['generalError'])) {
            $callById->general_error = true;
        }

        $callById->save();

        $this->router->redirect("app.preview", [
            "id" => $data['id'],
            "success" => "call-updated"
        ]);
        
    }
}