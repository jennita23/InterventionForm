<?php
// Include config file
session_start();
require_once "../conn/config.php";

if(!isset($_SESSION['id']))
{
header("Location: ../index.php");
}
// Define variables and initialize with empty values

$sic = $nom = $prenom = $createdDate  = $email = $equipement = $lab = $dept = $description = "";

$errors = $errorn = $errorp = $errore = $errord = $errorEquip = $errorlab = $errorDept = $errorr = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["nom"]))){
        $errorn = "*Vous devez insérer votre nom.";
    } else{
        // Prepare a select statement
        $sql = "SELECT appID FROM application WHERE nom = ?";

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

    if(empty(trim($_POST["sic"]))){
        $errors = "*Vous devez insérer votre SIC No. ";
    }
    else{
        $sic= trim($_POST["sic"]);
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



    if(empty(trim($_POST["equipement"]))){
        $errorEquip = "*Vous devez spécifier l'équipement.";
    }
    else{
        $equipement = trim($_POST["equipement"]);
    }


    if(empty(trim($_POST["lab"]))){
        $errorlab = "*Vous devez spécifier le laboratoire.";
    }
    else{
        $lab = trim($_POST["lab"]);
    }

    if(empty(trim($_POST["dept"]))){
        $errorDept = "*Vous devez spécifier le departement  ";
    }
    else{
        $dept= trim($_POST["dept"]);

      }


      if(empty(trim($_POST["description"]))){
          $errorr = "*Vous devez donner une description du probleme. ";
      }
      else{
          $description = trim($_POST["description"]);
      }


    // Check input errors before inserting in database
    if(empty($errors) && empty($errorn) && empty($errorp) && empty($errore) && empty($errord) && empty($errorEquip) && empty($errorlab) && empty($errorDept) && empty($errorr))
    {
        // Prepare an insert statement

        $sql = "INSERT INTO application (idUser, sic, nom, prenom, email, createdDate, equipement , lab, dept, description) VALUES ('" . $_SESSION['id'] ."', '$sic', '$nom', '$prenom', '$email', '$createdDate', '$equipement','$lab', '$dept', '$description')";
        if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // Close connection

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
    <link href="../css/login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/linearicons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/main.css">

  </head>
  <body>
    -- #header -->
         <div class="login_wrapper">

         <!--  <form method="POST" action=""  > -->
         <!--forulaire de demane intervention etudiant-->
         <div>
             <br>
            <h3 align="center" style="color:grey;"> Formulaire de demande d'intervention technique </h3>
            <br>
   <div>

 <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       <!--<form class="form-inline"  role="form"  method="POST"  accept-charset="UTF-8"  onsubmit="return false">-->
          <!--Formulaire intervention etudiant-->

             <br>
             <div  class="display_error_msg" id="message" > </div>
             <div>
                 <br>
              <h4 align="center"> Information Personelle  </h4>
              <br>

             <div class="form-group row flex-v-center">
              <div class="col-6 ">
                <!--<span class="display_error_msg" id="errors"></span>-->
                 <span class="help-block" style='color:red;'><?php echo $errors; ?></span>
             <div class="input-container <?php echo (!empty($errors)) ? 'has-error' : ''; ?>">
               <i class='far fa-address-card icon' style='font-size:15px'></i>
               <input  class="input-field" type="text" id="sic" placeholder="Sic No" name="sic" value="<?php echo $sic; ?>"/>

             </div>
           </div>

             <div class="col-6">
                <span class="help-block" style='color:red;'><?php echo $errorn; ?></span>
             <div class="input-container <?php echo (!empty($errorn)) ? 'has-error' : ''; ?>">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo $nom; ?>"/>

             </div>
           </div>
         </div>

             <br>
             <div class="form-group row flex-v-center">
              <div class="col-6 ">
            <span class="help-block" style='color:red;'><?php echo $errorp; ?></span>
             <div class="input-container <?php echo (!empty($errorp)) ? 'has-error' : ''; ?>">
               <i class="fa fa-user icon" style='font-size:15px'></i>
               <input  class="input-field" type="text" id="prenom" placeholder="Prénom" name="prenom" value="<?php echo $prenom; ?>" />

            </div>
          </div>

            <div class="col-6">
             <span class="help-block" style='color:red;'><?php echo $errore; ?></span>
             <div class="input-container <?php echo (!empty($errore)) ? 'has-error' : ''; ?>">
               <i class="far fa-envelope icon " style='font-size:17px'></i>
               <input  class="input-field" type="text" id="email" placeholder="Adresse Email UDM " name="email"  value="<?php echo $email; ?>" />
             </div>
           </div>
         </div>


            <span class="help-block" style='color:red;'><?php echo $errord; ?></span>
             <div class="input-container <?php echo (!empty($errore)) ? 'has-error' : ''; ?>">
               <i class="fas fa-calendar-alt icon " style='font-size:17px'></i>
               <input type="date"  style='width :287px' class="input-field"   id="createdDate" name="createdDate" value="<?php echo $createdDate; ?>">
             </div>
             <br>
             <div>
                 <br>
              <h4 align="center"> Demande  Intervention </h4>
              <br>

           <div class="row">
            <div class="col">
              Catégorie de problème
                <span class="help-block" style='color:red;'><?php echo $errorEquip; ?></span>
                  <select id="equipment" class="input-field" name="equipement" value="<?php echo $equipement; ?>">
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
            <span class="help-block" style='color:red;'><?php echo $errorlab; ?></span>
                     <select id="lab" class="input-field" name="lab" value="<?php echo $lab; ?>" >
                       <option value="">Choissez une laboratoire </option>
                                  <option value="B105">B105</option>
                                  <option value="D21">D21</option>
                                  <option value="C21">C21</option>
                                  <option value="B214">B214</option>
                    </select>

            </div>

              <div class="col-6">
            Département
              <span class="help-block" style='color:red;'><?php echo $errorDept; ?></span>
                    <select id="dept" class="input-field" name="dept" value="<?php echo $dept; ?>" >
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
       <span class="help-block" style='color:red;'><?php echo $errorr; ?></span>
       <div class="<?php echo (!empty($errorr)) ? 'has-error' : ''; ?>" >
           <textarea class="form-control" style="font-size:14px;" rows="5"  cols="51" id="description" placeholder="Énoncer brièvement le problème"  name="description" value="<?php echo $description; ?>"></textarea>

        <br>
        <br>
      <button type="submit" name="form1" id="form1" class="butp" >Soumettre une demande</button>

             <div class="login_bottom">


             </div>
           </form>
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
    <script src="./js/jquery.counterup.min.js"></script>
    <script src="../js/simple-skillbar.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="js/FormStudent.js"></script>
  </body>
</html>
