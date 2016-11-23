<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Wohnungsname ist erforderlich";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["expanse"])) {
        $expanseErr = "Fläche ist erforderlich";
    } else {
        $expanse = test_input($_POST["expanse"]);
    }

    if (empty($_POST["floor"])) {
        $floorErr = "Stockwerk ist erforderlich";
    } else {
        $floor = test_input($_POST["floor"]);
    }

    if (empty($_POST["rent"])) {
        $rentErr = "Miete ist erforderlich";
    } else {
        $rent = test_input($_POST["rent"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>