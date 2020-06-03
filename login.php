<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

// Include config file
require_once "conn/config.php";

// Define variables and initialize with empty values
$email = $password = "";
$errorE = $errorpwd= "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $errorE = "*Vous devez insérer votre adresse email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $errorpwd = "*Vous devez insérer un mot de passe. ";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($errorE) && empty($errorpwd)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: user/profile.php");
                        } else{
                            // Display an error message if password is not valid
                            $errorpwd = "*Le mot de passe que vous avez entré n'est pas valide.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $errorE= "*Aucun compte trouvé avec cette adresse e-mail.";
                }
            } else{
                echo "Oops! Quelque chose a mal tourné. Veuillez réessayer plus tard.";
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
  <title>Connexion</title>

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
    <link href="css/loginTechnician.css" rel="stylesheet" type="text/css" />
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

              <li active ><a href="login.php">Connexion</a></li>
                <li active ><a href="signUp.php">S'inscrire</a></li>
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          <h3 align="center">  LOGIN </h3>
          <p>Veuillez saisir vos identifiants pour vous connecter.</p>
          <br>
           <div  class="display_error_msg" id="message" > </div>
             <br>

            <!--<span class="display_error_msg" id="errorE"></span >-->
            <span class="help-block" style='color:red;'><?php echo $errorE; ?></span>
          <div class="input-container <?php echo (!empty($errorE)) ? 'has-error' : ''; ?>">
            <i class="fa fa-user icon"></i>
            <input  class="input-field" type="text" id="email"  placeholder="Adresse Email " name="email" value="<?php echo $email; ?>" />
          </div>

      <span class="help-block" style='color:red;'><?php echo $errorpwd; ?></span>
          <div class="input-container <?php echo (!empty($errorpwd)) ? 'has-error' : ''; ?>">
            <i class="fa fa-key icon"></i>
            <input  class="input-field" type="password"  id="password"  placeholder="Mot de passe" name="password"  />

          </div>

  <!--<button type="button" class="btn_login"  onClick="verification()" id="ok">LOGIN </button>-->

   <button type="submit" name="login" id="login" class="butp"  onClick="verification()" id="ok" >Login </button>
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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="js/login.js"></script>

  </body>
</html>
