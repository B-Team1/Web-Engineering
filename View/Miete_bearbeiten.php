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
        $invoicedateErr = $amountErr = $datetopayErr = "";
        $invoicedate = $amount = $datetopay = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["invoicedate"])) {
                $invoicedateErr = "Rechnungsdatum ist erforderlich";
            } else {
                $d = DateTime::createFromFormat('d-m-Y', ($_POST["invoicedate"]));
                if ($d && $d->format('d-m-Y') !== ($_POST["invoicedate"])) {
                    $invoicedateErr = "Kein korrektes Datum-Format!";
                } else {
                    $invoicedate = test_input($_POST["invoicedate"]);
                }
            }

            if (empty($_POST["amount"])) {
                $amountErr = "Betrag ist erforderlich";
            } else {
                if (!is_numeric($_POST["amount"])) {
                    $amountErr = "Betrag muss eine Zahl sein!";
                } else {
                    $amount = test_input($_POST["amount"]);
                }
            }

            if (empty($_POST["datetopay"])) {
                $datetopayErr = "Bezahlen bis ist erforderlich";
            } else {
                $d = DateTime::createFromFormat('d-m-Y', ($_POST["datetopay"]));
                if ($d && $d->format('d-m-Y') !== ($_POST["datetopay"])) {
                    $datetopayErr = "Kein korrektes Datum-Format!";
                } else {
                    $datetopay = test_input($_POST["datetopay"]);
                }
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
                        <h4>Miete bearbeiten</h4>
                        <div class="col-lg-4">
                            <form action="Miete_bearbeiten.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                                <div class="form-group">
                                    <label for="invoicedate">Rechnungsdatum: *</label>
                                    <input type="date" name="invoicedate" id="invoicedate" class="form-control" pattern="\d{1,2}.\d{1,2}.\d{4}" value="<?php if (isset($_POST['invoicedate'])) echo $_POST['invoicedate']; ?>" 
                                           style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Rechnungsdatum aus!')" oninput="setCustomValidity('')"/>
                                    <span class="error"><?php echo $invoicedateErr; ?></span> 
                                </div>
                                <div class="form-group">
                                    <label for="apartment">Wohnung: *</label>
                                    <select name="apartment" id="apartment" class="form-control" style="width: 270px" required>

                                                <?php
                                                //$sql = mysqli_query($connection, "SELECT name FROM apartement");
                                                //while ($row = $sql->fetch_assoc()){
                                                //    echo "<option value=\"owner1\">" . $row['username'] . "</option>";
                                                //}
                                                ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Beschreibung:</label>
                                    <input type="text" name="description" id="description" class="form-control" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"
                                                                                           style="width: 270px" />   
                                </div>
                                <div class="form-group">
                                    <label for="amount">Betrag:</label>
                                    <input type="number" name="amount" id="amount" class="form-control" value="<?php if (isset($_POST['amount'])) echo $_POST['amount']; ?>"
                                                       style="width:270px" required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Betrag ein!')" oninput="setCustomValidity('')"/>
                                    <span class="error"><?php echo $amountErr; ?></span>     
                                </div>
                                <div class="form-group">
                                    <label for="datetopay">Zahlbar bis: *</label>
                                    <input type="date" name="datetopay" id="datetopay" class="form-control" value="<?php if (isset($_POST['datetopay'])) echo $_POST['datetopay']; ?>" 
                                                       style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Enddatum aus!')" oninput="setCustomValidity('')"/>
                                    <span class="error"><?php echo $datetopayErr; ?></span> 
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" id="status" class="form-control" style="width: 270px">
                                        <option class="yellow" value="offen">Offen</option>
                                        <option class="green" value="bezahlt">Bezahlt</option>
                                        <option class="red" value="verzug">Verzug</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" value="speichern" class="btn btn-primary">Speichern</button>
                                <button type="button" name="cancel" value="abbrechen" class="btn btn-primary" onclick="window.open('Mietzins.php')">Abbrechen</button>
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


                           
