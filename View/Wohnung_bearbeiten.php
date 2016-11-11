<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
    </head>
    <body>
        <div id="container">
        <header>
            <h1 text align = center>Online-Verwaltungstool</h1>
            <?php
            $nameErr = $expanseErr = $floorErr = $rentErr = "";
            $name = $expanse = $floor = $rent = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Wohnungsname ist erforderlich";
                } else {
                    $name = test_input($_POST["name"]);
                }
                                
                if (empty($_POST["expanse"])) {
                    $expanseErr = "Fläche ist erforderlich";
                } else {
                    $expanse = test_input($_POST["expanse"]);
                }
                
                if (empty($_POST["floor"])) {
                    $floorErr = "Stockwerk ist erforderlich";
                } else {
                    $floor = test_input($_POST["floor"]);   
                }
                                
                if (empty($_POST["rent"])) {
                    $rentErr = "Miete ist erforderlich";
                } else {
                    $rent = test_input($_POST["rent"]);
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
                <li> <a href=Jahresabrechnung.php"">Jahresabrechnung</a></li>
            </ul>	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                <h2> Wohnung bearbeiten</h2>
                <form action="Wohnung_erfassen.php" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <table>
                    <tr>
                    <td> Wohnungsname:</td>     
                    <td><input type="text" name="name" id="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" 
                               size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte den Namen der Wohnung ein!')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $nameErr;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td> Fläche [m^2]:</td>
                    <td><input type="number" name="expanse" id="expanse" value="<?php if (isset($_POST['expanse'])) echo $_POST['expanse']; ?>"
                               size="40" required pattern="[0-9]" oninvalid="this.setCustomValidity('Geben Sie bitte die Fläche als Zahl ein!')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $expanseErr;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td> Stockwerk:</td>
                    <td><input type="number" name="floor" id="floor"  value="<?php if (isset($_POST['floor'])) echo $_POST['floor']; ?>"    
                               size="40" required pattern="[0-9]" oninvalid="this.setCustomValidity('Geben Sie bitte das Stockwerk als Zahl ein!')" oninput="setCustomValidity('')" />
                        <span class="error">* <?php echo $floorErr;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td> Mietzins [Fr.]:</td>
                    <td><input type="number" name="rent" id="rent" value="<?php if (isset($_POST['rent'])) echo $_POST['rent']; ?>"
                               size="40" required pattern="[0-9]" oninvalid="this.setCustomValidity('Geben Sie bitte den Mietzins pro Monat ein!')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $rentErr;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td><input type="submit" name="submit" value="speichern" /></td>
                    <td><input type="button" name="cancel" value="abbrechen" onclick="window.open('Wohnungen.php')"></td>
                    </tr>
                    </table>
                </form><br/>
            </section>
        </div>
    </body>
</html>
