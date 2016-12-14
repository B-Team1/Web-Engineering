<?php 
include_once "Header.php";
include_once '../Controller/BillController.php';
?>
        <script type =text/javascript src="js/deletFunction.js"></script>
        </head>
    <body>
        <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php" ?>
        
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Heiz- & Nebenkostenübersicht</h4>
                        <table class="table table-responsive table-bordered table-condensed table-hover sortierbar" >
                            <thead>
                                <th>Rechnungsdatum</th>
                                <th>Mieter</th>
                                <th>Betrag</th>
                                <th>Bezahlen bis</th>
                                <th>Status</th>
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
                                    for ($c = 0; $c < count($b); $c++) {
                                    if ($c != 0) {
                                        echo "<td>" . $b[$c] . "</td>";
                                    } else {
                                        echo "<form action='Rechnung_bearbeiten.php' method='POST'>";
                                        echo "<input type='hidden' name='billID' id='billID' value='" . $b[$c] . "'></input>";
                                    } 
                                    }
                                    echo "<td><button class='btn-success' type='submit' name='bearbeiten'>Bearbeiten</button></td>";
                                    echo "<td><button class='btn-danger' onClick='deleteObject(". $b[0] .", 1)'>Löschen</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="Rechnung_erfassen.php" style="float: right;" class="myButton">+</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>
        

