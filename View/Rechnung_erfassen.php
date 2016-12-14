<?php
include_once "Header.php";
include_once '../Controller/BillController.php';
include_once '../Controller/RoomController.php';
include_once "../Validator/BillValidator.php";
include_once '../Model/Bill.php';

//$bill = new Bill();
$billValidator = new BillValidator();
$bc = new BillController();
$rc = new RoomController();

if (!empty($_POST)) {
    $bill = new Bill(null, $_POST['amount'], $_POST['datetopay'], $_POST['invoicedate'], $_POST['apartment'], $_POST['status'], 2, $_POST['description']);
    $billValidator = new BillValidator($bill);
    
    if ($billValidator->isValid()) {
        $bc->insertBill($bill, TRUE); 
    }
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
                    <h4>Rechnung erfassen:</h4>
                    <div class="col-lg-4">
                        <form action="Rechnung_erfassen.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                            <?php include_once("Rechnung_Formular.php"); ?>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
                                <button type="button" name="cancel" value="abbrechen" onclick="window.open('Heiz-Nebenkosten.php')"class="btn btn-primary">Abbrechen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>