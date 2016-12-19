<?php


class DBConnect {

    private $user;
    private $password;
    private $database;
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
        $iniFile = "../Config/config.ini";
        $databaseConfig = parse_ini_file($iniFile, true)["database"];
        $this->user = $databaseConfig ["db_user"];
        $this->password = $databaseConfig ["db_password"];
        $this->database = $databaseConfig ["db_name"];
        
        $this->connectDB();
    }

    private function connectDB() {
         $this->link = new mysqli("localhost", $this->user, $this->password, $this->database);
//        $this->link = mysqli_connect("localhost", $this->user, $this->password);
//        mysqli_select_db($this->link, $this->database);

        mysqli_query($this->link, "SET NAMES 'utf8'");
    }

    /**
     * 
     * @return type
     */
    public function getLink() {
        return $this->link;
    }

}
