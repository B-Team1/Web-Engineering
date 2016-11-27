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
    private $password2;

    public function __construct($hirerId=null, $email=null, $password=null, $password2=null) {
        if (isset($hirerId))
            $this->hirerId = $hirerId;
        if (isset($email))
            $this->email = $email;
        if (isset($password))
            $this->password = $password;
        if (isset($password2))
            $this->password2 = $password2;
        
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
     * @return type
     */
    public function getPassword2() {
        return $this->password2;
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

    /**
     * 
     * @param type $password
     */
    public function setPassword2($password2) {
        $this->password2 = $password2;
    }
    
}
