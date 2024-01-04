<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;
use Example\Models\User;
use App\Models\Situations;

class Calls extends DataLayer {

    public function __construct() { 
        parent::__construct("calls" , ["at_number", "name", "email", "entity", "call_case", "user_id", "situation", "system"], timestamps:true);
    }

    public function addUser(User $user): Calls {
        $this->user_id = $user->id;
        return $this;
    }

}