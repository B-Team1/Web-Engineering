<?php

include_once '../Model/Bill.php';
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
        if ($bill->getCostTypeId()==1){
        header("Location: Mietzins.php");    
        }else{
        header("Location: Heiz-Nebenkosten.php");    
        }
        
    }
    
    
    /**
     * 
     * @return type
     */
    public function selectBillById($id){
        return $this->db->selectBillById($id);
        
    }
    
    public function selectAllBills(){
        return $this->db->selectAllBills();
    }
    
    public function selectHNBillTable(){
        return $this->db->selectHNBillTable($_SESSION['hirerId']);
    }
    
    public function selectRoomBillTable(){
        return $this->db->selectRoomBillTable($_SESSION['hirerId']);
    }
    
    public function selectYearBillTable(){
        return $this->db->selectYearBillTable($_SESSION['hirerId']);
    }
    
    public function selectBillTablePdfGenerator(){
        return $this->db->selectBillTablePdfGenerator($_SESSION['hirerId']);
    }
    
    public function deleteBillById($id){
        $this->db->deleteBillById($id);
    }
    
    public function deleteBillByRoomId($id){
        $this->db->deleteBillByRoomId($id);
    }
    
    public function updateBild($bill){
        $this->db->updateBill($bill);
    }
}

