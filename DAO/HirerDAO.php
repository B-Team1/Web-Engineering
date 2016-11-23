<?php
include "AbstractDAO.php";
include_once '../model/Hirer.php';
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
        $password = password_hash($hirer->getPassword(), PASSWORD_DEFAULT);
        $insert = "INSERT INTO `mydb`.`vermieter` (`EMail`, `Passwort`) VALUES ('" . $hirer->getEmail() . "', '" . $password . "');";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }

    /**
     * 
     * @param Hirer $hirer
     */
    public function updateHirer(Hirer $hirer) {
        $password = password_hash($hirer->getPassword(), PASSWORD_DEFAULT);
        $insert = "UPDATE `mydb`.`vermieter` SET `EMail`='" . $hirer->getEmail() . "', `Passwort`='" . $password . "' WHERE `idVermieter`='3';";
        mysqli_query($this->link, $insert) or die(mysqli_error($this->link));
    }
    
    /**
     * 
     * @param Hirer $hirer
     * @return boolean
     */
    public function checkLogin(Hirer $hirer){
        
        $sql = "SELECT * FROM mydb.vermieter where mydb.vermieter.EMail = '" . $hirer->getEmail() . "';";
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $fa = mysqli_fetch_assoc($result);
        
        if(password_verify($hirer->getPassword(), $fa["Passwort"])){
            return TRUE;
        }
        
        return FALSE;
    }
}