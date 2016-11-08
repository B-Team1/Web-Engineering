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
               <h2>Mietübersicht</h2>
                <table>
                    <tr>
                        <th>Datum</th>
                        <th>Mieter</th>
                        <th>Grund</th>
                        <th>Betrag</th>
                        <th>Bezahlen bis</th>
                        <th>Status</th>
                        <th>Bearbeiten</th>
                        <th>Löschen</th>                        
                    </tr>
                    <tr>
                        <td>08.11.2016</td>
                        <td>Famillie Müller</td>
                        <td>Miete</td>
                        <td>1500.-</td>
                        <td>12.12.2016</td>
                        <td>
                             <select name="status">
                                <option value="offen">offen</option>
                                <option value="bezahlt">bezahlt</option>
                                <option value="verzug">Verzug</option>
                            </select>
                        </td>
                        <td>IMG</td>
                        <td>IMG</td>
                    </tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="Miete_erfassen.php" class="myButton">+</a></td>
                </table>
           </section>
        </div>
    </body>
</html>
