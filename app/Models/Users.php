<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;
class Users extends DataLayer {

    public function __construct() {
        parent::__construct("users" , ["first_name", "last_name", "email", "password"], timestamps:true);
    }

    public function calls() {
        return (new Calls())->find("user_id = :uid", "uid={$this->id}")->fetch(true);
    }

    public function save(): bool {

        if(!$this->validadeUser() || !$this->validateEmail() || !$this->validatePassword() || !parent::save()) {
            return false;
        }

        return true;
    }

    protected function validadeUser(): bool {
        if(empty($this->first_name) || !filter_var($this->first_name, FILTER_DEFAULT) || empty($this->last_name) || !filter_var($this->last_name, FILTER_DEFAULT)) {
            $this->fail = new Exception("invalid-fields");
            return false;
        }

        return true;
    }

    protected function validateEmail(): bool {

        if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->fail = new Exception("invalid-email");
            return false;
        }

        $userByEmail = null;

        if(!$this->id) {
            $userByEmail = $this->find("email = :email", "email={$this->email}")->count();
        } else {
            $userByEmail = $this->find("email = :email AND id != :id" , "email={$this->email}&id={$this->id}")->count();
        }

        if($userByEmail) {
            $this->fail = new Exception("used-email");
            return false;
        }

        return true;
    }

    protected function validatePassword(): bool {
        if(empty($this->password) || !filter_var($this->password, FILTER_DEFAULT)) {
            $this->fail = new Exception("invalid-password");
            return false;
        }   
        
        if(strlen($this->password) < 8) {
            $this->fail = new Exception("invalid-password-lenght");
            return false;
        }

        if(password_get_info($this->password)['algo']) {
            return true;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return true;
    }

}