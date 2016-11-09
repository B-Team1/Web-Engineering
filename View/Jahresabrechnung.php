<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
        
    </head>
    <body>
        <div id="container">
        <header>
            <h1 text align="center">Online-Verwaltungstool</h1>
        </header>
        
        <!-- Linke Spalte -->
        <nav>  
            <ul>
                <li><a href="Wohnungen.php">Wohnungen</a></li>
                <li><a href="Heiz-Nebenkosten.php">Heiz & Nebenkosten</a></li>
                <li><a href="Mietzins.php">Mietzins</a></li>
                <li><a href="Jahresabrechnung.php">Jahresabrechnung</a></li>
            </ul>	
        </nav>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
           <section id="content">
               <h2>Jahresabrechnung</h2> 
                <table>
                    <tr>
                        <th>Datum</th>
                        <th>Mieter</th>
                        <th>Grund</th>
                        <th>Betrag</th>
                        <th>Bezahlen bis</th>
                        <th>Status</th>                     
                    </tr>
                    <tr>
                        <td>08.11.2016</td>
                        <td>Famillie Müller</td>
                        <td>Reparaturen</td>
                        <td>500.-</td>
                        <td>12.12.2016</td>
                        <td>Bezahlt</td>
                    </tr>                    
                </table>
           </section>
        </div>
    </body>
</html>

