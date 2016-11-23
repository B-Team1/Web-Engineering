<?php include_once "Header.php"; ?>
<?php
$invoicedateErr = $amountErr = $datetopayErr = "";
$invoicedate = $amount = $datetopay = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once ('../Validator/RentValidator.php');
}

/*function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}*/

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
                          



