<?php include_once "Header.php"; ?>
<?php
$nameErr = $expanseErr = $floorErr = $rentErr = "";
$name = $expanse = $floor = $rent = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../Validator/RoomValidator.php");
}

/*function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}*/
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














