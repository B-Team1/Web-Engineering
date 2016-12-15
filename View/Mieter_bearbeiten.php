<?php
include_once "Header.php";
include_once '../Controller/RenterController.php';
include_once '../Model/Renter.php';
include_once '../Controller/RoomController.php';

//$renterValidator = new RenterValidator();
$rc = new RenterController();
$roomc = new RoomController();
$new = false;


if(isset($_POST['submit'])) {
    $renter =new Renter ($_POST['renterID'], $_POST['name'],$_POST['vorname'],$_POST['phone'],$_POST['street'],$_POST['city'],$_POST['plz'],$_POST['contractstart'],$_POST['apartment']);
    //$renterValidator = new RenterValidator($renter);
    //if ($billValidator->isValid()) {
        $rc->updateRenter($renter);
        header("Location: Mieter.php"); 
    //}
    
    
    
}

if(!isset($_POST['submit'])) {
        $renterID = $_POST['renterID'];
        $renter = $rc->selectRenterById($renterID);
        $renterName = $renter->getName();
        $renterVorname = $renter->getFirstname();
        $renterPhone = $renter->getPhone();
        $renterStreet = $renter->getStreet();
        $renterCity = $renter->getPlace();
        $renterPLZ = $renter->getPlz();
        $renterContractstart = $renter->getStartDate();
        $renterRoomID = $renter->getRoomId();
        $room = $roomc->selectRoomById($renterRoomID);
        $roomDescription = $room->getDescription();
    }
?>

<body>
    <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4>Mieter bearbeiten</h4>
                    <div class="col-lg-4">
                        <form action="Mieter_bearbeiten.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                            <?php include_once("Mieter_Formular.php"); ?>

                            <div class="form-group">
                                <button type="submit" name="submit" value="speichern" class="btn btn-primary">Speichern</button>
                                <a href="Mieter.php"><button type="button" name="cancel" value="abbrechen" class="btn btn-primary">Abbrechen</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>