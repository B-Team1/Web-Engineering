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
                <li> <a href="">Jahresabrechnung</a></li>
            </ul>	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                <h2> Rechnung bearbeiten</h2>
                <form id="form" action="Rechnung_bearbeiten.php" method="POST">
                    <label> Rechnungsdatum:</label>     
                    <input type="text" name="rechnungsdatum" value="" size="40" /><br/>
                    <label> Wohnung:</label>
                    <input type="text" name="wohnung" value="" size="40" /><br/>
                    <label> Grund:</label>
                    <input type="text" name="grund" value="" size="40" /><br/>
                    <label> Betrag:</label>
                    <input type="text" name="betrag" value="" size="40" /><br/>
                    <label> Zahlbar bis:</label>
                    <input type="text" name="zahlbar_bis" value="" size="40" /><br/> 
                    <label> Status:</label>
                        <select name="status" style="width:313">
                            <option class="yellow" value="offen">offen</option>
                            <option class="green" value="bezahlt">bezahlt</option>
                            <option class="red" value="verzug">Verzug</option>
                        </select><br/>
                <input type="submit" name="submit" value="speichern" />
                <input type="button" name="cancel" value="abbrechen" onclick="window.open('Heiz-Nebenkosten.php')">
                </form><br/>        
        
            </section>
        </div>
    </body>
</html>
