    <?php 
    include_once "Header.php";
    include_once '../Controller/HirerController.php';
    ?>
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
            $checkField = true;
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include_once '../Validator/UserValidator';
                if($checkField){
                    $hc = new HirerController();
                    $hc->insertHirer($_POST["email"], $_POST["password1"]);
                }
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