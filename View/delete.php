<?php
include_once '../Controller/BillController.php';
include_once '../Controller/RoomController.php';


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

    default:
        break;
}


?>
       
