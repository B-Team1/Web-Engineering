<?php
include_once "Header.php";
include_once '../Controller/RoomController.php';
?>
<script type =text/javascript src="js/deletFunction.js"></script>
<script type="text/javascript" src="js/TableSort.js"></script>
</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <?php include_once "Navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4>Wohnungsübersicht</h4>
                    <table class="table table-responsive table-bordered table-condensed table-hover sortierbar" >
                        <thead>
                            <tr>
                                <th class="sortierbar vorsortiert+">Wohnung</th>
                                <th class="sortierbar">Mieter</th>
                                <th class="sortierbar">Adresse</th>
                                <th class="sortierbar">Fläche [m²]</th>
                                <th class="sortierbar">Mietzins [Fr.]</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rc = new RoomController();
                            $sql = $rc->selectRoomTable();

                            for ($i = 0; $i < count($sql); $i++) {
                                $b = $sql[$i];
                                echo "<tr>";
                                for ($c = 0; $c < count($b); $c++) {
                                    if ($c != 0) {
                                        echo "<td>" . $b[$c] . "</td>";
                                    } elseif ($c == 0) {
                                        echo "<form action='Wohnung_bearbeiten.php' method='POST'>";
                                        echo "<input type='hidden' name='wohnungID' id='wohnungID' value='" . $b[$c] . "'></input>";
                                    }
                                } echo "<td><button class='btn-success' type='submit' name='bearbeiten'>Bearbeiten</button></td> </form>";
                                echo "<td><button class='btn-danger' onClick='deleteObject(" . $b[0] . ", 3)'>Löschen</button></td>";
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