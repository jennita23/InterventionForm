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
            <h3 align="center" style="color:grey;"> Formulaire de demande d'intervention technique </h3>
            <br>

       <form class="form" role="form"  method="POST"  accept-charset="UTF-8"  onsubmit="return false">
          <!--Formulaire intervention etudiant-->
             <h5 align="center"> Information Personelle </h5>
             <br>
             <div  class="display_error_msg" id="message" > </div>

             <div class="input-container">
               <i class='far fa-address-card icon' style='font-size:20px'></i>
               <input  class="input-field" type="text" id="sicStudent" placeholder="Sic No" name="sic" />
               <span class="display_error_msg" id="errors"></span>
             </div>
             <br>

             <div class="input-container">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom" />
                  <span class="display_error_msg" id="errorn"></span >
             </div>
             <br>

             <div class="input-container">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="prenom" placeholder="Prénom" name="prenom" />
                  <span class="display_error_msg" id="erroru"></span >
            </div>
            <br>

             <div class="input-container">
               <i class="far fa-envelope icon " style='font-size:17px'></i>
               <input  class="input-field" type="text" id="email" placeholder="Adresse Email UDM " name="email" />
                  <span class="display_error_msg" id="erroru"></span >
             </div>
             <br>

             <div class="input-container">
               <i class="fas fa-calendar-alt icon " style='font-size:17px'></i>
               <input type="date"  class="input-field"   id="date" name="date ">
                  <span class="display_error_msg" id="erroru"></span >
             </div>
              <br>


              <h5 align="center"> Demande  Intervention </h5>
                 <br>
                 <label style="color:black;font-weight: 900;"> Catégorie de problème </label> <select id="equipment" class="input-field" >
                   <option value="Wifi">Wifi</option>
                   <option value="Projecteur">Projecteur</option>
                   <option value="Adresse Email UDM">Adresse Email UDM</option>
                   <option value="PC">PC</option>
                   <option value="OS (Window,Linux)">OS (Window,Linux)</option>
                   <option value="Autre">Autre</option>

                    </select>

                    <br>


            <!--radio button for priority  -->
          <label style="color:black;font-weight: 900;">Type de connexion WIFI </label>
           <label class="radio-inline">
             <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios11" value="Câblé" >
               <label class="form-check-label" for="exampleRadios1">
                          Câblé
              </label>
             </div>
          </label>

             <label class="radio-inline">
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios21" value="Câblé" >
                <label class="form-check-label" for="exampleRadios2">
                      Sans fil
                </label>
                </div>
             </label>
             <br>

          <label style="color:black;font-weight: 900;">Laboratoire concerné  </label>
                     <select id="lab" class="input-field" >
                                  <option value="B105">B105</option>
                                  <option value="D21">D21</option>
                                  <option value="C21">C21</option>
                                  <option value="B214">B214</option>
                    </select>

              <br>

              <label style="color:black;font-weight: 900;">Département  </label>
                    <select id="dep" class="input-field" >
                            <option value="Informatique Appliquée">Informatique Appliquée</option>
                            <option value="Génie éléctrique">Génie éléctrique</option>
                            <option value="Génie éléctrique">Génie éléctrique</option>
                            <option value="Génie mécanique">Génie mécanique</option>
                    </select>

              <br>



      <!-- textarea for remark -->
            <div class="form-group">
           <textarea class="form-control" style="font-size:14px;" rows="5" id="comment" placeholder="Énoncer brièvement le problème" ></textarea>
            </div>


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
