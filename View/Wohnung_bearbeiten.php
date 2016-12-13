<?php
include_once "Header.php";
include_once '../Controller/RoomController.php';
include_once '../Validator/RoomValidator.php';
include_once '../Model/Room.php';

if(isset($_POST['submit'])) {
    $room = new Room($_POST['wohnungID'], $_POST['expanse'], $_POST['name'], $_POST['floor'], $_POST['rent'], null);
    $roomValidator = new RoomValidator($room);
    $rm = new RoomController();
    if ($roomValidator->isValid()) {
    $rm->updateRoom($room);
    }
}
?>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4>Wohnung bearbeiten</h4>
                    <div class="col-lg-4">
                        <form action="Wohnung_bearbeiten.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                            <?php include_once("Wohnung_Formular.php"); ?>

                            <div class="form-actions">
                                <button type="submit" name="submit" value="speichern" class="btn btn-primary">Speichern</button>
                                <button type="button" name="cancel" value="abbrechen" class="btn btn-primary" onclick="window.open('Wohnungen.php')">Abbrechen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <?php include_once "Footer.php"; ?>














