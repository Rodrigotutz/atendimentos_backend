<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Calls;
use App\Models\Situations;
use App\Models\Systems;

use Rodrigotutz\Controller;

class Admin extends Controller {

    private $calls;
    private $users;
    private $situations;
    private $systems;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
        if(!isset($_SESSION['userType'])) {
            $this->router->redirect("web.home", [
                "error" => "not-allowed"
            ]);
        }

        if($_SESSION['userType'] != "admin") {
            $this->router->redirect("web.home", [
                "error" => "not-allowed"
            ]);
        }

        $this->systems = new Systems();
        $this->situations = new Situations();
        $this->users = new Users();
    }

    public function index() {

        $systems = $this->systems->find()->fetch(true);
        $situations = $this->situations->find()->fetch(true);
        $users = $this->users->find("id != :id", "id={$_SESSION['userId']}")->fetch(true);

        $this->view->addData([
            "title" => "Página Adminstrativa",
            "systems" => $systems,
            "situations" => $situations,
            "users" => $users
        ]);
        echo $this->view->render("admin/index");
    }

    public function newSys($data) {
        $title = filter_var($data['title'], FILTER_DEFAULT);
        $description = filter_var($data['description'], FILTER_DEFAULT);
        
        if(!$title || !$description) {
            $this->router->redirect("admin.index", [
                "error" => "invalid-fields"
            ]);
        }

        $newSystem = $this->systems;

        $newSystem->title = $title;
        $newSystem->description = $description;

        if(!$newSystem->save()) {
            $this->router->redirect("admin.index", [
                "error" => "invalid-fields"
            ]);
        }
        
        $this->router->redirect("admin.index", [
            "success" => "system-created"
        ]);
    }

    public function newSituation($data) {
        $title = filter_var($data['title'], FILTER_DEFAULT);
        $description = filter_var($data['description'], FILTER_DEFAULT);
        
        if(!$title || !$description) {
            $this->router->redirect("admin.index", [
                "error" => "invalid-fields"
            ]);
        }

        $newSituation = $this->situations;

        $newSituation->title = $title;
        $newSituation->description = $description;

        if(!$newSituation->save()) {
            $this->router->redirect("admin.index", [
                "error" => "invalid-fields"
            ]);
        }
        
        $this->router->redirect("admin.index", [
            "success" => "situation-created"
        ]);
    }

    public function newUser($data) {

        $first_name = filter_var($data['first_name'], FILTER_DEFAULT);
        $last_name = filter_var($data['last_name'], FILTER_DEFAULT);
        $email = filter_var($data['email'], FILTER_DEFAULT);
        $password = filter_var($data['password'], FILTER_DEFAULT);
        $type = filter_var($data['type'], FILTER_DEFAULT);

        if(!$first_name || !$last_name || !$email || !$password || !$type) {
            $this->router->redirect("admin.index",[
                "error" => "invalid-fields"
            ]);
        }

        $this->users->first_name = $first_name;
        $this->users->last_name = $last_name;
        $this->users->email = $email;
        $this->users->password = $password;
        $this->users->type = $type;
        $this->users->confirmed_at = date("Y/m/d");

        if(!$this->users->save()) {
            $this->router->redirect("admin.index",[
                "error" => $this->users->fail()->getMessage()
            ]);
        }

        $this->router->redirect("admin.index", [
            "success" => "user-admin-created"
        ]);
    }

    public function getUser($id) {
        $userId = filter_var($id['id'], FILTER_DEFAULT);
        $user = $this->users->findById($userId);
        echo json_encode($user->data());
    }

    public function getSituation($id) {
        $situationId = filter_var($id['id'], FILTER_DEFAULT);
        $situation = $this->situations->findById($situationId);
        echo json_encode($situation->data());
    }

    public function getSystem($id) {
        $systemId = filter_var($id['id'], FILTER_DEFAULT);
        $system = $this->systems->findById($systemId);
        echo json_encode($system->data());
    }


    public function deleteUser($id) {
        $userId = filter_var($id['id'], FILTER_DEFAULT);
        $user = $this->users->findById($userId);
        $user->destroy();
    }

    public function updateUser($data) {

        $id = filter_var($data['id'], FILTER_VALIDATE_INT);
        $password = filter_var($data['password'], FILTER_DEFAULT);
        $first_name = filter_var($data['first_name'], FILTER_DEFAULT);
        $last_name = filter_var($data['last_name'], FILTER_DEFAULT);
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $type = filter_var($data['type'], FILTER_DEFAULT);


        if(!$first_name || !$last_name ||!$email || !$type) {
            $this->router->redirect("admin.index",[
                "error" => "invalid-fields"
            ]);
        }

        $this->users->id = $id;
        $this->users->password = $password;
        $this->users->first_name = $first_name;
        $this->users->last_name = $last_name;
        $this->users->email = $email;
        $this->users->type = $type;

        if(!$this->users->save()) {
            $this->router->redirect("admin.index",[
                "error" => $this->users->fail()->getMessage()
            ]);
        }

        $this->router->redirect("admin.index", [
            "success" => "user-updated"
        ]);
    }

    public function deleteSystem($id) {
        $systemId = filter_var($id['id'], FILTER_DEFAULT);
        $system = $this->systems->findById($systemId);
        $system->destroy();
    }

    public function deleteSituation($id) {
        $situationId = filter_var($id['id'], FILTER_DEFAULT);
        $situation = $this->situations->findById($situationId);
        $situation->destroy();
    }
    
}