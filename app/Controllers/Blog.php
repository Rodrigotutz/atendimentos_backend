<?php

namespace App\Controllers;

use Rodrigotutz\Controller;

class Blog extends Controller {

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
    }

    public function home() {

        $this->view->addData([
            "title" => "Blog"
        ]);
        echo $this->view->render("blog/home");
    }

}