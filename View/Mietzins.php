    <?php 
    include_once "Header.php"; 
    include_once '../Controller/BillController.php';
    ?>
    <script type="text/javascript" src="js/TableSort.js"></script>
        <script type =text/javascript>
            function delete_RentalFee() {
                Check = confirm("Wollen Sie die Miet-Rechnung wirklich löschen?");
                if (Check == false) {
                    // löscht den Eintrag nicht
                    alert("Miet-Rechnung xy wurde nicht gelöscht");
                } else {
                    // Wohnung löschen
                    alert("Miet-Rechnung xy wurde gelöscht");
                }
            }
        </script>
    </head>
    <body>
        <div class="brand">Online-Verwaltungstool</div>
        <?php include_once "Navigation.php"; ?>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Miet-Übersicht</h4>
                            <table class=" table table-responsive  table-bordered table-condensed table-hover sortierbar">
                            <thead>
                                <tr>
                                    <th class="sortierbar vorsortiert+">Rechnungsdatum</th>
                                    <th class="sortierbar">Mieter</th>
                                    <th class="sortierbar">Betrag</th>
                                    <th class="sortierbar">Bezahlen bis</th>
                                    <th class="sortierbar">Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bc = new BillController();
                                $sql = $bc->selectRoomBillTable();

                                for ($i = 0; $i < count($sql); $i++) {
                                    $b = $sql[$i];
                                    echo "<tr>";
                                    for ($c = 1; $c < count($b); $c++) {
                                        echo "<td>" . $b[$c] . "</td>";
                                    }
                                    echo "<td><a href='Miete_bearbeiten.php'><button class='btn-success'>Bearbeiten</button></a></td>";
                                    echo "<td><button class='btn-danger' onClick='delete_RentalFee()'>Löschen</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="Miete_erfassen.php" style="float:right" class="myButton">+</a>        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>

