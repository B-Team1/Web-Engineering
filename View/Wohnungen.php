<?php 
include_once "Header.php";
include_once '../Controller/RoomController.php';
include '../Validator/login_pruefen.inc.php';
?>
<script type =text/javascript>
    function delete_room(roomId) {
        Check = confirm("Wollen Sie die Wohnung wirklich löschen?");
        
        if (Check == false) {
            // löscht den Eintrag nicht
            alert("Wohnung xy wurde nicht gelöscht");
        } else {
            alert("Wohnung xy wurde gelöscht");
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
                    <h4>Wohnungsübersicht</h4>
                    <!--- test -->
                    <table class="table-responsive" width="100%">
                         <thead>
                            <tr>
                                <th>Wohnung</th>
                                <th>Mieter</th>
                                <th>Adresse</th>
                                <th>Fläche m2</th>
                                <th>Bearbeiten</th>
                                <th>Löschen</th>
                            </tr>
                        </thead>
                    
                    <?php
                  //  $rc = new RoomController();
                  //  echo $rc->selectAllRoomsByHirer()[0][0];
                    
                    /*tabelle generieren*/  
                 //   foreach ($zeile as $rc->selectAllRoomsByHirer()) {
                        echo "<tr>";
                        echo "<td>" . $zeile['Bezeichnung'] . "</td>";
                        echo "<td>" . $zeile['Name'] . "</td>";
                        echo "<td>" . $zeile['Strasse'] . "</td>";
                        echo "<td>" . $zeile['Fläche'] . "</td>";
                        echo "<td>" . $zeile['strasse'] . "</td>";
                        echo "</tr>";
                  //  }
                    ?>
                    </table>
                    
                    
                    
                    <table class="table-responsive" width="100%">
                        <thead>
                            <tr>
                                <th>Wohnung</th>
                                <th>Mieter</th>
                                <th>Adresse</th>
                                <th>Fläche m2</th>
                                <th>Bearbeiten</th>
                                <th>Löschen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href=Wohnung_Detailansicht.php>Erdgeschoss 1</a></td>
                                <td>Famillie Müller</td>
                                <td>Sonnenweg 6a</td>
                                <td>80</td>
                                <td> 
                                    <a href="Wohnung_bearbeiten.php">
                                        <img src="img/bearbeiten_icon.png" alt="" style="width:10px; height:auto;">
                                    </a>
                                </td>
                                <td>
                                    <a href="Wohnungen.php">
                                        <img src="img/loeschen_icon.png" alt="" style="width:15px; height:auto;" onClick="delete_room()">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href=Wohnung_Detailansicht.php>Erdgeschoss 1</a></td>
                                <td>Famillie Müller</td>
                                <td>Sonnenweg 6a</td>
                                <td>80</td>
                                <td> 
                                    <a href="Wohnung_bearbeiten.php">
                                        <img src="img/bearbeiten_icon.png" alt="" style="width:10px; height:auto;">
                                    </a>
                                </td>
                                <td>
                                    <a href="Wohnungen.php">
                                        <img src="img/loeschen_icon.png" alt="" style="width:15px; height:auto;" onClick="delete_room(2)">
                                    </a>
                                </td>
                            </tr>
                            <!-- letzte Zeile für Add-Button -->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="Wohnung_erfassen.php" class="myButton">+</a></td>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>
