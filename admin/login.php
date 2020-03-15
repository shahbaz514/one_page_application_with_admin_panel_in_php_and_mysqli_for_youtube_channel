<?php
  ob_start();
  session_start();
  include '../db/db.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SHAHBAZ514 || ADMIN lOGIN </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="goto-here">
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <h3 style="text-align: center; margin-top: 100px;">Admin Login</h3>
            <form action="" method="post" enctype="multipart/form-data" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Your Username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Your Password">
              </div>
              <div class="form-group">
                <input type="submit" value="Login Now" name="login" class="btn btn-primary py-3 px-5">
              </div>
            </form>
<?php
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password']);
  $get_u = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $run_u = mysqli_query($db,$get_u);
  $count = mysqli_num_rows($run_u);
  if ($count > 0) {
    $_SESSION['username'] = $username;
    echo "<script>alert('Login Successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
  else{
    echo "<script>alert('Username And Password Is Not Correct !! Try Another One !!!')</script>";
    echo "<script>window.open('login.php','_self')</script>";
  }
}

?>
          </div>
          <div class="col-lg-4"></div>
        </div>
      </div>
    </section>


        <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>