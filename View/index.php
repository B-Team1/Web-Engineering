<?php
ob_start();
session_start();
include_once "Login_Header.php";
require_once  '../Controller/HirerController.php';



$loginErr = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) AND isset($_POST['password'])) {
        $hirerController = new HirerController();
        if ($hirerController->checkLogin($_POST['email'], $_POST['password'])) {
            $_SESSION['eingeloggt'] = true;
            $_SESSION['hirerId'] = $hirerController->getHirerByMail($_POST['email'])->getHirerId();
            header("Location: Wohnungen.php");
            exit();
        } else {
            $_SESSION['eingeloggt'] = false;
            $loginErr = "E-Mail oder Passwort ungültig!";
        } 
        
    }
}

// Session beenden 
// damit können wir diese Seite als "Logout" verwenden
session_unset();
session_destroy();
unset($_SESSION); // Session-Array löschen

?>
</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <form role="form" action="index.php" method="POST">
                        <div class="col-lg-4">    
                            <div class="row">
                                <div class="form-group">
                                    <label>E-Mail:</label>
                                    <input type="text" name="email" class="form-control">
                                    <span class="error"><?php echo $loginErr; ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Passwort:</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                    </form>
                    <p>
                        <a href="Login_erfassen.php">Registieren </a>
                    </p>
                    <p>
                        <a href="mailto:marco.loosli@students.fhnw.ch?subject=Passwort vergessen&body=Guten Tag, leider habe ich mein Passwort vergessen. Ich bitte Sie mir ein neues Passwort auf diese Mail-Adresse zu senden.">Passwort vergessen</a>    
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>                  
<!-- /.container -->
<?php include_once "Footer.php"; ?>
