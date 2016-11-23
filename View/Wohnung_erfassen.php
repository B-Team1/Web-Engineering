    <?php include_once "Header.php"; ?>
            <?php
            $nameErr = $expanseErr = $floorErr = $rentErr = "";
            $name = $expanse = $floor = $rent = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Wohnungsname ist erforderlich";
                } else {
                    $name = test_input($_POST["name"]);
                }
                                
                if (empty($_POST["expanse"])) {
                    $expanseErr = "Fläche ist erforderlich";
                } else {
                    $expanse = test_input($_POST["expanse"]);
                }
                
                if (empty($_POST["floor"])) {
                    $floorErr = "Stockwerk ist erforderlich";
                } else {
                    $floor = test_input($_POST["floor"]);   
                }
                                
                if (empty($_POST["rent"])) {
                    $rentErr = "Miete ist erforderlich";
                } else {
                    $rent = test_input($_POST["rent"]);
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
        
        
        
        
        
        
        
        
        
