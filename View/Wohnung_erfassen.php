<?php
include_once "Header.php";
include_once '../Controller/RoomController.php';
include_once '../Validator/RoomValidator.php';
include_once '../Model/Room.php';

$room = new Room();
$roomValidator = new RoomValidator();

if (!empty($_POST)) {

    $room = new Room(null, $_POST['expanse'], $_POST['name'], $_POST['floor'], $_POST['rent'], null);
    $roomValidator = new RoomValidator($room);

    if ($roomValidator->isValid()) {
        $rc = new RoomController();
        $rc->insertRoom($room);        
    }
}
?>

</head>
<div class="brand">Online-Verwaltungstool</div>
<?php include_once "Navigation.php"; ?>
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <h4>Wohnung erfassen</h4>
                <div class="col-lg-4">
                    <form action="Wohnung_erfassen.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                        <?php include_once("Wohnung_Formular.php"); ?>

                        <div class="form-actions">
                            <button type="submit" name="submit" value="speichern" class="btn btn-primary">Speichern</button>
                            <a href="Wohnungen.php"><button type="button" name="cancel" value="abbrechen" class="btn btn-primary">Abbrechen</button></a>
                        </div>
                    </form>   
                </div>
            </div>
        </div>    
    </div>
</div>
<!-- /.container -->
<?php include_once "Footer.php"; ?>
        








