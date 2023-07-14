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

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header('Content-Type:application/json');

        if($calls) {
            foreach($calls as $call) {
                echo json_encode($call->data());
            }
        } else {
            echo "Não foram encontrados atendimentos";
        }

    }

    public function query($data) {
        $query = null;
        $callsFiltered = (array) '';

        if(isset($data['query'])) {
            $filterData = implode($data);
            $filterExplode = explode(";" , $filterData);
            
            $callsFiltered = $this->calls->find()->fetch(true);

            foreach($filterExplode as $separateItens => $value) {
                $separateItens = explode("=", $value);
                
                if($separateItens[0] === 'at') {
                    $query = $separateItens[1];
                    $teste = $this->calls->find("at_number LIKE :q", "q={$query}%")->fetch(true);
                }

                if($separateItens[0] === 'nome') {
                    $query = $separateItens[1];
                    $teste = $this->calls->find("name LIKE :q", "q=%{$query}%")->fetch(true);
                }
            }
           
        }

        foreach($callsFiltered as $item) {
            echo "<pre>";
            print_r($item->data());
        }
    }

}