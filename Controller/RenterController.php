<?php

include_once '../model/Renter.php';
include_once '../DAO/RenterDAO.php';
include_once '../DAO/dBConnect.php';

/**
 * Description of RenterController
 *
 * @author Tobias
 */
class RenterController {
    private $db;
    
    public function __construct()
    {
        $this->db = new RenterDAO(DBConnect::getInstance()->getLink());
    }
    
    public function selectRenterTable($hirerID){
        return $this->db->selectRenterTable($hirerID);
    }
    
    public function insertRenter($renter){
        $this->db->insertRenter($renter);
        header("Location: Mieter.php"); 
    }
    
    public function updateRenter(Renter $renter){
        return $this->db->updateRenter($renter);
    }
    
    public function selectRenterById($id){
        return $this->db->selectRenterById($id);
    }
    
}