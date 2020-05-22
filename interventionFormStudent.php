
<?php
include_once 'assets/conn/dbconnect.php';

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
  <title>Formulaire Intervention</title>

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
              <li active ><a href="interventionFormStudent.php">Demande Intervention</a></li>
              <li><a href="login.html">Connexion</a></li>
                </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->




         <div class="login_wrapper">

         <!--  <form method="POST" action=""  > -->
         <!--forulaire de demane intervention etudiant-->
         <div>
             <br>
            <h3 align="center" style="color:grey;"> Formulaire de demande d'intervention technique </h3>
            <br>
   <div>

       <form class="form-inline"  role="form"  method="POST"  accept-charset="UTF-8"  onsubmit="return false">
          <!--Formulaire intervention etudiant-->

             <br>
             <div  class="display_error_msg" id="message" > </div>
             <div>
                 <br>
              <h4 align="center"> Information Personelle  </h4>
              <br>

             <div class="form-group row flex-v-center">
              <div class="col-6 ">
                <span class="display_error_msg" id="errors"></span>
             <div class="input-container">

               <i class='far fa-address-card icon' style='font-size:15px'></i>
               <input  class="input-field" type="text" id="sicStudent" placeholder="Sic No" name="sic" />

             </div>
           </div>

             <div class="col-6">
               <span class="display_error_msg" id="errorn"></span >
             <div class="input-container">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom" />

             </div>
           </div>
         </div>

             <br>
             <div class="form-group row flex-v-center">
              <div class="col-6 ">
              <span class="display_error_msg" id="errorp"></span >
             <div class="input-container">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="prenom" placeholder="Prénom" name="prenom" />

            </div>
          </div>

            <div class="col-6">
             <span class="display_error_msg" id="errore"></span >
             <div class="input-container">
               <i class="far fa-envelope icon " style='font-size:17px'></i>
               <input  class="input-field" type="text" id="email" placeholder="Adresse Email UDM " name="email" />
             </div>
           </div>
         </div>


            <span class="display_error_msg" id="errord"></span >
             <div class="input-container">
               <i class="fas fa-calendar-alt icon " style='font-size:17px'></i>
               <input type="date"  style='width :287px' class="input-field"   id="date" name="date ">
             </div>

             <br>
             <div>
                 <br>
              <h4 align="center"> Demande  Intervention </h4>
              <br>

       <div class="row">
            <div class="col">

              Catégorie de problème

                  <select id="equipment" class="input-field">
                   <option value="">Choissez une catégorie ...</option>
                   <option value="Wifi">Wifi</option>
                   <option value="Projecteur">Projecteur</option>
                   <option value="Adresse Email UDM">Adresse Email UDM</option>
                   <option value="PC">PC</option>
                   <option value="OS">OS (Window,Linux)</option>
                   <option value="Autre">Autre</option>

                    </select>
                </div>
        <br>
          <div class="col-6">
          Laboratoire concerné
                     <select id="lab" class="input-field"  >
                       <option value="">Choissez une laboratoire </option>
                                  <option value="B105">B105</option>
                                  <option value="D21">D21</option>
                                  <option value="C21">C21</option>
                                  <option value="B214">B214</option>
                    </select>
            </div>

              <div class="col-6">
            Département
                    <select id="dept" class="input-field" >
                      <option value="">Choissez un département </option>
                            <option value="Informatique Appliquée">Informatique Appliquée</option>
                            <option value="Génie éléctrique">Génie éléctrique</option>
                            <option value="Génie éléctrique">Génie éléctrique</option>
                            <option value="Génie mécanique">Génie mécanique</option>
                    </select>
                </div>
              </div>
              <br>



      <!-- textarea for remark -->
       <span class="display_error_msg" id="errorr"></span >
           <textarea class="form-control" style="font-size:14px;" rows="5"  cols="51" id="comment" placeholder="Énoncer brièvement le problème" ></textarea>

        <br>
        <br>
      <button type="submit" name="form1" id="form1" class="butp" onClick="verification()" id="ok">Soumettre une demande</button>

             <div class="login_bottom">


             </div>
           </form>
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
    <script src="js/FormStudent.js"></script>
  </body>
</html>
