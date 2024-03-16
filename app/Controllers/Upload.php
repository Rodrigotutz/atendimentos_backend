<?php

namespace App\Controllers;

use Rodrigotutz\Controller;
use App\Models\Calls;
use App\Models\Situations;
use App\Models\Systems;
use App\Models\Testes;

class Upload extends Controller {

    private $call;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
    }

    public function txtUpload() {
        $file = file_get_contents($_FILES['file']['tmp_name']);

        $array = explode("*", $file);

        foreach($array as $item) {

            $call = new Calls();
            $call->user_id = $_SESSION['userId'];

            $filter = explode("\n", $item);
            array_shift($filter);
            array_pop($filter);

            foreach ($filter as $line) {
                list($key, $value) = explode(':', $line, 2);
                $data[trim($key)] = trim($value);
            }

            $call->at_number = $data['Atendimento'];
            $call->name = $data['Relator'];
            $call->email = $data['Email'];
            $call->entity = $data['Entidade'];
            $call->call_case = $data['Caso'];
            $call->system = $data['Sistema'];
            $call->situation = $data['Situação'];


            if($data['Geral'] === "S") {
                $call->general_error = true;
            }else {
                $call->general_error = false;
            }
            
            if(!$call->save()) {
                $this->router->redirect("app.index", [
                    "error" => "file-not-imported"
                ]);
            }
        }

        $this->router->redirect("app.index", [
            "success" => "file-imported"
        ]);
    }
}