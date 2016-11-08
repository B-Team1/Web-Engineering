<html>
<meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
    </head>
    <body>
        <div id="container">
        <header>
            <h1>Online Verwaltungstool</h1> 
            <script type="text/javascript">
            
            window.onload = function() {
                document.getElementById("password").onchange = validatePassword;
                document.getElementById("confirm_password").onchange = validatePassword;
            }
            function validatePassword() {
                var pass2 = document.getElementById("confirm_password").value;
                var pass1 = document.getElementById("password").value;
                if(pass1!==pass2) {
                    document.getElementById("confirm_password").setCustomValidity("Passwörter sind nicht identisch");
                } else {
                    document.getElementById("confirm_password").setCustomValidity('');
                }
            }
            </script>
            
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
                <form name="newUser" onsubmit="return mySubmit()" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">  
                    <input type="hidden" name="neuerBenutzer" value="erfassung"/>    
                <table>
                    <tr>
                    <td>Name:</td>
                    <td><input type="text" name="lastname" value="" size="40" required=""/></td>
                    </tr>
                    <tr>
                    <td>Vorname:</td>
                    <td><input type="text" name="firstname" value="" size="40" required=""/></td>
                    </tr>
                    <tr>
                    <td>Passwort:</td>
                    <td><input type="password" pattern=".{6,}" oninvalid="this.setCustomValidity('Passwort benötigt mindestens 6 Zeichen')" id="password" required name="password1" value="" size="40" /></td>
                    </tr>
                    <tr>
                    <td>Passwort wiederholen:</td>
                    <td><input type="password" name="password2" value="" size="40" required/></td>
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
