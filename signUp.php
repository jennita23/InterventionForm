
<?php
include_once 'conn/dbconnect.php';

?>

<!-- register user -->
<?php
if (isset($_POST['signup'])) {
$nom = mysqli_real_escape_string($con,$_POST['nom']);
$prenom= mysqli_real_escape_string($con,$_POST['prenom']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$birthday = mysqli_real_escape_string($con,$_POST['birthday']);

//INSERT Query
$query = " INSERT INTO user (nom,prenom,email,password,birthday)
VALUES ('$nom', '$prenom', '$email', '$password', '$birthday' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Votre compte a ete creer avec succes !');

</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('Compte utilisateur existe deja.Veuillez creer un nouveau compte!');
</script>
<?php
}

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

<script language="javascript">
function verification() {

	var error = false;

  var nom  = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
	var email = document.getElementById("email").value;
	var birthday = document.getElementById("birthday").value;
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;


	//re intialise les textbox

  $('#nom').css("border-color","#CCC");
	$('#prenom').css("border-color","#CCC");
  $('#email').css("border-color","#CCC");
	$('#birthday').css("border-color","#CCC");
  $('#password').css("border-color","#CCC");
  $('#cpassword').css("border-color","#CCC");

    if ( nom =="" || prenom ==""  || email  ==""  || birthday =="" || password =="" ||  cpassword=="")
       {

             //si le texttbox pour inserer lastname est vide
               if (nom == "")

               {
                   $('#nom').css("border-color","#CF161E");
                    document.getElementById('errorN').innerHTML = "*Vous devez insérer votre nom. ";
                   error = true;
               }

							 if (prenom == "")

               {
                   $('#prenom').css("border-color","#CF161E");
                    document.getElementById('errorP').innerHTML = "*Vous devez insérer votre prénom. ";

               }

							 if (email== "")

							 {
									 $('#email').css("border-color","#CF161E");
										document.getElementById('errorE').innerHTML = "*Vous devez insérer votre adresse Email UDM. ";

							 }

							 if (birthday== "")

							 {
									 $('#birthday').css("border-color","#CF161E");
										document.getElementById('errord').innerHTML = "*Vous devez insérer votre date de naissance.  ";

							 }

               if (password== "")

              {
                  $('#password').css("border-color","#CF161E");
                   document.getElementById('errorpwd').innerHTML = "*Vous devez insérer un mot de passe. ";

              }

							 if (cpassword== "")

							{
									$('#cpassword').css("border-color","#CF161E");
									 document.getElementById('errorCP').innerHTML = "*Vous devez confirmer votre  mot de passe.  ";

							}


          }


					if (!password.match(cpassword)) {
							document.getElementById('errorConfirmPass').innerHTML = "*Le mot de passe ne correspond pas.";
							error = true;
						}


       };
</script>

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
 <form action="<?php $_PHP_SELF ?>"  method="POST" accept-charset="utf-8" class="form" role="form" onSubmit="return verification();">
    <!--  <form role="form"  method="POST"  accept-charset="UTF-8" onsubmit="return false">-->
          <span class="display_error_msg" id="errorN"></span >
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text" id="nom" placeholder="Nom" name="nom">
        </div>

  <span class="display_error_msg"  id="errorP"></span >
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text"  id="prenom" placeholder="Prénom" name="prenom">

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

       <span class="display_error_msg" id="errorpwd"></span >
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input  class="input-field" type="password"  id="password" placeholder="Mot de passe " name="password">
          <span class="display_error_msg" id="errorConfirmPass"></span >
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
