<?php include_once "Header.php"; ?>
<?php
$invoicedateErr = $amountErr = $datetopayErr = "";
$invoicedate = $amount = $datetopay = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4>Miete erfassen:</h4>
                    <div class="col-lg-4">
                        <form name="newRent" action="Miete_erfassen.php"  method="POST">

                            <?php include_once("Miete_Formular.php"); ?>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
                                <button type="button" name="cancel" value="abbrechen" onclick="window.open('Mietzins.php')"class="btn btn-primary">Abbrechen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>
                          



