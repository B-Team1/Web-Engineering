<?php 
include_once "Header.php";
include '../Validator/login_pruefen.inc.php';
include_once '../Controller/BillController.php';
?>
    <script type="text/javascript" src="js/TableSort.js"></script>
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
    <?php include_once "Navigation.php" ?>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Heiz- & Nebenkostenübersicht</h4>
                            <table class=" table table-responsive  table-bordered table-condensed table-hover sortierbar">
                            <thead>
                                <th class="sortierbar vorsortiert+">Rechnungsdatum</th>
                                <th class="sortierbar">Mieter</th>
                                <th class="sortierbar">Betrag</th>
                                <th class="sortierbar">Bezahlen bis</th>
                                <th class="sortierbar">Status</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $bc = new BillController();
                                $sql = $bc->selectHNBillTable();

                                for ($i = 0; $i < count($sql); $i++) {
                                    $b = $sql[$i];
                                    echo "<tr>";
                                    for ($c = 1; $c < count($b); $c++) {
                                        echo "<td>" . $b[$c] . "</td>";
                                    }
                                    echo "<td><a href='Rechnung_bearbeiten.php'><button class='btn-success'>Bearbeiten</button></a></td>";
                                    echo "<td><button class='btn-danger' onClick='delete_Bill()'>Löschen</button></td>";
                                    echo "</tr>"; 
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="Rechnung_erfassen.php" style="float:right" class="myButton">+</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>
        

