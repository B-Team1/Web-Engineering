<?php

include_once '../model/Bill.php';
include_once '../DAO/BillDAO.php';
include_once '../DAO/dBConnect.php';

/**
 * Description of BillController
 *
 * @author Tobias
 */
class BillController {
    //put your code here
}

$dao = new BillDAO(DBConnect::getInstance()->getLink());

$dao->deleteBillById(4);