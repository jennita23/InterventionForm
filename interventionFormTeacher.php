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
  <meta name="author" content="colorlib">
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
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/login.css" rel="stylesheet" type="text/css" />
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
                <li active ><a href="interventionFormTeacher.html">Demande Intervention</a></li>

              <li active ><a href="login.html">Connexion</a></li>




                </ul>



          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->

    <div id="wrapper">

         <div class="login_wrapper">

         <!--  <form method="POST" action=""  > -->
         <!--forulaire de demane intervention etudiant-->
            <h3 align="center" style="color:grey;"> Formulaire de demande d'intervention technique </h3>
            <br>
       <form class="form-inline"  role="form" method="POST" accept-charset="UTF-8" onsubmit="return false">

          <!--Formulaire intervention etudiant-->
            <div  class="display_error_msg" id="message" > </div>
            <div>
              <br>
             <h4 align="center"> Information Personelle </h4>
             <br>

             <div class="form-group row flex-v-center">
              <div class="col-6 ">
           <span class="display_error_msg" id="errorN"></span >
             <div class="input-container">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom" />
             </div>
           </div>



         <div class="col-6 ">
           <span class="display_error_msg" id="errorP"></span >
             <div class="input-container">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="prenom" placeholder="Prénom" name="prenom" />

             </div>
             </div>
             </div>



          <div class="form-group row flex-v-center">
          <div class="col">
            <span class="display_error_msg" id="errorE"></span >
             <div class="input-container">
               <i class="far fa-envelope icon " style='font-size:17px'></i>
               <input  class="input-field" type="text" id="email" placeholder="Adresse Email UDM " name="email" />
            </div>
        </div>



       <div class="col">
            <span class="display_error_msg" id="errord"></span >
             <div class="input-container">
               <i class="fas fa-calendar-alt icon " style='font-size:17px'></i>
               <input type="date"  class="input-field"   id="date" name="date ">

             </div>
            </div>
            </div>
            <div>
             <br>
              <h4 align="center"> Demande  Intervention </h4>
              <br>


              <div class="row">
                <div class="col-6">
              Détails de l'équipement
               <select id="equipment" class="input-field" >
                   <option value="">Choissez l'équipement</option>
                   <option value="PC">PC</option>
                   <option value="Laptop">Laptop</option>
                   <option value="Disque dur">Disque dur</option>
                   <option value="Projecteur">Projecteur</option>
                   <option value="CPU">CPU</option>
                   <option value="Courant électrique">Courant électrique</option>
                    <option value="Wifi / Câble">Wifi / Câble</option>
                    <option value="Clavier">Clavier</option>
                    <option value="Souris">Souris</option>
                    <option value="Batterie">Batterie</option>
                    <option value="Appareil photo ou audio">Appareil photo ou audio</option>
                    <option value="Imprimantes">Imprimantes</option>
                    <option value="Renouvellement de la cartouche">Renouvellement de la cartouche</option>
                    </select>
            </div>

            <div class="col-6">
            Catégorie
            <select id="categorieLocalisation" class="input-field" >
              <option value="">Choissez votre localisation</option>
              <option value="Bureau">Bureau</option>
              <option value="Équipement de laboratoire">Équipement de laboratoire</option>
              <option value="Personnel">Personnel</option>
            </select>
            <br>
          </div>
          <br>

           <div class="col-6">
           <span class="display_error_msg" id="errorL"></span >
            <div class="input-container">
              <i class="" style='font-size:15px'></i>
              <input  class="input-field"  type="text" id="localisation" placeholder="No Bureau/Classe concerné" name="localisation" />
            </div>
          </div>
        </div>


      <!-- textarea for remark -->
          <span class="display_error_msg" id="errorr"></span >
           <textarea class="form-control" style="font-size:14px;" rows="5" cols="51"  id="comment" placeholder="Énoncer brièvement le problème" ></textarea>

     <!--<button type="button" class="btn_login"  onClick="verification()" id="ok">LOGIN </button>-->
      <button type="submit" name="form1" id="form1" class="butp" onClick="verification()" id="ok" >Soumettre une demande</button>
             <!--<button type="button" class="btn" >LOGIN</button>-->
             <div class="login_bottom">


             </div>
           </form>
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
    <script src="js/TeacherForm.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </body>
</html>
