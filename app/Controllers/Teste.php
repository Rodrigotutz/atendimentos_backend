<?php

namespace App\Controllers;

use Rodrigotutz\Controller;
use App\Models\Testes;
class Teste extends Controller {

    private $teste;

    public function __construct($router) {
        parent::__construct($router, dirname(__DIR__, 1). "/Views/pages");
        $this->teste = new Testes();
    }

    public function index() {

        $this->view->addData([
            "title" => "Página de Testes ",
            "testes" => $this->teste->find()->fetch(true)
        ]);

        echo $this->view->render("teste/index");
    }

    public function txtUpload() {
        $files = $_FILES['file'];
        $file = file_get_contents($_FILES['file']['tmp_name']);

        $fileExplode = explode("*", $file);

        foreach($fileExplode as $key) {

            $explodeFile = explode(PHP_EOL, $key);
            
            $implodeFile = implode(":", $explodeFile);
            
            $cleanFile = explode(":", $implodeFile);
            
            $shifFile = array_shift($cleanFile);
            
            foreach($cleanFile as $key => $value) {

                if($key % 2 == 0) {
                    unset($cleanFile[$key]);
                }
            }


            $this->teste->user_id = $_SESSION['userId'];
            $this->teste->at_number = $cleanFile[1];
            $this->teste->name = $cleanFile[3];
            $this->teste->email = $cleanFile[5];
            $this->teste->entity = $cleanFile[7];            
            $this->teste->system = $cleanFile[9];            
            $this->teste->situation = $cleanFile[11];            
            $this->teste->call_case = $cleanFile[13];
            
            if($cleanFile['15'] == "S") {
                $this->teste->general_error = 1;
            } else {
                $this->teste->general_error  = 0;
            }

            $this->teste->save();
        }

        $this->router->redirect("teste.index");

    }

}