<?php

include_once "AbstractDAO.php";
include_once '../model/Bill.php';

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
        $insert = "INSERT INTO `mydb`.`rechnungen` (`Betrag`, `ZahlbarBis`, `Datum`, `Wohnung_idWohnung`, `Status_idStatus`, `Kostenart_idKostenart`, `Beschreibung`) 
            VALUES ('" . $bill->getAmout() . "', '" . $bill->getPayableUntill() . "', '" . $bill->getDate() . "',"
                . " '" . $bill->getRoomId() . "', '" . $bill->getStatusId() . "', '" . $bill->getCostTypeId() . "', '" . $bill->getDescripton() . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Bill $bill
     */
    public function updateBill(Bill $bill) {
        $sql = "UPDATE `mydb`.`rechnungen` SET `Betrag`='" . $bill->getAmout() . "', `ZahlbarBis`='" . $bill->getPayableUntill() . "', "
                . "`Datum`='" . $bill->getDate() . "', `Wohnung_idWohnung`='" . $bill->getRoomId() . "', "
                . "`Status_idStatus`='" . $bill->getStatusId() . "', `Kostenart_idKostenart`='" . $bill->getCostTypeId() . "', `Beschreibung`='" . $bill->getDescripton() . "' WHERE `idRechnungen`='" . $bill->getBillId() . "';";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @return Bill Array
     */
    public function selectAllBills() {
        $sql = "SELECT * FROM mydb.rechnungen;";
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
        $sql = "SELECT * FROM mydb.rechnungen WHERE mydb.rechnungen.idRechnungen = " . $id . ";";
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
        $sql = "SELECT Datum, Name, Vorname, mydb.rechnungen.Beschreibung, Betrag, ZahlbarBis, Status_idStatus FROM mydb.rechnungen 
                inner join mydb.mieter on mydb.mieter.Wohnung_idWohnung = mydb.rechnungen.Wohnung_idWohnung
                where mydb.rechnungen.Kostenart_idKostenart = 2;";
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
        $sql = "DELETE FROM `mydb`.`rechnungen` WHERE `idRechnungen` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param type $id
     */
    public function deleteBillByRoomId($id){
        $sql = "DELETE FROM `mydb`.`rechnungen` WHERE `Wohnung_idWohnung` = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }




public function selectHNBillTable() {
        $c = 0;
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM mydb.rechnungen inner join mydb.status on mydb.rechnungen.Status_idStatus = mydb.status.idStatus "
                . "inner join mydb.kostenart on mydb.rechnungen.Kostenart_idKostenart = mydb.kostenart.idKostenart "
                . "inner join mydb.wohnung on mydb.rechnungen.Wohnung_idWohnung = mydb.wohnung.idWohnung "
                . "inner join mydb.mieter on mydb.wohnung.idWohnung = mydb.mieter.Wohnung_idWohnung "
                . "where kostenart.idKostenart = 2";
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

public function selectRoomBillTable() {
        $c = 0;
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM mydb.rechnungen inner join mydb.status on mydb.rechnungen.Status_idStatus = mydb.status.idStatus "
                . "inner join mydb.kostenart on mydb.rechnungen.Kostenart_idKostenart = mydb.kostenart.idKostenart "
                . "inner join mydb.wohnung on mydb.rechnungen.Wohnung_idWohnung = mydb.wohnung.idWohnung "
                . "inner join mydb.mieter on mydb.wohnung.idWohnung = mydb.mieter.Wohnung_idWohnung "
                . "where kostenart.idKostenart = 1";
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

public function selectYearBillTable() {
        $c = 0;
        $sql = "SELECT idRechnungen,kostenart.idKostenart, Datum, mieter.Name, Betrag, ZahlbarBis, status.Beschreibung "
                . "FROM mydb.rechnungen inner join mydb.status on mydb.rechnungen.Status_idStatus = mydb.status.idStatus "
                . "inner join mydb.kostenart on mydb.rechnungen.Kostenart_idKostenart = mydb.kostenart.idKostenart "
                . "inner join mydb.wohnung on mydb.rechnungen.Wohnung_idWohnung = mydb.wohnung.idWohnung "
                . "inner join mydb.mieter on mydb.wohnung.idWohnung = mydb.mieter.Wohnung_idWohnung; ";
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

public function selectBillTablePdfGenerator() {
        $c = 0;
        $sql = "Select mieter.Name, mieter.Vorname, rechnungen.Datum, kostenart.Beschreibung as KBeschreibung, rechnungen.ZahlbarBis, rechnungen.Betrag,"
                . " status.Beschreibung from rechnungen "
                . "inner join mydb.kostenart on mydb.rechnungen.Kostenart_idKostenart = mydb.kostenart.idKostenart "
                . "inner join mydb.status on mydb.rechnungen.Status_idStatus = mydb.status.idStatus "
                . "inner join mydb.wohnung on mydb.rechnungen.Wohnung_idWohnung = mydb.wohnung.idWohnung "
                . "inner join mydb.mieter on mydb.wohnung.idWohnung = mydb.mieter.Wohnung_idWohnung; ";
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

