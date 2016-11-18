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
        <script type =text/javascript>
            function delete_Bill() {
                Check = confirm("Wollen Sie die Rechnung xy wirklich löschen?");
                if (Check == false) {
                    // löscht den Eintrag nicht
                    alert("Rechnung xy wurde nicht gelöscht");
                } else {
                    // Rechnung löschen
                    alert("Rechnung xy wurde gelöscht");
                }
            }
        </script>
        </head>
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
                        <h4>Heiz- & Nebenkostenübersicht</h4>
                        <table class="table-responsive" width="100%">
                            <thead>
                                <th>Datum</th>
                                <th>Mieter</th>
                                <th>Grund</th>
                                <th>Betrag</th>
                                <th>Bezahlen bis</th>
                                <th>Status</th>
                                <th>Bearbeiten</th>
                                <th>Löschen</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08.11.2016</td>
                                    <td>Famillie Müller</td>
                                    <td>Reparaturen</td>
                                    <td>500.-</td>
                                    <td>12.12.2016</td>
                                    <td>
                                        <select name="status">
                                            <option class="yellow" value="offen">Offen</option>
                                            <option class="green" value="bezahlt">Bezahlt</option>
                                            <option class="red" value="verzug">Verzug</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="Rechnung_bearbeiten.php">
                                            <img src="bearbeiten_icon.png" alt="" style="width:10px; height:auto;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="Heiz-Nebenkosten.php">
                                            <img src="loeschen_icon.png" alt="" style="width:15px; height:auto;" onClick="delete_Bill()">
                                        </a>
                                    </td>
                                </tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="Rechnung_erfassen.php" class="myButton">+</a></td>
                            </tbody>
                        </table>
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

