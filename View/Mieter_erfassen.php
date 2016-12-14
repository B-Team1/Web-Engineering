<?php
include_once "Header.php";
include '../Validator/login_pruefen.inc.php';
include_once '../Controller/RenterController.php';
include_once '../Model/Renter.php';

//$renterValidator = new RenterValidator();
$rc = new RenterController();

if (!empty($_POST)) {
    $renter =new Renter (null, $_POST['name'],$_POST['vorname'],$_POST['phone'],$_POST['street'],$_POST['city'],$_POST['plz'],$_POST['contractstart'],null);
    //$renterValidator = new RenterValidator($renter);
    //if ($billValidator->isValid()) {
        $rc->insertRenter($renter);
    //}
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
                    <h4>Mieter erfassen:</h4>
                    <div class="col-lg-4">
                        <form action="Mieter_erfassen.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                            <?php include_once("Mieter_Formular.php"); ?>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
                            
                        </form> 
                        <a href="Mieter.php"><button type="button" name="cancel" value="abbrechen" class="btn btn-primary">Abbrechen</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"
        ?>