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
                                <div class="form-group">
                                    <label for="name">Wohnungsname: *</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required oninvalid="this.setCustomValidity('Geben Sie bitte den Namen der Wohnung ein!')" oninput="setCustomValidity('')"/>
                                        <span class="error"><?php echo $nameErr;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="expanse">Fläche [m^2]: *</label>
                                    <input type="number" name="expanse" id="expanse" class="form-control" value="<?php if (isset($_POST['expanse'])) echo $_POST['expanse']; ?>" required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte die Fläche als Zahl ein!')" oninput="setCustomValidity('')"/>
                                        <span class="error"><?php echo $expanseErr;?></span>
                                </div>    
                                <div class="form-group">
                                    <label for="floor">Stockwerk: *</label>
                                    <input type="number" name="floor" id="floor" class="form-control" value="<?php if (isset($_POST['floor'])) echo $_POST['floor']; ?>" required pattern="[0-9]" oninvalid="this.setCustomValidity('Geben Sie bitte das Stockwerk als Zahl ein!')" oninput="setCustomValidity('')" />
                                        <span class="error"><?php echo $floorErr;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="rent">Mietzins [Fr.]: *</label>
                                    <input type="number" name="rent" id="rent" class="form-control" value="<?php if (isset($_POST['rent'])) echo $_POST['rent']; ?>" required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Mietzins pro Monat ein!')" oninput="setCustomValidity('')"/>
                                        <span class="error"><?php echo $rentErr;?></span>
                                </div>
                            
                            <button type="submit" name="submit" value="speichern" class="btn btn-primary">Speichern</button>
                            <button type="button" name="cancel" value="abbrechen" class="btn btn-primary" onclick="window.open('Wohnungen.php')">Abbrechen</button>
                            </form>   
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>
        
        
        
        
        
        
        
        
        
