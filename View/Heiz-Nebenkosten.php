<?php 
include_once "Header.php";
include '../Validator/login_pruefen.inc.php';
?>
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
                        <table class="table-responsive" width="100%">
                            <thead>
                                <th>Datum</th>
                                <th>Mieter</th>
                                <th>Beschreibung</th>
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
                                            <img src="img/bearbeiten_icon.png" alt="" style="width:10px; height:auto;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="Heiz-Nebenkosten.php">
                                            <img src="img/loeschen_icon.png" alt="" style="width:15px; height:auto;" onClick="delete_Bill()">
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
        <?php include_once "Footer.php"; ?>
        

