<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class System extends DataLayer {

    public function __construct() {
        parent::__construct("system" , ["title", "description"], timestamps:true);
    }

}