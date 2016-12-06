<?php
include_once '../model/Hirer.php';
include_once '../DAO/HirerDAO.php';
include_once '../DAO/dBConnect.php';


/**
 * Description of HirerController
 *
 * @author Tobias
 */
class HirerController {
    
    protected $db;
    
    public function __construct()
    {
        $this->db = new HirerDAO(DBConnect::getInstance()->getLink());
    }
    
    /**
     * 
     * @param type $email
     * @param type $password
     * @return type
     */
    public function checkLogin($email, $password){
        return $this->db->checkLogin(new Hirer(0, $email, $password));
    }
    
    public function insertHirer($email, $password, UserValidator $userValidator){
        $hirer = new Hirer(0, $email, $password);
        if (!$this->db->checkHirerByMail($hirer)) {
             $this->db->insertHirer($hirer);
             header("Location: index.php");
        }
        $userValidator->setEmailError("Benutzer ist bereits vorhanden!");
        return $userValidator;       
    }
    
    /**
     * 
     * @param type $email
     * @return Hirer
     */
    public function getHirerByMail($email){
        return $this->db->getHirerByMail(new Hirer(0, $email));
    }
}

