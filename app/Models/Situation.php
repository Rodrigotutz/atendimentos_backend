<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Situation extends DataLayer {

    public function __construct() {
        parent::__construct("situation" , ["title", "description"], timestamps:true);
    }

}