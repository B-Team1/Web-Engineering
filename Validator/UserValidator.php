<?php

if (empty($_POST["lastname"])) {
    $lastnameErr = "Name ist erforderlich";
    $checkField = false;
} else {
    $lastname = test_input($_POST["lastname"]);
}

if (empty($_POST["firstname"])) {
    $firstnameErr = "Vorname ist erforderlich";
    $checkField = false;
} else {
    $firstname = test_input($_POST["firstname"]);
}

if (empty($_POST["password1"])) {
    $password1Err = "Ein Passwort ist erforderlich";
    $checkField = false;
} else {
    if (strlen($_POST["password1"]) < 6) {
        $password1Err = "Mindestens 6 Zeichen";
        $checkField = false;
    } else {
        $password1 = test_input($_POST["password1"]);
    }
}

if (empty($_POST["password2"])) {
    $password2Err = "Das Passwort muss widerholt werden";
    $checkField = false;
} else {
    if ($_POST["password1"] != $_POST["password2"]) {
        $password2Err = "Das Passwort stimmt nicht überein";
        $checkField = false;
    } else {
        $password2 = test_input($_POST["password2"]);
    }
}

if (empty($_POST["email"])) {
    $emailErr = "E-Mail ist erforderlich";
    $checkField = false;
} else {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "kein korrektes E-Mail Format";
        $checkField = false;
    } else {
        $email = test_input($_POST["email"]);
    }
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>