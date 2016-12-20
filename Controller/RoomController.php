<?php

include_once '../Model/Room.php';
include_once '../DAO/RoomDAO.php';
include_once '../DAO/dBConnect.php';
include_once '../Controller/BillController.php';
include_once '../Controller/RenterController.php';

/**
 * Description of RoomController
 *
 * @author Tobias
 */
class RoomController {
    private $db;
    
    public function __construct()
    {
        $this->db = new RoomDAO(DBConnect::getInstance()->getLink());
    }
    
    /**
     * 
     * @param type $id
     */
    public function deleteRoom($id){
        $bc = new BillController();
        $rc = new RenterController();
        $bc->deleteBillByRoomId($id);
        $rc->deleteRenterByRoomId($id);
        $this->db->deleteRoomById($id);
    }
    
    public function insertRoom(Room $room){
        $room->setHirerId($_SESSION['hirerId']);
        $this->db->insertRoom($room);
        header("Location: Wohnungen.php");
    }
    
    public function selectRoomTable(){
        return $this->db->selectRoomTable($_SESSION['hirerId']);
    }
    
    /**
     * 
     * @return type
     */
    public function selectRoomsByHirer(){
        return $this->db->selectRoomsByHirer($_SESSION['hirerId']);
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function selectRoomById($id){
        return $this->db->selectRoomById($id);
    }
    
    /**
     * 
     * @param type $room
     * @return type
     */
    public function updateRoom($room){
        return $this->db->updateRoom($room);
    }
    
    /**
     * 
     * @param type $hirerID
     * @return type
     */
    public function selectFreeRooms(){
        return $this->db->selectFreeRooms($_SESSION['hirerId']);
    }
    
}
