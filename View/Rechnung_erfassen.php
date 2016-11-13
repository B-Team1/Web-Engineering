<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
        <script type="text/javascript">
    
        </script>
    </head>
    <body>
        <div id="container">
        <header>
            <h1 text align = center>Online-Verwaltungstool</h1> 
            <?php
            $invoicedateErr = $amountErr = $datetopayErr = "";
            $invoicedate = $amount = $datetopay = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["invoicedate"])) {
                    $invoicedateErr = "Rechnungsdatum ist erforderlich";
                } else {
                    $d = DateTime::createFromFormat('d-m-Y', ($_POST["invoicedate"]));
                    if ($d && $d->format('d-m-Y') !== ($_POST["invoicedate"])){
                        $invoicedateErr = "Kein korrektes Datum-Format!";
                    } else {
                    $invoicedate = test_input($_POST["invoicedate"]);
                    }
                }
                                
                if (empty($_POST["amount"])) {
                    $amountErr = "Betrag ist erforderlich";
                } else {
                    if (!is_numeric($_POST["amount"])) {
                        $amountErr = "Betrag muss eine Zahl sein!";
                    } else {
                    $amount = test_input($_POST["amount"]);
                    }
                }
                
                if (empty($_POST["datetopay"])) {
                    $datetopayErr = "Bezahlen bis ist erforderlich";
                } else {
                    $d = DateTime::createFromFormat('d-m-Y', ($_POST["datetopay"]));
                    if ($d && $d->format('d-m-Y') !== ($_POST["datetopay"])){
                        $datetopayErr = "Kein korrektes Datum-Format!";
                    } else {
                    $datetopay = test_input($_POST["datetopay"]);
                    }
                }            
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
        </header>
        <!-- Linke Spalte -->
        <nav>        
            <ul>
                <li><a href="Wohnungen.php">Wohnungen</a></li>
                <li><a href="Heiz-Nebenkosten.php">Heiz & Nebenkosten</a></li>
                <li><a href="Mietzins.php">Mietzins</a></li>
                <li> <a href="Jahresabrechnung.php">Jahresabrechnung</a></li>
            </ul>	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                <h2> Rechnung erfassen</h2>
                <form action="Rechnung_erfassen.php" method="POST">
                    <table>
                        <tr>
                            <td>Rechnungsdatum (dd.mm.jjjj):</td>
                            <td>
                                <input type="date" name="invoicedate" id="invoicedate" pattern="\d{1,2}.\d{1,2}.\d{4}" value="<?php if (isset($_POST['invoicedate'])) echo $_POST['invoicedate']; ?>" 
                                       style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Rechnungsdatum aus!')" oninput="setCustomValidity('')"/>
                                <span class="error">* <?php echo $invoicedateErr;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Wohnung:</td>
                            <td>
                                <select name="apartment" id="apartment" size="" style="width: 270px" required>
                                   
                                    <?php
                                        //$sql = mysqli_query($connection, "SELECT name FROM apartement");
                                        //while ($row = $sql->fetch_assoc()){
                                        //    echo "<option value=\"owner1\">" . $row['username'] . "</option>";
                                        //}
                                    ?>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Beschreibung</td>
                            <td>
                                <input type="text" name="description" id="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"
                                       style="width: 270px" />
                            </td>
                        </tr>
                        <tr>
                           <td>Betrag</td> 
                           <td>
                               <input type="number" name="amount" id="amount" value="<?php if (isset($_POST['amount'])) echo $_POST['amount']; ?>"
                                      size="" style="width:270px" required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Betrag ein!')" oninput="setCustomValidity('')"/>
                                <span class="error">* <?php echo $amountErr;?></span>
                           </td>
                        </tr>
                        <tr>
                            <td>Zahlbar bis:</td>
                            <td>
                                <input type="date" name="datetopay" value="<?php if (isset($_POST['datetopay'])) echo $_POST['datetopay']; ?>" 
                                       style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Enddatum aus!')" oninput="setCustomValidity('')"/>
                                <span class="error">* <?php echo $datetopayErr;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" style="width:270px">
                                    <option class="yellow" value="offen">Offen</option>
                                    <option class="green" value="bezahlt">Bezahlt</option>
                                    <option class="red" value="verzug">Verzug</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="speichern" />
                                <input type="button" name="cancel" value="abbrechen" onclick="window.open('Heiz-Nebenkosten.php')">
                            </td>
                        </tr>
                    </table>
                </form>    
         </section>
        </div>
    </body>
</html>
