<?php
include_once "AbstractDAO.php";
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
    
    /**
     * 
     */
    public function selectRoomTable(){
        $c = 0;
        $sql = "SELECT idWohnung, Bezeichnung, Name, Strasse, Fläche FROM mydb.wohnung 
                left join mydb.mieter on mydb.mieter.Wohnung_idWohnung = mydb.wohnung.idWohnung";
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
        $sql = "SELECT * FROM mydb.wohnung inner join mydb.mieter on mydb.wohnung.idWohnung = mydb.mieter.Wohnung_idWohnung WHERE mydb.wohnung.Vermieter_idVermieter =  ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $arr = array();
        $c = 0;

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idWohnung"], $row["Bezeichnung"], $row["FlÃ¤che"], $row["Stockwerk"], $row["Mietzins"], $row["Vermieter_idVermieter"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }
    

}
