<?php
include_once '../Controller/BillController.php';
include_once '../Controller/RoomController.php';
include_once '../Controller/RenterController.php';


$id = $_REQUEST["id"];
$type = $_REQUEST["type"];

switch ($type) {
    case "bill":
        $bc = new BillController();
        $bc->deleteBillById($id);
        break;
    case "rent":
        $bc = new BillController();
        $bc->deleteBillById($id);
        break;
    case "room":
        $rc = new RoomController();
        $rc->deleteRoom($id);
        break;
    case "renter":
        $renterc = new RenterController();
        $renterc->deleteRenterById($id);
        break;
    default:
        break;
}


?>
       
