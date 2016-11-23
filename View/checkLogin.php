<?php
include_once '../Controller/HirerController.php';

if (isset($_POST['email']) AND isset($_POST['password']))
{
    $hirerController = new HirerController();
    if ($hirerController->checkLogin($_POST['email'], $_POST['password'])){
        echo "<br/><a href=\"Wohnungen.php\"> Hier gehts zu den geheimen Daten</a>";
    }
}