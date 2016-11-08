<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
    </head>
    <body>
        <div id="container">
        <header>
            <h1 text align = center>Willkommen auf dem Online-Verwaltungstool </h1> 
        </header>
        <!-- Linke Spalte -->
        <nav>        
	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                    
        
                <form id ="form" action="Wohnungen.php" method="POST">
                <label>E-Mail:</label>
                <input type="text" name="email" value="" size="40" /><br/>
                <label>Passwort:</label>
                <input type="password" name="password" value="" size="40" /><br/><br/>
                <input type="submit" name="submit" value="login" />
                </form><br/>
                <a href="login_erfassen.php">Registieren </a><br/>
                <a href="Passwort_vergessen.php">Passwort vergessen</a><br/>
            </section>
        </div>
    </body>
</html>
