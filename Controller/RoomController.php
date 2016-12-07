<?php

include_once '../model/Room.php';
include_once '../DAO/RoomDAO.php';
include_once '../DAO/dBConnect.php';

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
        $this->db->deleteRoomById($id);
    }
    
    public function insertRoom(Room $room){
        $room->setHirerId($_SESSION['hirerId']);
        $this->db->insertRoom($room);
        //header("Location: Wohnungen.php");
    }
    
    public function selectRoomTable(){
        return $this->db->selectRoomTable();
    }
}
