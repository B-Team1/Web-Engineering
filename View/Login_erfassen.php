    <?php include_once "Header.php"; ?>
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
</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <div class="container">
        <div class="row">
            <div class="box">
                 <div class="col-lg-3">
                    <form role="form" name="newUser" onsubmit="return mySubmit()" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <div class="row">
                                <label>Name: *</label>
                                <input type="text" name="lastname" class="form-control" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" oninput="setCustomValidity('')"/><span class="error"><?php echo $lastnameErr;?></span>
                            </div>
                            <div class="row">
                                <label>Vorname: *</label>
                                <input type="text" name="firstname" class="form-control" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Vornamen ein!')" oninput="setCustomValidity('')"/>
                                    <span class="error"><?php echo $firstnameErr;?></span>
                            </div>
                            <div class="row">
                                <label>Passwort: *</label>
                                <input type="password" name="password1" class="form-control" id="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" pattern=".{6,}" required oninvalid="this.setCustomValidity('Passwort benötigt mindestens 6 Zeichen')" oninput="setCustomValidity('')"/>
                                <span class="error"><?php echo $password1Err;?></span>
                            </div>   
                            <div class="row">
                                <label>Passwort wiederholen: *</label>
                                <input type="password" name="password2" class="form-control" id="password2" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" required oninvalid="this.setCustomValidity('Wiederholen Sie bitte das Passwort!')" oninput="setCustomValidity('')"/>
                                <span class="error"><?php echo $password2Err;?></span>
                            </div> 
                            <div class="row">
                                <label>E-Mail Adresse: *</label>
                                <input type="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="me@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre E-Mail Adresse ein!')" oninput="setCustomValidity('')" />
                                <span class="error"><?php echo $emailErr;?></span>
                            </div> 
                            <div class="row">
                                <br>
                                <button type="submit" name="erfassen" class="btn btn-primary">Erfassen</button>
                                <a href="index.php">Login</a>
                            </div>    
                    </form>
                 </div>
                </div>
            </div>
        </div>
    </div>                  
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>





















