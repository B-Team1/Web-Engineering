<?php 
include_once "Header.php";
include '../Validator/login_pruefen.inc.php';
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
                        <table class="table-responsive" width="100%">
                            <thead>
                                <th>Rechnungsdatum</th>
                                <th>Mieter</th>
                                <th>Betrag</th>
                                <th>Bezahlen bis</th>
                                <th>Status</th>
                                <th>Bearbeiten</th>
                                <th>Löschen</th>
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
                                    echo "<td><a href='Rechnung_bearbeiten.php'><img src='img/bearbeiten_icon.png' alt='' style='width:10px; height:auto;'></a></td>";
                                    echo "<td><a href='Heiz-Nebenkosten.php'><img src='img/loeschen_icon.png' alt='' style='width:15px; height:auto;' onClick='deleteObject(". $b[0] .", 1)'></a></td>";
                                    echo "</tr>";
                                }
                                ?>
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
        <?php include_once "Footer.php"; ?>
        

