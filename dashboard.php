<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <!--
      CSS
      ============================================= -->
      <link href="css/login.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="css/linearicons.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/magnific-popup.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/nice-select.css">
      <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="dashboard.php"><img src="img/mainLogo.png" alt="" title=""  width="250" height="60" /></a>
        </div>
        <nav id="nav-menu-container">

          <ul class="nav-menu">
              <li active ><a href="dashboard.php">Mon profile</a></li>

              <li class="menu-has-children"><a href="">Demande Intervention</a>
                <ul>
                  <li><a href="interventionFormTeacher.php">professeur</a></li>
                  <li><a href="interventionFormStudent.php"> étudiants</a></li>
                </ul>
              </li>
            <li><a href="logout.php">Deconnexion</a></li>
              </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div class="page-header">
        <h1 style='text-align: center;'>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to your profile.</h1>
    </div>
    <p>

    </p>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/vendor/bootstrap.min.js"></script>
   <script src="js/easing.min.js"></script>
   <script src="js/hoverIntent.js"></script>
   <script src="js/superfish.min.js"></script>
   <script src="js/jquery.ajaxchimp.min.js"></script>
   <script src="js/jquery.magnific-popup.min.js"></script>
   <script src="js/jquery.tabs.min.js"></script>
   <script src="js/jquery.nice-select.min.js"></script>
   <script src="js/isotope.pkgd.min.js"></script>
   <script src="js/waypoints.min.js"></script>
   <script src="js/jquery.counterup.min.js"></script>
   <script src="js/simple-skillbar.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/mail-script.js"></script>
   <script src="js/main.js"></script>
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>
</html>
