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
                <h2> Wohnung erfassen</h2>
                <form id="form" action="Wohnung_erfassen.php" method="POST">
                    <label> Name:</label>     
                    <input type="text" name="lastname" value="" size="40" /><br/>
                    <label> Vorname:</label>
                    <input type="text" name="firstname" value="" size="40" /><br/>
                    <label> Telefon:</label>
                    <input type="text" name="phone" value="" size="40" /><br/>
                    <label> Strasse:</label>
                    <input type="text" name="street" value="" size="40" /><br/>
                    <label> Ort:</label>
                    <input type="text" name="plz" value="" size="40" /><br/> 
                    <label> Vertragsstart:</label>
                    <input type="date" name="contractstart" value="" size="40" /><br/>  
                <input type="submit" name="submit" value="speichern" />
                <input type="button" name="cancel" value="abbrechen" onclick="window.open('Wohnungen.php')">
                </form><br/>        
        
            </section>
        </div>
    </body>
</html>
