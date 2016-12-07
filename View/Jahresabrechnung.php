    <?php 
    include_once "Header.php"; 
    include_once '../Controller/BillController.php';
    ?>
        </head>
    <body>
        <div class="brand">Online-Verwaltungstool</div>
        <?php include_once "Navigation.php"; ?>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Jahresabrechnung</h4>
                        <table class="table-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>Rechnungsdatum</th>
                                    <th>Mieter</th>
                                    <th>Betrag</th>
                                    <th>Bezahlen bis</th>
                                    <th>Status</th> 
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
                        <a href='../Pdf/PdfGenerator.php'<button>PDF erzeugen</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
       <?php include_once "Footer.php"; ?>

