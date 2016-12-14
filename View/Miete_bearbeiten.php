<?php
include_once "Header.php";
include_once '../Controller/BillController.php';
include_once '../Controller/RoomController.php';
include_once '../Validator/BillValidator.php';
include_once '../Model/Bill.php';

$billValidator = new BillValidator();
$bc = new BillController();
$rc = new RoomController();


if(isset($_POST['submit'])) {
    $bill = new Bill($_POST['billID'], $_POST['amount'], $_POST['datetopay'], $_POST['invoicedate'], $_POST['apartment'], $_POST['status'], $_POST['costType'], $_POST['description']);
    $billValidator = new BillValidator($bill);
    if ($billValidator->isValid()) {
    $bc->updateBill($bill);
    header("Location: Mietzins.php");  
    }
}

if (!isset($_POST['submit'])) {
        $billID = $_POST['billID'];
        $bill = new Bill();
        $bill = $bc->selectBillById($billID);
        $invoiceDate = $bill->getDate();
        $description = $bill->getDescripton();
        $amount = $bill->getAmout();
        $datetopay = $bill->getPayableUntill();
        $status = $bill->getStatusId();
        $wohnungID = $bill->getRoomId();
        $costType = $bill->getCostTypeId();
    }
?>

<body>
    <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4>Miete bearbeiten</h4>
                    <div class="col-lg-4">
                        <form action="Miete_bearbeiten.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                            <?php include_once("Miete_Formular.php"); ?>

                            <div class="form-group">
                                <button type="submit" name="submit" value="speichern" class="btn btn-primary">Speichern</button>
                                <button type="button" name="cancel" value="abbrechen" class="btn btn-primary" onclick="window.open('Mietzins.php')">Abbrechen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>
