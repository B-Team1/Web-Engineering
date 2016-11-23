<?php include_once "Header.php"; ?>
</head>
<body>
    <div class="brand">Online-Verwaltungstool</div>
    <div class="container">
        <div class="row">
            <div class="box">
                 <div class="col-lg-12">
                    <form role="form" action="Wohnungen.php" method="POST">
                    <div class="col-lg-4">    
                        <div class="row">
                            <div class="form-group">
                                <label>E-Mail:</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Passwort:</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                    <p>
                        <a href="login_erfassen.php">Registieren </a>
                    </p>
                    <p>
                     <a href="Passwort_vergessen.php">Passwort vergessen</a>    
                    </p>
                    </div>
                 </div>
            </div>
        </div>
    </div>                  
    <!-- /.container -->
    <?php include_once "Footer.php"; ?>
