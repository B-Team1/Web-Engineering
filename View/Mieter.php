<?php 
include_once "Header.php";
include_once '../Controller/RenterController.php';
?>
<script type =text/javascript src="js/deletFunction.js"></script>
<script type="text/javascript" src="js/TableSort.js"></script>
</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4>Mieterübersicht</h4>
                    <table class="table table-responsive table-bordered table-condensed table-hover sortierbar" >
                        <thead>
                            <tr>
                                <th class="sortierbar vorsortiert+">Name</th>
                                <th class="sortierbar">Vorname</th>
                                <th>Telefon</th>
                                <th class="sortierbar">Strasse</th>
                                <th class="sortierbar">Ort</th>
                                <th class="sortierbar">PLZ</th>
                                <th class="sortierbar">Vertragsstart</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        $rc = new RenterController();
                        $sql = $rc->selectRenterTable($_SESSION['hirerId']);

                        for ($i = 0; $i < count($sql); $i++) {
                            $b = $sql[$i];
                            echo "<tr>";
                            for ($c = 0; $c < count($b); $c++) {
                                if ($c != 0) {
                                    echo "<td>" . $b[$c] . "</td>";
                                } elseif ($c == 0) {
                                    echo "<form action='Mieter_bearbeiten.php' method='POST'>";
                                    echo "<input type='hidden' name='renterID' id='renterID' value='" . $b[$c] . "'></input>";
                                }
                            } echo "<td><button class='btn-success' type='submit' name='bearbeiten'>Bearbeiten</button></td> </form>";
                            echo "<td><button class='btn-danger' onClick='deleteObject(". $b[0] .", 4)'>Löschen</button></td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>   
                    </table>
                    <a href="Mieter_erfassen.php" style="float: right;" class="myButton">+</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php";
    ?>