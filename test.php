
<?php
// Include config file
require_once "conn/config.php";
require_once '/path/to/vendor/autoload.php';

// Define variables and initialize with empty values

$nom = $prenom = $dob = $email = $password = $cpassword = "";

$errorN = $errorP = $errorE = $errord = $errorpwd = $errorCP = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["nom"]))){
        $errorN = "*Vous devez insérer votre nom.";
    } else{
        // Prepare a select statemen
        $sql = "SELECT id FROM users WHERE username = ?";

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
                    $errorN = "Ce nom d'utilisateur est déjà pris.";
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

    // Validate password
    if(empty(trim($_POST["password"]))){
        $errorpwd = "*Vous devez insérer un mot de passe. ";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $errorpwd = "*Le mot de passe doit contenir au moins 6 caractères.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $errorCP = "*Vous devez confirmer votre  mot de passe. ";
    } else{
        $cpassword = trim($_POST["cpassword"]);
        if(empty($errorpwd) && ($password != $cpassword)){
            $errorCP = "*Le mot de passe ne correspond pas.";
        }
    }


    if(empty(trim($_POST["prenom"]))){
        $errorP = "*Vous devez insérer votre prénom. ";
    }
    else{
        $prenom= trim($_POST["prenom"]);
    }

    if(empty(trim($_POST["email"]))){
        $errorE = "*Vous devez insérer votre adresse Email UDM.";
    }
    else{
        $email= trim($_POST["email"]);
    }

    if(empty(trim($_POST["dob"]))){
        $errord = "*Vous devez insérer votre date de naissance.  ";
    }
    else{
        $dob= trim($_POST["dob"]);
    }



    // Check input errors before inserting in database
    if(empty($errorN) && empty($errorP) && empty($errorpwd) && empty($errorCP) ){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, prenom, email, dob) VALUES (?, ?, ?, ?, ?)";
    
          if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
              $result = $mailer->send($message);
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password,$param_prenom,$param_email,$param_dob);

            // Set parameters
            $param_username = $nom;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_prenom =  $prenom;
            $param_email = $email;
            $param_dob = $dob;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     <span class="help-block" style='color:red;'><?php echo $errorN; ?></span>
        <div class="input-container <?php echo (!empty($errorN)) ? 'has-error' : ''; ?>">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom" value="<?php echo $nom; ?>">
        </div>

     <!--<span class="display_error_msg"  id="errorP"></span >-->
     <span class="help-block" style='color:red;'><?php echo $errorP; ?></span>
        <div class="input-container <?php echo (!empty($errorP)) ? 'has-error' : ''; ?>">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text"  id="prenom" placeholder="Prénom" name="prenom" value="<?php echo $prenom; ?>">
        </div>


       <span class="help-block" style='color:red;'><?php echo $errord; ?></span>
        <div class="input-container <?php echo (!empty($errord)) ? 'has-error' : ''; ?>">
            Date de naissance : <input type="date"  id="dob" style="width:500px;height:35px;" name="dob" value="<?php echo $dob; ?>">
        </div>


        <span class="help-block" style='color:red;'><?php echo $errorE; ?></span>
        <div class="input-container <?php echo (!empty($errorE)) ? 'has-error' : ''; ?>">
          <i class="fa fa-envelope icon"></i>
          <input  class="input-field"  id="email" type="text" placeholder="Adresse Email" name="email" value="<?php echo $email; ?>">
        </div>


      <span class="help-block" style='color:red;'><?php echo $errorpwd; ?></span>
        <div class="input-container <?php echo (!empty($errorpwd)) ? 'has-error' : ''; ?>">
          <i class="fa fa-key icon"></i>
          <input  class="input-field" type="password"  id="password" placeholder="Mot de passe " name="password" value="<?php echo $password; ?>">
        </div>


        <span class="help-block" style='color:red;'><?php echo $errorCP; ?></span>
        <div class="input-container <?php echo (!empty($errorCP)) ? 'has-error' : ''; ?>">
          <i class="fa fa-key icon"></i>
          <input class="input-field" type="password"  id="cpassword" placeholder="Confirmer mot de passe" name="cpassword" value="<?php echo $cpassword; ?>">
      </div>

        <div>
          <p id="text" style="color:#228B22;display:none" >Vous avez accepté les termes et conditions!</p>
          <a href="#">J'accepte les termes et conditions  </a>
          <label><input type="checkbox" id="myCheck"  onclick="myFunction()"/></label>
          <span class="display_error_msg"  id="errorBox"></span >
        </div>
          <!--<button type="submit" name="signup" id="signup" class="butp" onClick="verification()" id="ok">S'incrire</button>-->
            <button type="submit" name="signup" id="signup" class="butp" >S'incrire</button>

      </div>

    </form>
<br>
<br>



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
