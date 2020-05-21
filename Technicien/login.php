<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="" content="">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Connexion</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="../css/linearicons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="../css/loginTechnician.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header id="header">
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="index.html"><img src="../img/mainLogo.png" alt="" title=""  width="250" height="60" /></a>
          </div>
          <nav id="nav-menu-container">

            <ul class="nav-menu">
                <li><a href="index.html">Acceuil</a></li>
              
              <li><a href="login.php">Connexion</a></li>
                </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->

    <div id="wrapper">


      <!--login form -->
      <!-- Display error message when login fail-->

      <div class="login_wrapper">

      <!--  <form method="POST" action=""  > -->

    <form class="form" role="form" method="POST" accept-charset="UTF-8" onsubmit="return false">

          <h3 align="center">  LOGIN </h3>
           <div  class="display_error_msg" id="message" > </div>
             <br>

            <span class="display_error_msg" id="errorE"></span >
          <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input  class="input-field" type="text" id="email_tech"  placeholder="Adresse Email " name="email_tech" />
               <span class="display_error_msg" id="errorE"></span >

          </div>

      <span class="display_error_msg" id="errorpass"></span >
          <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input  class="input-field" type="password"  id="password"  placeholder="Mot de passe" name="password"  />

          </div>

  <!--<button type="button" class="btn_login"  onClick="verification()" id="ok">LOGIN </button>-->
   <button type="submit" name="login" id="login" class="butp"  onClick="verification()" id="ok" >Login</button>
          <!--<button type="button" class="btn" >LOGIN</button>-->
          <div class="login_bottom">


          </div>
        </form>
      </div>
    </div>






    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.tabs.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/simple-skillbar.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="../js/login.js"></script>

  </body>
</html>
