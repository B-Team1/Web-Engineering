<html>
<meta charset="UTF-8">
        <link type="text/css" href="style.css" rel="stylesheet" media="screen" />
        <title>Verwaltungstool</title>
    </head>
    <body>
        <div id="container">
        <header>
            <h1>Online-Verwaltungstool</h1> 
            <script type="text/javascript">
            
            window.onload = function() {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }
            function validatePassword() {
                var pass2 = document.getElementById("password1").value;
                var pass1 = document.getElementById("password2").value;
                if(pass1!==pass2) {
                    document.getElementById("password2").setCustomValidity("Passwörter sind nicht identisch");
                } else {
                    document.getElementById("password2").setCustomValidity('');
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
                    <td><input type="text" name="lastname" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" oninput="setCustomValidity('')"/></td>
                    </tr>
                    <tr>
                    <td>Vorname:</td>
                    <td><input type="text" name="firstname" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Vornamen ein!')" oninput="setCustomValidity('')"/></td>
                    </tr>
                    <tr>
                    <td>Passwort:</td>
                    <td><input type="password" pattern=".{6,}" required oninvalid="this.setCustomValidity('Passwort benötigt mindestens 6 Zeichen')" id="password1" name="password1" value="" size="40" oninput="setCustomValidity('')"/></td>
                    </tr>
                    <tr>
                    <td>Passwort wiederholen:</td>
                    <td><input type="password" name="password2" id="password2" value="" size="40" required oninvalid="this.setCustomValidity('Wiederholen Sie bitte das Passwort!')" oninput="setCustomValidity('')"/></td>
                    </tr>
                    <tr>
                    <td>E-Mail Adresse:</td>
                    <td><input type="email" name="email" value="" size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre E-Mail Adresse ein!')" oninput="setCustomValidity('')" placeholder="me@example.com"/></td>
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
