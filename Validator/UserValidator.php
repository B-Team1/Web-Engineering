<?php

include_once '../Model/Hirer.php';

class UserValidator {

    private $hirer;
    private $valid = true;
    private $emailError = null;
    private $pwError = null;
    private $pw2Error = null;

    public function __construct(Hirer $hirer = null) {
        $this->hirer = $hirer;
        $this->checkUser();
    }

    public function checkUser() {

        if (!is_null($this->hirer)) {
            if (empty($this->hirer->getEmail())) {
                $this->emailError = 'Geben Sie eine E-Mail Adresse ein';
                $this->valid = false;
            } else if (!filter_var($this->hirer->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Geben Sie bitte eine gültige E-Mail Adresse ein';
                $this->valid = false;
            }

            if (empty($this->hirer->getPassword())) {
                $this->pwError = 'Geben Sie bitte ein Passwort ein';
                $this->valid = false;
            } else if (strlen($this->hirer->getEmail()) < 6) {
                $this->pwError = 'Passwort benötigt mindestens 6 Zeichen';
                $this->valid = false;
            }
            
            if (empty($this->hirer->getPassword2())) {
                $this->pw2Error = 'Widerholen Sie bitte das Passwort';
                $this->valid = false;
            } else if($this->hirer->getPassword() != $this->hirer->getPassword2()) {
                $this->pw2Error = 'Passwörter stimmen nicht überein';
                $this->valid = false;
            }
            
        } else {
            $this->valid = false;
        }
        return $this->valid;

        /*
          function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          } */
    }

    public function getHirer() {
        return $this->hirer;
    }

    public function isValid() {
        return $this->valid;
    }

    public function getEmailError() {
        return $this->emailError;
    }

    public function getPwError() {
        return $this->pwError;
    }
    
    public function getPw2Error() {
        return $this->pw2Error;
    }
    
    public function setEmailError($emailError) {
        $this->emailError = $emailError;
    }



}

?>