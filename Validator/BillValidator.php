<?php

if (empty($_POST["invoicedate"])) {
    $invoicedateErr = "Rechnungsdatum ist erforderlich";
} else {
    $d = DateTime::createFromFormat('d-m-Y', ($_POST["invoicedate"]));
    if ($d && $d->format('d-m-Y') !== ($_POST["invoicedate"])) {
        $invoicedateErr = "Kein korrektes Datum-Format!";
    } else {
        $invoicedate = test_input($_POST["invoicedate"]);
    }
}

if (empty($_POST["amount"])) {
    $amountErr = "Betrag ist erforderlich";
} else {
    if (!is_numeric($_POST["amount"])) {
        $amountErr = "Betrag muss eine Zahl sein!";
    } else {
        $amount = test_input($_POST["amount"]);
    }
}

if (empty($_POST["datetopay"])) {
    $datetopayErr = "Bezahlen bis ist erforderlich";
} else {
    $d = DateTime::createFromFormat('d-m-Y', ($_POST["datetopay"]));
    if ($d && $d->format('d-m-Y') !== ($_POST["datetopay"])) {
        $datetopayErr = "Kein korrektes Datum-Format!";
    } else {
        $datetopay = test_input($_POST["datetopay"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>