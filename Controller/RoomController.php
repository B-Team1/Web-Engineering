<?php

include_once '../model/Room.php';
include_once '../DAO/RoomDAO.php';
include_once '../DAO/dBConnect.php';
include_once '../Controller/BillController.php';

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
        $bc->deleteBillByRoomId($id);
        $this->db->deleteRoomById($id);
    }
    
    public function insertRoom(Room $room){
        $room->setHirerId($_SESSION['hirerId']);
        $this->db->insertRoom($room);
        header("Location: Wohnungen.php");
    }
    
    public function selectRoomTable(){
        return $this->db->selectRoomTable();
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
    
}
