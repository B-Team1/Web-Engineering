<?php
include_once '../model/Hirer.php';
include_once '../DAO/HirerDAO.php';
include_once '../model/dBConnect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HirerController
 *
 * @author Tobias
 */
class HirerController {
    //put your code here
}



$hirer = new HirerDAO(DBConnect::getInstance()->getLink());
$hirer->insertHirer(new Hirer(0, "sleep(30)", "1234daf"));

$test = $hirer->checkLogin(new Hirer(0, "Tobias3", "1234daf"));
echo $test;