
<?php
include_once 'conn/dbconnect.php';

?>

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
  <title>S'inscrire</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
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
    <link href="css/signUp.css" rel="stylesheet" type="text/css" />


  </head>
  <body>
    <header id="header">
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="index.html"><img src="img/mainLogo.png" alt="" title=""  width="250" height="60" /></a>
          </div>
          <nav id="nav-menu-container">

            <ul class="nav-menu">
                <li><a href="index.html">Acceuil</a></li>
              <li active ><a href="signUp.php">S'inscrire</a></li>
              <li><a href="login.html">Connexion</a></li>
                </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <div id="wrapper"></div>


  <div class="login_wrapper">
      <div id="message" > </div>
      <h3 align="center" > S'inscrire </h3>

      <!-- form to register new user -->
      <br>

      <form id='form_user'>
          <span class="display_error_msg" id="errorN"></span >
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text" id="nom" placeholder="Nom" name="fname">
        </div>

  <span class="display_error_msg"  id="errorL"></span >
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text"  id="prenom" placeholder="Prénom" name="lname">

        </div>




        <span class="display_error_msg" id="errord"></span >
        <div class="input-container">
            Date de naissance : <input type="date"  id="birthday" style="width:500px;height:35px;" name="birthday">
        <span class="display_error_msg" id="errord"></span >
        </div>


        <span class="display_error_msg" id="errorE"></span >
        <div class="input-container">
          <i class="fa fa-envelope icon"></i>
          <input  class="input-field"  id="email" type="text" placeholder="Adresse Email" name="email">

        </div>

       <span class="display_error_msg" id="errorP"></span >
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input  class="input-field" type="password"  id="password" placeholder="Mot de passe " name="password">

        </div>


        <span class="display_error_msg" id="errorCP"></span >
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input class="input-field" type="password"  id="cpassword" placeholder="Confirmer mot de passe" name="cpassword">
        </div>

        <div>
          <p id="text" style="color:#228B22;display:none" >Vous avez accepté les termes et conditions!</p>
          <a href="#">J'accepte les termes et conditions  </a>
          <label><input type="checkbox" id="myCheck"  onclick="myFunction()"/></label>
          <span class="display_error_msg"  id="errorBox"></span >
        </div>
          <button type="submit" name="form2" id="form2" class="butp" onClick="verification()" id="ok">S'incrire</button>

      </div>

    </form>
<br>
<br>

  <!-- Modal -->
   <div class="modal fade" id="modalUserregistraion" role="dialog">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">User registration</h4>
         </div>
         <div class="modal-body">
           <p>Account created successfully.<br/> Please check your email address: rishan@test.com to activate your account.</p>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
       </div>

     </div>
   </div>

   <!-- Modal -->
    <div class="modal fade" id="modalUserregistraionError" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Demande inscription</h4>
          </div>
          <div class="modal-body">
            <p style="color: red;">An error occured please try again.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
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
    <script src="js/signUp.js"></script>

</body>
</html>
