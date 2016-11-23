<?php
include "AbstractDAO.php";
include_once '../model/Room.php';


/**
 * Description of RoomDAO
 *
 * @author Tobias
 */
class RoomDAO extends AbstractDAO{
    
    /**
     * 
     * @param Room $room
     */
    public function insertRoom(Room $room) {
        $insert = "INSERT INTO `mydb`.`wohnung` (`Bezeichnung`, `Fläche`, `Stockwerk`, `Mietzins`, `Vermieter_idVermieter`) "
                . "VALUES ('" . $room->getDescription() . "', '" . $room->getArea() . "', '" . $room->getFloor() . "',"
                . " '" . $room->getRent() . "', '" . $room->getHirerId() . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Room $room
     */
    public function updateRoom(Room $room) {
        $sql = "UPDATE `mydb`.`wohnung` SET `Bezeichnung`='" . $room->getDescription() . "', `Fläche`='" . $room->getArea() . "', "
                . "`Stockwerk`='" . $room->getFloor() . "', `Mietzins`='" . $room->getRent() . "', "
                . "`Vermieter_idVermieter`='" . $room->getHirerId() . "' WHERE `idWohnung`='" . $room->getHirerId() . "';";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param int $id
     * @return Array
     */
    public function selectRoomById($id){
        $sql = "SELECT * FROM mydb.wohnung WHERE mydb.wohnung.idWohnung = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        return mysqli_fetch_array($result);
    }
    
    
    /**
     * 
     * @param type $id
     */
    public function deleteRoomById($id){
        $sql = "DELETE FROM `mydb`.`wohnung` WHERE `idWohnung` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

}