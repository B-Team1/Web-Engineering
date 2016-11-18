<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="LMT" content="">

        <title>Online-Verwaltungstool</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-casual.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
        <body>
        <div class="brand">Online-Verwaltungstool</div>
        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    <a class="navbar-brand" href="index.html">Online-Verwaltungstool</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="Wohnungen.php">Wohnungen</a>
                        </li>
                        <li>
                            <a href="Heiz-Nebenkosten.php">Heiz- & Nebenkosten</a>
                        </li>
                        <li>
                            <a href="Mietzins.php">Mietzins</a>
                        </li>
                        <li>
                            <a href="Jahresabrechnung.php">Jahresabrechnung</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Wohnung bearbeiten</h4>
                        <div class="col-lg-4">
                        <form action="Wohnung_bearbeiten.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
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
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; LMT</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
    </body>
</html>














