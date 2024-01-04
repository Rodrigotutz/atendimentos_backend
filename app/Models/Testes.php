<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Testes extends DataLayer {

    public function __construct() { 
        parent::__construct("testes" , ["at_number", "name", "email", "entity", "call_case", "user_id"], timestamps:true);
    }

}