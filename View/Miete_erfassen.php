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
                <h2>Miete erfassen</h2>
                <form name="newRent" action="Miete_erfassen.php" method="POST">
                    <label> Rechnungsdatum:</label>     
                    <input type="date" name="rechnungsdatum" value="" size="40" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Rechnungsdatum aus!')" oninput="setCustomValidity('')"/><br/>
                    <label> Wohnung:</label>
                    <select name="apartment" style="width:313">
                        <option value="Wohnung 1">Wohnung 1</option>
                        <option value="Wohnung 2">Wohnung 2</option>
                        <option value="Wohnung 3">Wohnung 3</option>                        
                    </select><br/>
                    <label> Beschreibung:</label>
                    <input type="text" name="description" value="" size="40"/><br/>
                    <label> Betrag:</label>
                    <input type="number" name="amount" value="" size="40" pattern= "[0-9]" required oninvalid="this.setCustomValidity('Geben Sie bitte den Betrag in Zahlen ein!')" oninput="setCustomValidity('')"/><br/>
                    <label> Zahlbar bis:</label>
                    <input type="datetime" name="zahlbar_bis" value="" size="40" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Enddatum aus!')" oninput="setCustomValidity('')"/><br/>
                    <label> Status:</label>
                        <select name="status" style="width:313">
                            <option class="yellow" value="offen">Offen</option>
                            <option class="green" value="bezahlt">Bezahlt</option>
                            <option class="red" value="verzug">Verzug</option>
                        </select><br/>
                <input type="submit" name="submit" value="speichern" />
                <input type="button" name="cancel" value="abbrechen" onclick="window.open('Mietzins.php')">
                </form><br/>     
        
            </section>
        </div>
    </body>
</html>
