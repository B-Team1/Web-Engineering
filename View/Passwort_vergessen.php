<?php include_once "Header.php"; ?>
        </head>
    <body>
        <div class="brand">Online-Verwaltungstool</div>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h4>Passwort vergessen:</h4>
                        <p>Ihr Passwort wird per Mail zugestellt:</p>
                        <div class="col-lg-4">
                        <form role="form" action="Passwort_vergessen.php" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <label for="email">E-Mail:</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Bestätigen</button>
                            </div> 
                        </div>
                        <div class="row">    
                            <a href="index.php">Login </a>
                        </div>    
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php include_once "Footer.php"; ?>

