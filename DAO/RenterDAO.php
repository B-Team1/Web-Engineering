<?php

include_once "AbstractDAO.php";
include_once '../Model/Renter.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RenterDAO
 *
 * @author Tobias
 */
class RenterDAO extends AbstractDAO {

    /**
     * 
     * @param Renter $renter
     */
    public function insertRenter(Renter $renter) {
        $insert = "INSERT INTO `ateam`.`mieter` (`Name`, `Vorname`, `Telefon`, `Strasse`, `Ort`, `PLZ`, `Vertragsstart`, `wohnung_idWohnung`) "
                . "VALUES ('" . mysqli_real_escape_string($this->link, $renter->getName()) . "', '" . mysqli_real_escape_string($this->link, $renter->getFirstname()) . "',"
                . " '" . mysqli_real_escape_string($this->link, $renter->getPhone()) . "', '" . mysqli_real_escape_string($this->link, $renter->getStreet()) . "',"
                . " '" . mysqli_real_escape_string($this->link, $renter->getPlace()) . "','" . mysqli_real_escape_string($this->link, $renter->getPlz()) . "',"
                . " '" . mysqli_real_escape_string($this->link, $renter->getStartDate()) . "', '".mysqli_real_escape_string($this->link, $renter->getRoomId()). "' );";

        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
        
    }

    /**
     * 
     * @param Renter $renter
     */
    public function updateRenter(Renter $renter) {
        $sql = "UPDATE `ateam`.`mieter` SET `Name`='" . mysqli_real_escape_string($this->link, $renter->getName()) . "', `Vorname`='" . mysqli_real_escape_string($this->link, $renter->getFirstname()) . "', "
                . "`Telefon`='" . mysqli_real_escape_string($this->link, $renter->getPhone()) . "', `Strasse`='" . mysqli_real_escape_string($this->link, $renter->getStreet()) . "', `Ort`='" . mysqli_real_escape_string($this->link, $renter->getPlace()) . "', "
                . "`PLZ`='" . mysqli_real_escape_string($this->link, $renter->getPlz()) . "', `Vertragsstart`='" . mysqli_real_escape_string($this->link, $renter->getStartDate()) . "', `wohnung_idWohnung`='" . mysqli_real_escape_string($this->link, $renter->getRoomId()) . "' "
                . "WHERE `idMieter`='" . $renter->getRenterId() . "';";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param type $id
     * @return \Renter
     */
    public function selectRenterById($id) {
        $sql = "SELECT * FROM ateam.mieter WHERE ateam.mieter.idMieter = " . $id . ";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $renter = null;
        while ($row = $result->fetch_object()) {
            $renter = new Renter($row->idMieter, $row->Name, $row->Vorname, $row->Telefon, $row->Strasse, $row->Ort, $row->PLZ, $row->Vertragsstart, $row->wohnung_idWohnung);
        }
        return $renter;
    }
    
    /**
     * 
     * @param type $id
     */
    public function deleteRenterById($id){
        $sql = "DELETE FROM `ateam`.`mieter` WHERE `idMieter` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    public function deleteRenterByRoomId($id){
        $sql = "DELETE FROM `ateam`.`mieter` WHERE `wohnung_idWohnung` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    public function selectRenterTable($hirerID){
        $c = 0;
        $arr = array();
        $sql = "SELECT idMieter, Name, Vorname, Telefon, Strasse, Ort, PLZ, Vertragsstart FROM `ateam`.`mieter`"
                . " inner join `ateam`.`wohnung` on `wohnung`.`idWohnung`=`mieter`.`wohnung_idWohnung` "
                . "where `wohnung`.`vermieter_idVermieter` =  ".$hirerID.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idMieter"],$row["Name"], $row["Vorname"], $row["Telefon"], $row["Strasse"], $row["Ort"], $row["PLZ"], $row["Vertragsstart"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }
    
    public function selectRoomRenterTable($hirerID){
        $c = 0;
        $arr = array();
        $sql = "SELECT * FROM ateam.wohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.wohnung_idWohnung "
                . "where `wohnung`.`vermieter_idVermieter` =  ".$hirerID.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["Bezeichnung"], $row["Fläche"], $row["Mietzins"], $row["Name"], $row["Vorname"], $row["Telefon"], $row["Vertragsstart"], );
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }

}
