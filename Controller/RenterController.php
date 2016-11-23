<?php

include_once '../model/Renter.php';
include_once '../DAO/RenterDAO.php';
include_once '../DAO/dBConnect.php';

/**
 * Description of RenterController
 *
 * @author Tobias
 */
class RenterController {
    //put your code here
}

$d = new RenterDAO(DBConnect::getInstance()->getLink());

echo $d->selectRenterById(4)->getFirstname();