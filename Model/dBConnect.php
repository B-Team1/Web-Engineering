<?php
require_once('Hirer.php');
require_once('Renter.php');
require_once('Room.php');
require_once('Bill.php');


class DBConnect{
    private $user = "root";
    private $password = "";
    private $database = "mydb";
    private $link;
    protected static $_instance = null;
    
    
   
    /**
     * 
     * @return DBConnect
     */
    public static function getInstance()
   {
       if (null === self::$_instance)
       {
           self::$_instance = new DBConnect();
       }
       return self::$_instance;
   }
   
   /**
    * clone
    *
    * Kopieren der Instanz von aussen ebenfalls verbieten
    */
   protected function __clone() {}
 
   /**
    * constructor
    *
    * externe Instanzierung verbieten
    */
   protected function __construct() {
       $this->connectDB();
       
   }
    
    private function connectDB(){
        $this->link = mysqli_connect("localhost", $this->user, $this->password);
        mysqli_select_db($this->link, $this->database);

        mysqli_query($this->link, "SET NAMES 'utf8'");        
    }

     /**
      * 
      * @param Hirer $vermieter
      */
    public function insertHirer(Hirer $vermieter){
        $insert = "INSERT INTO `mydb`.`vermieter` (`EMail`, `Passwort`) VALUES ('".$vermieter->getEmail()."', '".$vermieter->getPassword()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
     
    /**
     * 
     * @param Renter $renter
     */
    public function insertRenter(Renter $renter){
        $insert = "INSERT INTO `mydb`.`mieter` (`Name`, `Vorname`, `Telefon`, `Strasse`, `Ort`, `PLZ`, `Vertragsstart`, `Wohnung_idWohnung`) "
                . "VALUES ('".$renter->getName()."', '".$renter->getFirstname()."', '".$renter->getPhone()."', '".$renter->getStreet()."',"
                . " '".$renter->getPlace()."','".$renter->getPlz()."', '".$renter->getStartDate()."', '".$renter->getRoomId()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param Room $room
     */
    public function insertRoom(Room $room){
        $insert = "INSERT INTO `mydb`.`wohnung` (`Bezeichnung`, `Fläche`, `Stockwerk`, `Mietzins`, `Vermieter_idVermieter`) "
                . "VALUES ('".$room->getDescription()."', '".$room->getArea()."', '".$room->getFloor()."',"
                . " '".$room->getRent()."', '".$room->getHirerId()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param Bill $bill
     */
    public function insertBill(Bill $bill){
        $insert = "INSERT INTO `mydb`.`rechnungen` (`Betrag`, `ZahlbarBis`, `Datum`, `Wohnung_idWohnung`, `Status_idStatus`, `Kostenart_idKostenart`) 
            VALUES ('".$bill->getAmout()."', '".$bill->getPayableUntill()."', '".$bill->getDate()."',"
                . " '".$bill->getRoomId()."', '".$bill->getStatusId()."', '".$bill->getCostTypeId()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

}




 $dbConnect = DBConnect::getInstance();
 $h = new Bill("111", "11.1.1", "11.1.1", "1", "1", "1");

$dbConnect->insertBill($h);