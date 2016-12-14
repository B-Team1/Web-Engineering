<?php
include_once "Header.php";
include_once '../Controller/BillController.php';
include_once '../Controller/RoomController.php';
include_once '../Validator/BillValidator.php';
include_once '../Model/Bill.php';

$rent = new Bill();
$billValidator = new BillValidator();
$rc = new RoomController();
$bc = new BillController();

if (!empty($_POST)) {
    $rent = new Bill(null, $_POST['amount'], $_POST['datetopay'], $_POST['invoicedate'], $_POST['apartment'], $_POST['status'], 1, $_POST['description']);
    $billValidator = new BillValidator($rent);

    if ($billValidator->isValid()) {
        $bc->insertBill($rent);
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
                    <h4>Miete erfassen:</h4>
                    <div class="col-lg-4">
                        <form name="newRent" action="Miete_erfassen.php"  method="POST">

                            <?php include_once("Miete_Formular.php"); ?>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
                                <a href="Mietzins.php"><button type="button" name="cancel" value="abbrechen" class="btn btn-primary">Abbrechen</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>
                          



