<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Sistem Poliklinik | TRSNW.</title>
    <!-- Core CSS - Include with every page -->
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
    <link rel='shortcut icon' href='../images/logo.png'> 
</head>
<?php
include('../config/koneksi.php');
?>
<?php
session_start();
if(isset($_SESSION['username'])){
header('location:../site/index.php');
}
?>
<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="../images/text.png" alt="" width="100%" />
              <font face="Edwardian Script ITC" color="white"><h3>Version 1.0</h3></font>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-body">
                        <form role="form" action="auth.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                <label>Username</label>
                                    <input class="form-control" placeholder="Username" name="username" autofocus>
                                </div>
                                <div class="form-group">
                                <label>Password</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button width=100% type="submit" class="btn btn-success btn-lg btn-block">Masuk</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('../layout/footer.php');
?>
     <!-- Core Scripts - Include with every page -->
    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
