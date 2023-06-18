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
        if($_SESSION['userType'] === "guest") {
            $this->router->redirect("web.home", [
                "error" => "not-allowed"
            ]);
        }

        $this->systems = new Systems();
        $this->situations = new Situations();
    }

    public function index() {

        $systems = $this->systems->find()->fetch(true);
        $situations = $this->situations->find()->fetch(true);

        $this->view->addData([
            "title" => "Página Adminstrativa",
            "systems" => $systems,
            "situations" => $situations
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
}