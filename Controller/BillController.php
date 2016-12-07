<?php

include_once '../model/Bill.php';
include_once '../DAO/BillDAO.php';
include_once '../DAO/dBConnect.php';

/**
 * Description of BillController
 *
 * @author Tobias
 */
class BillController {
    protected $db;
    
    public function __construct()
    {
        $this->db = new BillDAO(DBConnect::getInstance()->getLink());
    }
    
    public function insertBill(Bill $bill) {
        
        $this->db->insertBill($bill);
        header("Location: Mietzins.php");
    }
    
    
    /**
     * 
     * @return type
     */
    public function selectBillById(){
        return $this->db->selectBillById();
        
    }
    
    public function selectAllBills(){
        return $this->db->selectAllBills();
    }
            
    
}

