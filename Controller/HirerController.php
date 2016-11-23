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
    
    private $db;
    
    public function __construct()
    {
        $this->db = new HirerDAO(DBConnect::getInstance()->getLink());
    }
    
    public function checkLogin($email, $password){
        return $this->db->checkLogin(new Hirer(0, $email, $password));
    }
}

