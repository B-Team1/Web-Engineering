<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="LMT" content="">

    <title>Online-Verwaltungstool</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; LMT</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>





















