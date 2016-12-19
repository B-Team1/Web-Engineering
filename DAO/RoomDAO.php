<?php
include_once "AbstractDAO.php";
include_once '../Model/Room.php';


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
        $insert = "INSERT INTO `ateam`.`wohnung` (`Bezeichnung`, `Fläche`, `Stockwerk`, `Mietzins`, `Vermieter_idVermieter`) "
                . "VALUES ('" . $room->getDescription() . "', '" . $room->getArea() . "', '" . $room->getFloor() . "',"
                . " '" . $room->getRent() . "', '" . $room->getHirerId() . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Room $room
     */
    public function updateRoom(Room $room) {
        $sql = "UPDATE `ateam`.`wohnung` SET `Bezeichnung`='" . $room->getDescription() . "', `Fläche`='" . $room->getArea() . "', "
                . "`Stockwerk`='" . $room->getFloor() . "', `Mietzins`='" . $room->getRent() . "', "
                . "`Vermieter_idVermieter`='" . $room->getHirerId() . "' WHERE `idWohnung`='" . $room->getRoomId() . "';";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param int $id
     * @return Array
     */
    public function selectRoomById($id){
        $sql = "SELECT * FROM ateam.wohnung WHERE ateam.wohnung.idWohnung = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $room = new Room($row["idWohnung"], $row["Fläche"], $row["Bezeichnung"], $row["Stockwerk"], $row["Mietzins"], $row["Vermieter_idVermieter"]);
            }
        }
        
        return $room;
    }
    
    
    /**
     * 
     * @param type $id
     */
    public function deleteRoomById($id){
        $sql = "DELETE FROM `ateam`.`wohnung` WHERE `idWohnung` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     */
    public function selectRoomTable($hirerID){
        $c = 0;
        $arr = array();
        $sql = "SELECT idWohnung, Bezeichnung, Name, Strasse, Fläche FROM mydb.wohnung 
                left join mydb.mieter on mydb.mieter.Wohnung_idWohnung = mydb.wohnung.idWohnung where wohnung.Vermieter_idVermieter =  ".$hirerID.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idWohnung"], $row["Bezeichnung"], $row["Name"], $row["Strasse"], $row["Fläche"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }
    
    public function selectRoomsByHirer($id){
        $sql = "SELECT * FROM ateam.wohnung inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.Wohnung_idWohnung WHERE ateam.wohnung.Vermieter_idVermieter =  ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $arr = array();
        $c = 0;

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idWohnung"], $row["Bezeichnung"], $row["Fläche"], $row["Stockwerk"], $row["Mietzins"], $row["Vermieter_idVermieter"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }
    
    public function selectFreeRooms($hirerID){
        $c = 0;
        $arr = array();
        $sql = "SELECT * FROM ateam.wohnung left join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.Wohnung_idWohnung"
                . " WHERE ateam.wohnung.Vermieter_idVermieter = ".$hirerID." and ateam.mieter.Wohnung_idWohnung is null;";
        echo $sql;
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idWohnung"], $row["Bezeichnung"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
        
        
    }
    

}
