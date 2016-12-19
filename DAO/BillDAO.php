<?php

include_once "AbstractDAO.php";
include_once '../Model/Bill.php';

/**
* Description of BillDAO
*
* @author Tobias
*/
class BillDAO extends AbstractDAO {

    /**
     * 
     * @param Bill $bill
     */
    public function insertBill(Bill $bill) {
        $insert = "INSERT INTO `ateam`.`rechnungen` (`Betrag`, `ZahlbarBis`, `Datum`, `wohnung_idWohnung`, `status_idStatus`, `kostenart_idKostenart`, `Beschreibung`) 
            VALUES ('" . mysqli_real_escape_string($this->link, $bill->getAmout()) . "', '" . mysqli_real_escape_string($this->link, $bill->getPayableUntill()) . "', '" . mysqli_real_escape_string($this->link, $bill->getDate()) . "',"
                . " '" . mysqli_real_escape_string($this->link, $bill->getRoomId()) . "', '" . mysqli_real_escape_string($this->link, $bill->getStatusId()) . "', '" . mysqli_real_escape_string($this->link, $bill->getCostTypeId()) . "', '" . mysqli_real_escape_string($this->link, $bill->getDescripton()) . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Bill $bill
     */
    public function updateBill(Bill $bill) {
        $sql = "UPDATE `ateam`.`rechnungen` SET `Betrag`='" . mysqli_real_escape_string($this->link, $bill->getAmout()) . "', `ZahlbarBis`='" . mysqli_real_escape_string($this->link, $bill->getPayableUntill()) . "', "
                . "`Datum`='" . mysqli_real_escape_string($this->link, $bill->getDate()) . "', `wohnung_idWohnung`='" . mysqli_real_escape_string($this->link, $bill->getRoomId()) . "', "
                . "`status_idStatus`='" . mysqli_real_escape_string($this->link, $bill->getStatusId()) . "', `kostenart_idKostenart`='" . mysqli_real_escape_string($this->link, $bill->getCostTypeId()) . "', `Beschreibung`='" . mysqli_real_escape_string($this->link, $bill->getDescripton()) . "' WHERE `idRechnungen`='" . $bill->getBillId() . "';";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @return Bill Array
     */
    public function selectAllBills() {
        $sql = "SELECT * FROM ateam.rechnungen;";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $arr = array();
        $c = 0;

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $bill = new Bill($row["idRechnungen"], $row["Betrag"], $row["ZahlbarBis"], $row["Datum"], $row["wohnung_idWohnung"], $row["status_idStatus"], $row["kostenart_idKostenart"], $row["Beschreibung"]);
                $arr[$c] = $bill;
                $c++;
            }
        }
        return $arr;
    }

    /**
     * 
     * @param type $id
     * @return \Bill
     */
    public function selectBillById($id) {
        $sql = "SELECT * FROM ateam.rechnungen WHERE ateam.rechnungen.idRechnungen = " . $id . ";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $bill = null;
         while ($row = $result->fetch_assoc()) {
                $bill = new Bill($row["idRechnungen"], $row["Betrag"], $row["ZahlbarBis"], $row["Datum"], $row["wohnung_idWohnung"], $row["status_idStatus"], $row["kostenart_idKostenart"], $row["Beschreibung"]);
               
        }
        return $bill;
    }

    /**
     * foreach($array As $row){echo $row["Name"];}
     * @return Array
     */
    public function selectAdditionalAndHeadingCotsIncRenter() {
        $sql = "SELECT Datum, Name, Vorname, ateam.rechnungen.Beschreibung, Betrag, ZahlbarBis, status_idStatus FROM ateam.rechnungen 
                inner join ateam.mieter on ateam.mieter.wohnung_idWohnung = ateam.rechnungen.wohnung_idWohnung
                where ateam.rechnungen.kostenart_idKostenart = 2;";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $arr = array();
        $c = 0;

        while ($row = $result->fetch_assoc()) {
            $arr[$c] = $row;
            $c++;
        }
        return $arr;
    }
    
    /**
     * 
     * @param type $id
     */
    public function deleteBillById($id){
        $sql = "DELETE FROM `ateam`.`rechnungen` WHERE `idRechnungen` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param type $id
     */
    public function deleteBillByRoomId($id){
        $sql = "DELETE FROM `ateam`.`rechnungen` WHERE `wohnung_idWohnung` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }




public function selectHNBillTable($hirerID) {
        $c = 0;
        $arr = array();
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM ateam.rechnungen inner join ateam.status on ateam.rechnungen.status_idStatus = ateam.status.idStatus "
                . "inner join ateam.kostenart on ateam.rechnungen.kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.wohnung on ateam.rechnungen.wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.wohnung_idWohnung "
                . "where kostenart.idKostenart = 2 and wohnung.vermieter_idVermieter = ".$hirerID.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idRechnungen"], $row["Datum"], $row["Name"], $row["Betrag"], $row["ZahlbarBis"],$row["Beschreibung"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }

public function selectRoomBillTable($hirerID) {
        $c = 0;
        $arr = array();
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM ateam.rechnungen inner join ateam.status on ateam.rechnungen.status_idStatus = ateam.status.idStatus "
                . "inner join ateam.kostenart on ateam.rechnungen.kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.wohnung on ateam.rechnungen.wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.wohnung_idWohnung "
                . "where kostenart.idKostenart = 1 and wohnung.vermieter_idVermieter = ".$hirerID.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idRechnungen"], $row["Datum"], $row["Name"], $row["Betrag"], $row["ZahlbarBis"],$row["Beschreibung"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }    

public function selectYearBillTable($hirerID) {
        $c = 0;
        $arr = array();
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM ateam.rechnungen inner join ateam.status on ateam.rechnungen.status_idStatus = ateam.status.idStatus "
                . "inner join ateam.kostenart on ateam.rechnungen.kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.wohnung on ateam.rechnungen.wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.wohnung_idWohnung"
                . " where wohnung.vermieter_idVermieter = ". $hirerID .";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["idRechnungen"], $row["Datum"], $row["Name"], $row["Betrag"], $row["ZahlbarBis"],$row["Beschreibung"]);
                
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }  

public function selectBillTablePdfGenerator($hirerID) {
        $c = 0;
        $arr = array();
        $sql = "Select mieter.Name, mieter.Vorname, rechnungen.Datum, kostenart.Beschreibung as KBeschreibung, rechnungen.ZahlbarBis, rechnungen.Betrag,"
                . " status.Beschreibung from rechnungen "
                . "inner join ateam.kostenart on ateam.rechnungen.kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.status on ateam.rechnungen.status_idStatus = ateam.status.idStatus "
                . "inner join ateam.wohnung on ateam.rechnungen.wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.wohnung_idWohnung "
                . " where wohnung.vermieter_idVermieter = ". $hirerID .";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr1 = array($row["Name"],$row["Vorname"], $row["Datum"], $row["KBeschreibung"], $row["ZahlbarBis"], $row["Betrag"],$row["Beschreibung"]);
                $arr[$c] = $arr1;
                $c++;
            }
        }
        return $arr;
    }        
}

