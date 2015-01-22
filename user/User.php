<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace user;

/**
 * Description of User
 *
 * @author daniel
 */
class User {
    private $miID;
    private $msEmail;
    private $msPassword;
    
    public function getID() {
        return $this->miID;
    }
    public function getEmail() {
        return $this->msEmail;
    }
    public function setEmail($sEmail){
        $this->msEmail = $sEmail;
    }
    public function getPassword() {
        return $this->msPassword;
    }
    public function setPassword($sPassword) {
        $this->msPassword = $sPassword;
    }
}
