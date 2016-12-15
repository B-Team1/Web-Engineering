<?php

include_once "AbstractDAO.php";
include_once '../model/Renter.php';
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
        $insert = "INSERT INTO `mydb`.`mieter` (`Name`, `Vorname`, `Telefon`, `Strasse`, `Ort`, `PLZ`, `Vertragsstart`, `Wohnung_idWohnung`) "
                . "VALUES ('" . $renter->getName() . "', '" . $renter->getFirstname() . "', '" . $renter->getPhone() . "', '" . $renter->getStreet() . "',"
                . " '" . $renter->getPlace() . "','" . $renter->getPlz() . "', '" . $renter->getStartDate() . "', '".$renter->getRoomId(). "' );";
        var_dump($insert);
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
        
    }

    /**
     * 
     * @param Renter $renter
     */
    public function updateRenter(Renter $renter) {
        $sql = "UPDATE `mydb`.`mieter` SET `Name`='" . $renter->getName() . "', `Vorname`='" . $renter->getFirstname() . "', "
                . "`Telefon`='" . $renter->getPhone() . "', `Strasse`='" . $renter->getStreet() . "', `Ort`='" . $renter->getPlace() . "', "
                . "`PLZ`='" . $renter->getPlz() . "', `Vertragsstart`='" . $renter->getStartDate() . "', `Wohnung_idWohnung`='" . $renter->getRoomId() . "' "
                . "WHERE `idMieter`='" . $renter->getRenterId() . "';";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param type $id
     * @return \Renter
     */
    public function selectRenterById($id) {
        $sql = "SELECT * FROM mydb.mieter WHERE mydb.mieter.idMieter = " . $id . ";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $renter = null;
        while ($row = $result->fetch_object()) {
            $renter = new Renter($row->idMieter, $row->Name, $row->Vorname, $row->Telefon, $row->Strasse, $row->Ort, $row->PLZ, $row->Vertragsstart, $row->Wohnung_idWohnung);
        }
        return $renter;
    }
    
    /**
     * 
     * @param type $id
     */
    public function deleteBillById($id){
        $sql = "DELETE FROM `mydb`.`mieter` WHERE `idMieter` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    public function selectRenterTable($hirerID){
        $c = 0;
        $sql = "SELECT idMieter, Name, Vorname, Telefon, Strasse, Ort, PLZ, Vertragsstart FROM `mydb`.`mieter`"
                . " inner join `mydb`.`wohnung` on `wohnung`.`idWohnung`=`mieter`.`Wohnung_idWohnung` "
                . "where `wohnung`.`Vermieter_idVermieter` =  ".$hirerID.";";
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

}
