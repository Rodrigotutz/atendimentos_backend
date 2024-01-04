<?php

namespace App\Controllers;

use Rodrigotutz\Controller;

class Error extends Controller {

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
    }

    public function index($data) {

        $this->view->addData([
            "title" => "Página não encontrada | " . $data['errcode'],
            "error" => $data['errcode']
        ]);
        echo $this->view->render("error/index");
    }

}