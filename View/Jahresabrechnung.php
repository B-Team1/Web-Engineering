<?php
    include_once "Header.php"; 
    include_once '../Controller/BillController.php';
    ?>
    <script type="text/javascript" src="js/TableSort.js"></script>
    </head>
    <body>
        <div class="brand">Online-Verwaltungstool</div>
        <?php include_once "Navigation.php"; ?>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Jahresabrechnung</h4>
                            <table class=" table table-responsive  table-bordered table-condensed table-hover sortierbar">
                            <thead>
                                <tr>
                                    <th class="sortierbar vorsortiert+">Rechnungsdatum</th>
                                    <th class="sortierbar">Mieter</th>
                                    <th class="sortierbar">Betrag [Fr.]</th>
                                    <th class="sortierbar">Bezahlen bis</th>
                                    <th class="sortierbar">Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bc = new BillController();
                                $sql = $bc->selectYearBillTable();

                                for ($i = 0; $i < count($sql); $i++) {
                                    $b = $sql[$i];
                                    echo "<tr>";
                                    for ($c = 1; $c < count($b); $c++) {
                                        echo "<td>" . $b[$c] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href='../Pdf/PdfGenerator.php' target="_blank"><button>PDF erzeugen</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
       <?php include_once "Footer.php"; ?>

