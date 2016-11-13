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
            <?php
            $lastnameErr = $firstnameErr = $password1Err = $password2Err = $emailErr = "";
            $lastname = $firstname = $password1 = $password2 = $email = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["lastname"])) {
                    $lastnameErr = "Name ist erforderlich";
                } else {
                    $lastname = test_input($_POST["lastname"]);
                }
                                
                if (empty($_POST["firstname"])) {
                    $firstnameErr = "Vorname ist erforderlich";
                } else {
                    $firstname = test_input($_POST["firstname"]);
                }
                
                if (empty($_POST["password1"])) {
                    $password1Err = "Ein Passwort ist erforderlich";
                } else {
                    if (strlen($_POST["password1"]) < 6) {
                        $password1Err = "Mindestens 6 Zeichen";
                    } else {
                    $password1 = test_input($_POST["password1"]);   
                    }
                }
                
                if (empty($_POST["password2"])) {
                    $password2Err = "Das Passwort muss widerholt werden";
                } else {
                    if ($_POST["password1"] != $_POST["password2"]) {
                        $password2Err = "Das Passwort stimmt nicht überein";
                    } else {
                    $password2 = test_input($_POST["password2"]);
                    }
                }
                
                if (empty($_POST["email"])) {
                    $emailErr = "E-Mail ist erforderlich";
                } else {
                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        $emailErr = "kein korrektes E-Mail Format";
                    } else {
                    $email = test_input($_POST["email"]);
                }
                }
                
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            ?>
        <!-- Linke Spalte -->
        <nav>        
	
        </nav>
        <!-- Rechte Spalte -->
        <aside>
            
        </aside>
        
        <!-- Mittlere Spalte ( Hauptinhalt -->
            <section id="content">
                <h2> Neuen Benutzer anlegen</h2>  
                <form name="newUser" onsubmit="return mySubmit()" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">  
                    <input type="hidden" name="neuerBenutzer" value="erfassung"/>    
                <table>
                    <tr>
                    <td>Name:</td>
                    <td><input type="text" name="lastname" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" size="40"  oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $lastnameErr;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td>Vorname:</td>
                    <td><input type="text" name="firstname" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" 
                               size="40" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Vornamen ein!')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $firstnameErr;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td>Passwort:</td>
                    <td><input type="password" name="password1" id="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" 
                               size="40" pattern=".{6,}" required oninvalid="this.setCustomValidity('Passwort benötigt mindestens 6 Zeichen')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $password1Err;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td>Passwort wiederholen:</td>
                    <td><input type="password" name="password2" id="password2" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>"
                               size="40" required oninvalid="this.setCustomValidity('Wiederholen Sie bitte das Passwort!')" oninput="setCustomValidity('')"/>
                        <span class="error">* <?php echo $password2Err;?></span>
                    </td>
                    </tr>
                    <tr>
                    <td>E-Mail Adresse:</td>
                    <td><input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="me@example.com"
                               size="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre E-Mail Adresse ein!')" oninput="setCustomValidity('')" />
                        <span class="error">* <?php echo $emailErr;?></span>
                    </td>
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
