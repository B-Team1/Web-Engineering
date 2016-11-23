<?php

include_once '../Controller/HirerController.php';

session_start();

if (isset($_POST['email']) AND isset($_POST['password'])) {
    $hirerController = new HirerController();
    if ($hirerController->checkLogin($_POST['email'], $_POST['password'])) {
        header("Location: Wohnungen.php");
        exit();
    }else{
        $_SESSION['loginErr'] = True;
        header("Location: index.php");
    }
}