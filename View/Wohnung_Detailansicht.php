    <?php include_once "Header.php";?>
        <script type =text/javascript>
            window.onload = function() {
                document.getElementById("room").disabled= true;    
                document.getElementById("lastname").disabled= true;
                document.getElementById("firstname").disabled= true; 
                document.getElementById("street").disabled= true; 
                document.getElementById("rental_fee").disabled= true; 
                document.getElementById("phone").disabled= true; 
                document.getElementById("contractstart").disabled= true;
                document.getElementById("plz").disabled= true; 
                document.getElementById("city").disabled= true;
                document.getElementById("submit").style.display='none';
            } 
            
            function edit_Renter (){
            document.getElementById("lastname").disabled= false;
            document.getElementById("firstname").disabled= false; 
            document.getElementById("street").disabled= false; 
            document.getElementById("rental_fee").disabled= false; 
            document.getElementById("phone").disabled= false; 
            document.getElementById("contractstart").disabled= false;
            document.getElementById("plz").disabled= false; 
            document.getElementById("city").disabled= false;
            document.getElementById("edit").style.display='none';
            document.getElementById("submit").style.display='block';
            }
        </script>
        </head>
        <div class="brand">Online-Verwaltungstool</div>
        <?php include_once "Navigation.php"; ?>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Wohnungsname</h4>
                        <div class="col-lg-4">
                            <form name="room_details" action="Wohnung_Detailansicht.php" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <table class="table-responsive" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Übersicht</th>
                                            <th>Angaben</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> Wohnung:</td>
                                            <td>
                                                <input type="text" name="room" id="room" class="form-control" value="Erdgeschoss 1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Name:</td>
                                            <td>
                                                <input type="text" name="lastname" id="lastname" class="form-control" value="Thüring"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Vorname:</td>
                                            <td>
                                                <input type="text" name="firstname" id="firstname" class="form-control" value="Tobias"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Adresse:</td>
                                            <td>
                                                <input type="text" name="street" id="street" value="" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte die Adresse ein!')" 
                                                       oninput="setCustomValidity('')"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Ort:</td>
                                            <td>
                                                <input type="text" name="city" id="city" value="" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> PLZ:</td>
                                            <td>
                                                <input type="text" name="plz" id="plz" value="" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Mietzins:</td>
                                            <td>
                                                <input type="text" name="rental_fee" id="rental_fee" value="xxx" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Telefon-Nr:</td>
                                            <td>
                                                <input type="text" name="phone" id="phone" pattern= "[0-9]" value="" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre Telefonnummer in folgendem Format ein: 079 123 12 12!')" 
                                                       oninput="setCustomValidity('')" placeholder="079 111 11 11"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Mietbeginn:</td>
                                            <td>
                                                <input type="date" name="contractstart" id="contractstart" class="form-control" value=""/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <button type="submit" id="submit" name="submit" value="Speichern" onclick="window.open('Wohnungen.php')" class="btn btn-primary">Speichern</button>
                                    <button type="button" id="edit" onclick="edit_Renter()" class="btn btn-primary">Bearbeiten</button>
                                </div>
                                
                            </form>   
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>



