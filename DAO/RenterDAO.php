<?php
include "AbstractDAO.php";
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
class RenterDAO extends AbstractDAO{
    /**
     * 
     * @param Renter $renter
     */
    public function insertRenter(Renter $renter) {
        $insert = "INSERT INTO `mydb`.`mieter` (`Name`, `Vorname`, `Telefon`, `Strasse`, `Ort`, `PLZ`, `Vertragsstart`, `Wohnung_idWohnung`) "
                . "VALUES ('" . $renter->getName() . "', '" . $renter->getFirstname() . "', '" . $renter->getPhone() . "', '" . $renter->getStreet() . "',"
                . " '" . $renter->getPlace() . "','" . $renter->getPlz() . "', '" . $renter->getStartDate() . "', '" . $renter->getRoomId() . "');";
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
     * @param int $id
     * @return Array
     */
    public function selectRenterById($id){
        $sql = "SELECT * FROM mydb.mieter WHERE mydb.mieter.idMieter = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        return mysqli_fetch_array($result);
    }
}
