<html>
<meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
    </head>
    <body>
        <div id="container">
        <header>
            <h1>Online-Verwaltungstool</h1> 
        </header>
        <!-- Linke Spalte -->
        <nav>        
	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                <h2> Neuen Benutzer anlegen</h2>  
                <form name="formular" onsubmit="return mySubmit()" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">  
                    <input type="hidden" name="neuerBenutzer" value="erfassung"/>    
                <table>
                    <tr>
                    <td>Name:</td>
                    <td><input type="text" name="lastname" value="" size="40" /></td>
                    </tr>
                    <tr>
                    <td>Vorname:</td>
                    <td><input type="text" name="firstname" value="" size="40" /></td>
                    </tr>
                    <tr>
                    <td>Passwort:</td>
                    <td><input type="text" name="password1" value="" size="40" /></td>
                    </tr>
                    <tr>
                    <td>Passwort wiederholen:</td>
                    <td><input type="text" name="password2" value="" size="40" /></td>
                    </tr>
                    <tr>
                    <td>E-Mail Adresse:</td>
                    <td><input type="text" name="email" value="" size="40" /></td>
                    </tr>
                    <tr>
                        <td text align = "left"><a href="index.php">Login</a></td>
                    <td text align="left"><input type="submit" name="erfassen" value="erfassen" style="float: center;"/></td>
                    </tr>
                </table>                
                    
                </form><br/>
                
    </body>
            </section>
        </div>
    </body>

  
</html>
