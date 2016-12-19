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
        $insert = "INSERT INTO `ateam`.`rechnungen` (`Betrag`, `ZahlbarBis`, `Datum`, `Wohnung_idWohnung`, `Status_idStatus`, `Kostenart_idKostenart`, `Beschreibung`) 
            VALUES ('" . $bill->getAmout() . "', '" . $bill->getPayableUntill() . "', '" . $bill->getDate() . "',"
                . " '" . $bill->getRoomId() . "', '" . $bill->getStatusId() . "', '" . $bill->getCostTypeId() . "', '" . $bill->getDescripton() . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Bill $bill
     */
    public function updateBill(Bill $bill) {
        $sql = "UPDATE `ateam`.`rechnungen` SET `Betrag`='" . $bill->getAmout() . "', `ZahlbarBis`='" . $bill->getPayableUntill() . "', "
                . "`Datum`='" . $bill->getDate() . "', `Wohnung_idWohnung`='" . $bill->getRoomId() . "', "
                . "`Status_idStatus`='" . $bill->getStatusId() . "', `Kostenart_idKostenart`='" . $bill->getCostTypeId() . "', `Beschreibung`='" . $bill->getDescripton() . "' WHERE `idRechnungen`='" . $bill->getBillId() . "';";
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
                $bill = new Bill($row["idRechnungen"], $row["Betrag"], $row["ZahlbarBis"], $row["Datum"], $row["Wohnung_idWohnung"], $row["Status_idStatus"], $row["Kostenart_idKostenart"], $row["Beschreibung"]);
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
                $bill = new Bill($row["idRechnungen"], $row["Betrag"], $row["ZahlbarBis"], $row["Datum"], $row["Wohnung_idWohnung"], $row["Status_idStatus"], $row["Kostenart_idKostenart"], $row["Beschreibung"]);
               
        }
        return $bill;
    }

    /**
     * foreach($array As $row){echo $row["Name"];}
     * @return Array
     */
    public function selectAdditionalAndHeadingCotsIncRenter() {
        $sql = "SELECT Datum, Name, Vorname, ateam.rechnungen.Beschreibung, Betrag, ZahlbarBis, Status_idStatus FROM ateam.rechnungen 
                inner join ateam.mieter on ateam.mieter.Wohnung_idWohnung = ateam.rechnungen.Wohnung_idWohnung
                where ateam.rechnungen.Kostenart_idKostenart = 2;";
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
        $sql = "DELETE FROM `ateam`.`rechnungen` WHERE `Wohnung_idWohnung` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }




public function selectHNBillTable($hirerID) {
        $c = 0;
        $arr = array();
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM ateam.rechnungen inner join ateam.status on ateam.rechnungen.Status_idStatus = ateam.status.idStatus "
                . "inner join ateam.kostenart on ateam.rechnungen.Kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.wohnung on ateam.rechnungen.Wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.Wohnung_idWohnung "
                . "where kostenart.idKostenart = 2 and wohnung.Vermieter_idVermieter = ".$hirerID.";";
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
                . "FROM ateam.rechnungen inner join ateam.status on ateam.rechnungen.Status_idStatus = ateam.status.idStatus "
                . "inner join ateam.kostenart on ateam.rechnungen.Kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.wohnung on ateam.rechnungen.Wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.Wohnung_idWohnung "
                . "where kostenart.idKostenart = 1 and wohnung.Vermieter_idVermieter = ".$hirerID.";";
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
                . "FROM ateam.rechnungen inner join ateam.status on ateam.rechnungen.Status_idStatus = ateam.status.idStatus "
                . "inner join ateam.kostenart on ateam.rechnungen.Kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.wohnung on ateam.rechnungen.Wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.Wohnung_idWohnung"
                . " where wohnung.Vermieter_idVermieter = ". $hirerID .";";
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
                . "inner join ateam.kostenart on ateam.rechnungen.Kostenart_idKostenart = ateam.kostenart.idKostenart "
                . "inner join ateam.status on ateam.rechnungen.Status_idStatus = ateam.status.idStatus "
                . "inner join ateam.wohnung on ateam.rechnungen.Wohnung_idWohnung = ateam.wohnung.idWohnung "
                . "inner join ateam.mieter on ateam.wohnung.idWohnung = ateam.mieter.Wohnung_idWohnung "
                . " where wohnung.Vermieter_idVermieter = ". $hirerID .";";
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

