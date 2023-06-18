<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Systems extends DataLayer {

    public function __construct() {
        parent::__construct("systems" , ["title", "description"], timestamps:true);
    }

}