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
    
    public function escapeString(){
        
    }

    public function getHirerId() {
        return $this->hirerId;
    }

    public function setHirerId($hirerId) {
        $this->hirerId = $hirerId;
    }

    /**
     * 
     * @return type
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * 
     * @return type
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * 
     * @param type $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * 
     * @param type $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

}
