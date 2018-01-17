<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
  header("Location: index.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
  
  $uname = strip_tags($_POST['registerUsername']);
  $email = strip_tags($_POST['registerEmail']);
  $upass = strip_tags($_POST['registerPassword']);
  
  $uname = $DBcon->real_escape_string($uname);
  $email = $DBcon->real_escape_string($email);
  $upass = $DBcon->real_escape_string($upass);
  
  $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
  
  $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
  $count=$check_email->num_rows;
  
  if ($count==0) {
    
    $query = "INSERT INTO tbl_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

    if ($DBcon->query($query)) {
      $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
          </div>";
    }else {
      $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
          </div>";
    }
    
  } else {
    
    
    $msg = "<div class='alert alert-danger'>
          <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
        </div>";
      
  }
  
  $DBcon->close();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indian Railways Train Scheduling Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/ir-logo4.jpg">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Dashboard</h1>
                  </div>
                  <p>New Train Scheduler.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="register-form" method="post">
                        <?php
                        if (isset($msg)) {
                          echo $msg;
                        }
                        ?>

                    <div class="form-group">
                      <input id="register-username" type="text" name="registerUsername" required class="input-material">
                      <label for="register-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="register-email" type="email" name="registerEmail" required class="input-material">
                      <label for="register-email" class="label-material">Email Address      </label>
                    </div>
                    <div class="form-group">
                      <input id="register-passowrd" type="password" name="registerPassword" required class="input-material">
                      <label for="register-passowrd" class="label-material">password        </label>
                    </div>
                    <div class="form-group terms-conditions">
                      <input id="license" type="checkbox" class="checkbox-template">
                      <label for="license">Agree the terms and policy</label>
                    </div>
                    <input id="register" type="submit" value="Register" class="btn btn-primary" name="btn-signup" >
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
                  </form><small>Already have an account? </small><a href="login.php" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by Rajdeep Gupta</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>