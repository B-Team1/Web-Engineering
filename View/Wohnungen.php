<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
    </head>
    <body>
        <div id="container">
        <header>
            <h1 text-algin="center">Online-Verwaltungstool</h1>
        </header>
            <script type =text/javascript>
                function delete_room() {
                    Check = confirm("Wollen Sie die Wohnung wirklich löschen?");
                    if (Check == false){
                        // löscht den Eintrag nicht
                        alert("Wohnung xy wurde nicht gelöscht");
                    } else {
                        // Wohnung löschen
                        alert("Wohnung xy wurde gelöscht");
                    }
                }
             </script>
        <!-- Linke Spalte -->
        <nav>  
            <ul>
                <li><a href="Wohnungen.php">Wohnungen</a></li>
                <li><a href="Heiz-Nebenkosten.php">Heiz & Nebenkosten</a></li>
                <li><a href="Mietzins.php">Mietzins</a></li>
                <li><a href="Jahresabrechnung.php">Jahresabrechnung</a></li>
            </ul>	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
           <section id="content">
               <h2> Wohnungsübersicht</h2> 
                <table>
                    <tr>
                        <th>Wohnung</th>
                        <th>Mieter</th>
                        <th>Adresse</th>
                        <th>Fläche m2</th>
                        <th>Bearbeiten</th>
                        <th>Löschen</th>
                    </tr>
                    <tr>
                        <td>Erdgeschoss 1 </td>
                        <td>Famillie Müller</td>
                        <td>Sonnenweg 6a</td>
                        <td>80</td>
                        <td>                          
                            <img src="bearbeiten_icon.png" alt="" style="width:10px; height:auto;">
                        </td>
                        <td>
                            <a href="Wohnungen.php">
                                <img src="loeschen_icon.png" alt="" style="width:15px; height:auto;" onClick="delete_room()">
                            </a></td>
                    </tr>
                    <!-- letzte Zeile für Add-Button -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="Wohnung_erfassen.php" class="myButton">+</a></td>
                </table>
           </section>
        </div>
    </body>
</html>
