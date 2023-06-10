<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Calls;
use App\Models\Situation;
use Rodrigotutz\Controller;

class Admin extends Controller {

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
    }

    public function index() {

        $this->view->addData([
            "title" => "Página Adminstrativa"
        ]);
        echo $this->view->render("admin/index");
    }

}