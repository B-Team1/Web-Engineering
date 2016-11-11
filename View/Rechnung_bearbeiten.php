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
                <h2> Rechnung bearbeiten</h2>
                <form action="Rechnung_bearbeiten.php" method="POST">
                    <table>
                        <tr>
                            <td>Rechnungsdatum:</td>
                            <td>
                                <input type="text" name="rechnungsdatum" value="" size="40" />
                            </td>
                        </tr>
                        <tr>
                            <td>Wohnung:</td>
                            <td>
                                <input type="text" name="wohnung" value="" size="40" />
                            </td>
                        </tr>
                        <tr>
                            <td>Beschreibung:</td>
                            <td>
                                <input type="text" name="description" value="" size="40" />
                            </td>
                        </tr>
                        <tr>
                            <td>Betrag:</td>
                            <td>
                                <input type="text" name="betrag" value="" size="40" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zahlbar bis:</td>
                            <td>
                                <input type="text" name="zahlbar_bis" value="" size="40" />
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="status" style="width:313">
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
