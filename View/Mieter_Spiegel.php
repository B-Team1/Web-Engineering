<?php
include_once "Header.php";
include_once '../Controller/RenterController.php';
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
                                <th class="sortierbar">Fläche m2</th>
                                <th class="sortierbar">Miete</th>
                                <th class="sortierbar">Name</th>
                                <th class="sortierbar">Vorname</th>
                                <th class="sortierbar">Telefon</th>
                                <th class="sortierbar">Vertragsstart</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rc = new RenterController();
                            $sql = $rc->selectRenterRoomTable();
                            for ($i = 0; $i < count($sql); $i++) {
                                $b = $sql[$i];
                                echo "<tr>";
                                for ($c = 0; $c < count($b); $c++) {
                                        echo "<td>" . $b[$c] . "</td>";
                                } 
                                echo "</tr>";
                            }
                            ?>    
                        </tbody>   
                    </table>
                    <a href='../Pdf/Mieterspiegel_PDF.php' target="_blank"><button>PDF erzeugen</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include_once "Footer.php";
    ?>    
