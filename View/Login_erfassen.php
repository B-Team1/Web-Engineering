<?php
include_once "Login_Header.php";
include_once '../Controller/HirerController.php';
include_once '../Validator/UserValidator.php';
include_once '../Model/Hirer.php';

$hirer = new Hirer();
$userValidator = new UserValidator();

if (!empty($_POST)) {

    $hirer = new Hirer(null, $_POST['email'], $_POST['password1'], $_POST['password2']);
    $userValidator = new UserValidator($hirer);

    if ($userValidator->isValid()) {
        $hc = new HirerController();
        $userValidator = $hc->insertHirer($_POST["email"], $_POST["password1"], $userValidator);
    }
}
?>
<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password1").value;
        var pass1 = document.getElementById("password2").value;
        if (pass1 !== pass2) {
            document.getElementById("password2").setCustomValidity("Passwörter sind nicht identisch");
        } else {
            document.getElementById("password2").setCustomValidity('');
        }
    }
</script>

</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-3">
                    <form role="form" name="newUser" onsubmit="return mySubmit()" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                        <?php include_once("Registration_Formular.php"); ?>

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