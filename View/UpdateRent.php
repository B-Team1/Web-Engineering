<?php
include_once '../Controller/RoomController.php';
include_once '../Model/Room.php';
$id = $_REQUEST["id"];

$rc = new RoomController();
$room = $rc->selectRoomById($id);

echo $room->getRent();

