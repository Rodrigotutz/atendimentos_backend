<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Situations extends DataLayer {

    public function __construct() {
        parent::__construct("situations" , ["title", "description"], timestamps:true);
    }

}