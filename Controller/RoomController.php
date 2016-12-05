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
    
    /**
     * 
     * @return type
     */
    public function selectAllRoomsByHirer(){
        return $this->db->selectAllRoomsByHirer();
        
    }
}
