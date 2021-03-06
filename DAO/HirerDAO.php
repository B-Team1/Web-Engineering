<?php
include_once "AbstractDAO.php";
include_once '../Model/Hirer.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HirerDAO
 *
 * @author Tobias
 */
class HirerDAO extends AbstractDAO {
    /**
     * 
     * @param Hirer $vermieter
     */
    public function insertHirer(Hirer $hirer) {
        $t = $hirer->getPassword();
        $password = password_hash($hirer->getPassword(), PASSWORD_DEFAULT);
        $insert = "INSERT INTO `ateam`.`vermieter` (`EMail`, `Passwort`) VALUES ('" . mysqli_real_escape_string($this->link, $hirer->getEmail()) . "', '" . mysqli_real_escape_string($this->link, $password) . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Hirer $hirer
     */
    public function updateHirer(Hirer $hirer) {
        $password = password_hash($hirer->getPassword(), PASSWORD_DEFAULT);
        $insert = "UPDATE `ateam`.`vermieter` SET `EMail`='" . mysqli_real_escape_string($this->link, $hirer->getEmail()) . "', `Passwort`='" . mysqli_real_escape_string($this->link, $password) . "' WHERE `idVermieter`='3';";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param Hirer $hirer
     * @return boolean
     */
    public function checkLogin(Hirer $hirer){
        
        $sql = "SELECT * FROM ateam.vermieter where ateam.vermieter.EMail = '" . mysqli_real_escape_string($this->link, $hirer->getEmail()) . "';";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $fa = mysqli_fetch_assoc($result);
        
        
        if(password_verify($hirer->getPassword(), $fa["Passwort"])){
            return TRUE;
        }
        
        return FALSE;
    }
    
    /**
     * 
     * @param Hirer $hirer
     * @return boolean
     */
    public function checkHirerByMail(Hirer $hirer){
        $sql = "SELECT * FROM ateam.vermieter where ateam.vermieter.EMail = '" . mysqli_real_escape_string($this->link, $hirer->getEmail()) . "';";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        
        if(mysqli_num_rows($result) >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * 
     * @param Hirer $hirer
     * @return \Hirer
     */
    public function getHirerByMail(Hirer $hirer){
        $sql = "SELECT * FROM ateam.vermieter where ateam.vermieter.EMail = '" . mysqli_real_escape_string($this->link, $hirer->getEmail()) . "';";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $hirer = new Hirer($row["idVermieter"], $row["EMail"], $row["Passwort"]);
            }
        }
        return $hirer; 
    }
}
