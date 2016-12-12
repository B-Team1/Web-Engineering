<?php 
include_once "Header.php";
include_once '../Controller/RoomController.php';
include '../Validator/login_pruefen.inc.php';
?>
<script type =text/javascript src="js/deletFunction.js"></script>
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
                        <tbody>
                    <?php
                    $rc = new RoomController();
                    $sql = $rc->selectRoomTable();
        
                    for($i=0; $i<count($sql); $i++) {
                        $b = $sql[$i];
                        echo "<tr>";
                        for($c=1; $c<count($b); $c++){
                            if ($c != 1){
                                echo "<td>". $b[$c] . "</td>"; 
                            }else{ 
                                echo "<td><a href='Wohnung_Detailansicht.php'>". $b[$c] . "</a></td>";
                            }
                            
                            
                            
                        }
                        echo "<td><a href='Wohnung_bearbeiten.php'><img src='img/bearbeiten_icon.png' alt='' style='width:10px; height:auto;'></a></td>";
                        echo "<td><a href='Wohnungen.php'><img src='img/loeschen_icon.png' alt='' style='width:15px; height:auto;' onClick='deleteObject(". $b[0] .", 3)'></a></td>";
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
                        <td><a href="Wohnung_erfassen.php" class="myButton">+</a></td>
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; 
    ?>
