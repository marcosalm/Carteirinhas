<?php

class User {
    
    private $userdata = array();
    
    public function User() {

    }
    
    public function checkPassword($pass) {
        if(isset($this->userdata['password']) && $this->userdata['password'] == md5($pass))
        {
            return true;
        }
        return false;
    }
    
    public function set($var, $value) { $this->userdata[$var] = $value; }
    
    public function get($var) {
        if(isset($this->userdata[$var]))
        {
            return $this->userdata[$var];
        }
        return NULL;
    }
}