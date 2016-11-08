<?php
require_once('Vermieter.php');
require_once('Mieter.php');
require_once('Wohnung.php');
require_once('Rechnung.php');


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
      * @param Vermieter $vermieter
      */
    public function insertVermieter(Vermieter $vermieter){
        $insert = "INSERT INTO `mydb`.`vermieter` (`EMail`, `Passwort`) VALUES ('".$vermieter->getEmail()."', '".$vermieter->getPassword()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
     
    /**
     * 
     * @param Mieter $mieter
     */
    public function insertMieter(Mieter $mieter){
        $insert = "INSERT INTO `mydb`.`mieter` (`Name`, `Vorname`, `Telefon`, `Strasse`, `Ort`, `PLZ`, `Vertragsstart`, `Wohnung_idWohnung`) "
                . "VALUES ('".$mieter->getName()."', '".$mieter->getFirstname()."', '".$mieter->getPhone()."', '".$mieter->getStreet()."',"
                . " '".$mieter->getPlace()."','".$mieter->getPlz()."', '".$mieter->getStartDate()."', '".$mieter->getRoomId()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param Wohnung $wohnung
     */
    public function insertWohnung(Wohnung $wohnung){
        $insert = "INSERT INTO `mydb`.`wohnung` (`Bezeichnung`, `Fläche`, `Stockwerk`, `Mietzins`, `Vermieter_idVermieter`) "
                . "VALUES ('".$wohnung->getDescription()."', '".$wohnung->getArea()."', '".$wohnung->getFloor()."',"
                . " '".$wohnung->getRent()."', '".$wohnung->getVermieterId()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param Rechnung $rechnung
     */
    public function insertRechnung(Rechnung $rechnung){
        $insert = "INSERT INTO `mydb`.`rechnungen` (`Betrag`, `ZahlbarBis`, `Datum`, `Wohnung_idWohnung`, `Status_idStatus`, `Kostenart_idKostenart`) 
            VALUES ('".$rechnung->getAmout()."', '".$rechnung->getPayableTill()."', '".$rechnung->getDate()."',"
                . " '".$rechnung->getWohnungId()."', '".$rechnung->getStatusId()."', '".$rechnung->getKostenartId()."');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

}




 $dbConnect = DBConnect::getInstance();
 $h = new Rechnung("111", "11.1.1", "11.1.1", "1", "1", "1");

$dbConnect->insertRechnung($h);