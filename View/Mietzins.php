    <?php 
    include_once "Header.php"; 
    include_once '../Controller/BillController.php';
    ?>
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
                        <table class="table-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>Rechnungsdatum</th>
                                    <th>Mieter</th>
                                    <th>Betrag</th>
                                    <th>Bezahlen bis</th>
                                    <th>Status</th>
                                    <th>Bearbeiten</th>
                                    <th>Löschen</th>
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
                                    echo "<td><a href='Rechnung_bearbeiten.php'><img src='img/bearbeiten_icon.png' alt='' style='width:10px; height:auto;'></a></td>";
                                    echo "<td><a href='Mietzins.php'><img src='img/loeschen_icon.png' alt='' style='width:15px; height:auto;' onClick='delete_Bill()'></a></td>";
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
                            <td><a href="Miete_erfassen.php" class="myButton">+</a></td>
                            </tbody>
                        </table>
                                
                                <!--
                                <tr>
                                    <td>08.11.2016</td>
                                    <td>Famillie Müller</td>
                                    <td>Miete</td>
                                    <td>1500.-</td>
                                    <td>12.12.2016</td>
                                    <td>
                                        <select name="status">
                                            <option class="yellow" value="offen">Offen</option>
                                            <option class="green" value="bezahlt">Bezahlt</option>
                                            <option class="red" value="verzug">Verzug</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="Miete_bearbeiten.php">
                                            <img src="img/bearbeiten_icon.png" alt="" style="width:10px; height:auto;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="Mietzins.php">
                                            <img src="img/loeschen_icon.png" alt="" style="width:15px; height:auto;" onClick="delete_RentalFee()">
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
                            <td><a href="Miete_erfassen.php" class="myButton">+</a></td>
                            </tbody>
                        </table>
                                --->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>

