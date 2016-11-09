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
                <li> <a href=Jahresabrechnung.php"">Jahresabrechnung</a></li>
            </ul>	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                <h2> Wohnung bearbeiten</h2>
                <form id="form" action="Wohnung_bearbeiten.php" method="POST">
                    <table>
                    <tr>
                    <td> Name:</td>     
                    <td><input type="text" name="lastname" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" 
                               oninput="setCustomValidity('')"/><br/></td>
                    </tr>
                    <tr>
                    <td> Vorname:</td>
                    <td><input type="text" name="firstname" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Vornamen ein!')" 
                               oninput="setCustomValidity('')"/><br/></td>
                    </tr>
                    <tr>
                    <td> Telefon:</td>
                    <td><input type="text" name="phone" pattern= "[0-9]" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre Telefonnummer in folgendem Format ein: 079 123 12 12!')" 
                               oninput="setCustomValidity('')" placeholder="079 111 11 11"/><br/></td>
                    </tr>
                    <tr>
                    <td> Strasse:</td>
                    <td><input type="text" name="street" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" 
                               oninput="setCustomValidity('')"/><br/></td>
                    </tr>
                    <tr>
                    <td> Ort:</td>
                    <td><input type="text" name="plz" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" 
                               oninput="setCustomValidity('')"/><br/> </td>
                    </tr>
                    <tr>
                    <td> Vertragsstart:</td>
                    <td><input type="date" name="contractstart" value="" size="40" /><br/></td>
                    </tr>
                    <tr>
                    <td><input type="submit" name="submit" value="speichern" /></td>
                    <td><input type="button" name="cancel" value="abbrechen" onclick="window.open('Wohnungen.php')"></td>
                    </tr>
                    <table/>
                    
                </form><br/>        
        
            </section>
        </div>
    </body>
</html>
