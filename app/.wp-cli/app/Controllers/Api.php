<?php

namespace App\Controllers;

use App\Models\Calls;

class Api {

    private $calls;

    public function __construct() {
        $this->calls = new Calls();
    }

    public function show() {
        $calls = $this->calls->find()->order("id DESC")->fetch(true);

        foreach($calls as $call) {
            echo "<pre>";
            echo json_encode($call->data());
        }
    }

}