<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vermieter
 *
 * @author Tobias
 */
class Hirer {

    private $hirerId;
    private $email;
    private $password;

    public function __construct($hirerId, $email, $password) {
        $this->hirerId = $hirerId;
        $this->email = $email;
        $this->password = $password;
    }

    public function getHirerId() {
        return $this->hirerId;
    }

    public function setHirerId($hirerId) {
        $this->hirerId = $hirerId;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
