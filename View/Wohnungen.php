<?php 
include_once "Header.php";
include_once '../Controller/RoomController.php';
include '../Validator/login_pruefen.inc.php';


?>
<script type="text/javascript" src="js/TableSort.js"></script>
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
                    
                    <table class="table table-responsive table-bordered table-condensed table-hover sortierbar" >
                        <thead>
                            <tr>
                                <th class="sortierbar vorsortiert+">Wohnung</th>
                                <th class="sortierbar">Mieter</th>
                                <th class="sortierbar">Adresse</th>
                                <th class="sortierbar">Fläche m2</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    $rc = new RoomController();
                    $sql = $rc->selectRoomTable();
        
                    for($i=0; $i<count($sql); $i++) {
                        $b = $sql[$i];
                        echo "<tr>";
                        for($c=0; $c<count($b); $c++){
                            if ($c !=0 & $c !=1){
                                echo "<td>". $b[$c] . "</td>";     
                            }elseif($c == 0){
                                echo "<form action='Wohnung_bearbeiten.php' method='POST'>";
                                echo "<input type='hidden' name='wohnungID' id='wohnungID' value='".$b[$c]."'></input>";
                                
                            }else{
                                echo "<td><a href='Wohnung_Detailansicht.php'>". $b[$c] . "</a></td>";    
                            }
                            
                    }   echo "<td><button class='btn-success' type='submit' name='bearbeiten'>Bearbeiten</button></td>";
                        echo "<td><button class='btn-danger' onClick='delete_room()'>Löschen</button></td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    ?>    
                        
                        </tbody>   
                    </table>
                    <a href="Wohnung_erfassen.php" style="float: right;" class="myButton">+</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php"; 
    ?>
