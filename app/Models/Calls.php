<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Calls extends DataLayer {

    public function __construct() {
        parent::__construct("calls" , ["at_number", "name", "email", "entity", "call_case"], timestamps:true);
    }

}