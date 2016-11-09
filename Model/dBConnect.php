<?php

require_once('Hirer.php');
require_once('Renter.php');
require_once('Room.php');
require_once('Bill.php');

class DBConnect {

    private $user = "root";
    private $password = "";
    private $database = "mydb";
    private $link;
    protected static $_instance = null;

    /**
     * 
     * @return DBConnect
     */
    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new DBConnect();
        }
        return self::$_instance;
    }

    /**
     * clone
     *
     * Kopieren der Instanz von aussen ebenfalls verbieten
     */
    protected function __clone() {
        
    }

    /**
     * constructor
     *
     * externe Instanzierung verbieten
     */
    protected function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->link = mysqli_connect("localhost", $this->user, $this->password);
        mysqli_select_db($this->link, $this->database);

        mysqli_query($this->link, "SET NAMES 'utf8'");
    }

    /**
     * 
     * @param Hirer $vermieter
     */
    public function insertHirer(Hirer $hirer) {
        $insert = "INSERT INTO `mydb`.`vermieter` (`EMail`, `Passwort`) VALUES ('" . $hirer->getEmail() . "', '" . $hirer->getPassword() . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Hirer $hirer
     */
    public function updateHirer(Hirer $hirer) {
        $insert = "UPDATE `mydb`.`vermieter` SET `EMail`='" . $hirer->getEmail() . "', `Passwort`='" . $hirer->getPassword() . "' WHERE `idVermieter`='3';";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    

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
    
    public function selectRenterById($id){
        $sql = "SELECT * FROM mydb.mieter WHERE mydb.mieter.idMieter = ".$id.";";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        return mysqli_fetch_array($result);
    }

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
     * @return \Bill
     */
    public function selectAllBills(){
        $sql = "SELECT * FROM mydb.rechnungen;";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $arr = array();
        $c = 0;

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 $bill = new Bill($row["idRechnungen"], $row["Betrag"], $row["ZahlbarBis"], $row["Datum"], 
                         $row["Wohnung_idWohnung"], $row["Status_idStatus"], $row["Kostenart_idKostenart"], $row["Beschreibung"]);
                 $arr[$c] = $bill;
                 $c++;
             }
        }
        return $arr;
    }
    

    
    /**
     * foreach($array As $row){echo $row["Name"];}
     * @return type
     */
    public function selectAdditionalAndHeadingCotsIncRenter(){
        $sql = "SELECT Datum, Name, Vorname, mydb.rechnungen.Beschreibung, Betrag, ZahlbarBis, Status_idStatus FROM mydb.rechnungen 
                inner join mydb.mieter on mydb.mieter.Wohnung_idWohnung = mydb.rechnungen.Wohnung_idWohnung
                where mydb.rechnungen.Kostenart_idKostenart = 2;";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $arr = array();
        $c = 0;
       
        while($row = $result->fetch_assoc()) {
                 $arr[$c] = $row;
                 $c++;
             }
        return $arr;
    }
   

}


$dbConnect = DBConnect::getInstance();


 $test = $dbConnect->selectRenterById(3);
 
echo $test[0];

