<?php
// Include config file
require_once "conn/config.php";

// Define variables and initialize with empty values

 $nom = $prenom = $email = $createdDate  = $equipment = $categorie = $localisation = $description = "";

$errorn = $errorp = $errore = $errord = $errorEquip = $errorC = $errorL = $errorr = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["nom"]))){
        $errorn = "*Vous devez insérer votre nom.";
    } else{
        // Prepare a select statement
        $sql = "SELECT teacherID FROM teacher WHERE nom = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["nom"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $errorn = "";
                } else{
                    $nom = trim($_POST["nom"]);
                }
            } else{
                echo "Oops! Quelque chose a mal tourné. Veuillez réessayer plus tard.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    if(empty(trim($_POST["prenom"]))){
        $errorp = "*Vous devez insérer votre prénom. ";
    }
    else{
        $prenom= trim($_POST["prenom"]);
    }

    if(empty(trim($_POST["email"]))){
        $errore = "*Vous devez insérer votre adresse Email UDM.";
    }
    else{
        $email= trim($_POST["email"]);
    }

    if(empty(trim($_POST["createdDate"]))){
        $errord = "*Vous devez insérer la date .  ";
    }
    else{
        $createdDate = trim($_POST["createdDate"]);
    }

    if(empty(trim($_POST["equipment"]))){
        $errorEquip = "*Vous devez spécifier l'équipement.";
    }
    else{
        $equipment = trim($_POST["equipment"]);
    }

    if(empty(trim($_POST["categorie"]))){
        $errorC = "*Vous devez spécifier le catégorie.";
    }
    else{
        $categorie= trim($_POST["categorie"]);
    }

    if(empty(trim($_POST["localisation"]))){
        $errorL = "*Vous devez spécifier le departement";
    }
    else{
        $localisation= trim($_POST["localisation"]);

      }


      if(empty(trim($_POST["description"]))){
          $errorr = "*Vous devez donner une description du probleme. ";
      }
      else{
          $description = trim($_POST["description"]);
      }

    // Check input errors before inserting in database
    if(empty($errorn) && empty($errorp) && empty($errore) && empty($errord) && empty($errorEquip) && empty($errorC) && empty($errorL) && empty($errorr)){

        // Prepare an insert statement
        $sql = "INSERT INTO teacher ( nom, prenom, email, createdDate, equipment, categorie, localisation, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$param_username,$param_prenom,$param_email,$param_date,$param_equipement,$param_cat,$param_loc,$param_description);

            // Set parameters

            $param_username = $nom;
            $param_prenom =  $prenom;
            $param_email = $email;
            $param_date = $createdDate;
            $param_equipement = $equipment;
            $param_cat = $categorie;
            $param_loc = $localisation;
            $param_description = $description;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: dashboard.php");
            } else{
                echo "Quelque chose a mal tourné. Veuillez réessayer plus tard.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
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

         <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          <!--Formulaire intervention etudiant-->
            <div  class="display_error_msg" id="message" > </div>
            <div>
              <br>
             <h4 align="center"> Information Personelle </h4>
             <br>

             <div class="form-group row flex-v-center">
              <div class="col-6 ">
             <span class="help-block" style='color:red;'><?php echo $errorn; ?></span>
             <div class="input-container  <?php echo (!empty($errorn)) ? 'has-error' : ''; ?>">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo $nom; ?>"/>
             </div>
           </div>



         <div class="col-6 ">
           <span class="help-block" style='color:red;'><?php echo $errorp; ?></span>
            <div class="input-container <?php echo (!empty($errorp)) ? 'has-error' : ''; ?>">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="prenom" placeholder="Prénom" name="prenom"  value="<?php echo $prenom; ?>"/>
             </div>
             </div>
             </div>


          <div class="form-group row flex-v-center">
          <div class="col">
            <span class="help-block" style='color:red;'><?php echo $errore; ?></span>
            <div class="input-container <?php echo (!empty($errore)) ? 'has-error' : ''; ?>">
               <i class="far fa-envelope icon " style='font-size:17px'></i>
               <input  class="input-field" type="text" id="email" placeholder="Adresse Email UDM " name="email" value="<?php echo $email; ?>" />
            </div>
        </div>



       <div class="col">
            <span class="help-block" style='color:red;'><?php echo $errord; ?></span>
             <div class="input-container <?php echo (!empty($errord)) ? 'has-error' : ''; ?>">
               <i class="fas fa-calendar-alt icon " style='font-size:17px'></i>
               <input type="date"  class="input-field"   id="createdDate" name="createdDate" value="<?php echo $createdDate; ?>">

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
                <span class="help-block" style='color:red;'><?php echo $errorEquip; ?></span>
              <div class="<?php echo (!empty($errorEquip)) ? 'has-error' : ''; ?>">
               <select id="equipment" class="input-field" name="equipment" value="<?php echo $equipment; ?>">
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
                    <option value="Appareil photo / audio">Appareil photo/Audio</option>
                    <option value="Imprimantes">Imprimantes</option>
                    <option value="Renouvellement de la cartouche">Renouvellement de la cartouche</option>
                    </select>
                  </div>
            </div>

            <div class="col-6">
            Catégorie
            <span class="help-block" style='color:red;'><?php echo $errorC; ?></span>
            <div class="<?php echo (!empty($errorC)) ? 'has-error' : ''; ?>">
            <select id="categorie" class="input-field" name="categorie" value="<?php echo $categorie; ?>">
              <option value="">Choissez votre localisation</option>
              <option value="Bureau">Bureau</option>
              <option value="Équipement de laboratoire">Équipement de laboratoire</option>
              <option value="Personnel">Personnel</option>
            </select>
            <br>
          </div>
          </div>
          <br>

           <div class="col-6">
          <span class="help-block" style='color:red;'><?php echo $errorL; ?></span>
            <div class="input-container <?php echo (!empty($errorL)) ? 'has-error' : ''; ?>">
              <i class="" style='font-size:15px'></i>
              <input  class="input-field"  type="text" id="localisation" placeholder="No Bureau/Classe concerné" name="localisation" value="<?php echo $localisation; ?>"/>
            </div>
          </div>
        </div>


      <!-- textarea for remark -->
        <span class="help-block" style='color:red;'><?php echo $errorr; ?></span>
 <div class="<?php echo (!empty($errorr)) ? 'has-error' : ''; ?>" >
           <textarea class="form-control" style="font-size:14px;" rows="5" cols="51"  id="description" placeholder="Énoncer brièvement le problème" name="description" value="<?php echo $description; ?>"></textarea>

     <!--<button type="button" class="btn_login"  onClick="verification()" id="ok">LOGIN </button>-->
      <button type="submit" name="form2" id="form2" class="butp" >Soumettre une demande</button>
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
