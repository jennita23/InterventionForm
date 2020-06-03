<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
session_start();

include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['userSession']))
{
header("Location: ../index.php");
}
$res=mysqli_query($con,"SELECT * FROM users WHERE id=".$_SESSION['userSession']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
$patientFirstName = $_POST['patientFirstName'];
$patientLastName = $_POST['patientLastName'];
$patientMaritialStatus = $_POST['patientMaritialStatus'];
$patientDOB = $_POST['patientDOB'];
$patientGender = $_POST['patientGender'];
$patientAddress = $_POST['patientAddress'];
$patientPhone = $_POST['patientPhone'];
$patientEmail = $_POST['patientEmail'];
$patientId = $_POST['patientId'];
// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$res=mysqli_query($con,"UPDATE patient SET patientFirstName='$patientFirstName', patientLastName='$patientLastName', patientMaritialStatus='$patientMaritialStatus', patientDOB='$patientDOB', patientGender='$patientGender', patientAddress='$patientAddress', patientPhone=$patientPhone, patientEmail='$patientEmail' WHERE icPatient=".$_SESSION['patientSession']);
// $userRow=mysqli_fetch_array($res);
header( 'Location: profile.php' ) ;
}
?>
<?php
$male="";
$female="";
if ($userRow['patientGender']=='male') {
$male = "checked";
}elseif ($userRow['patientGender']=='female') {
$female = "checked";
}
$single="";
$married="";
$separated="";
$divorced="";
$widowed="";
if ($userRow['patientMaritialStatus']=='single') {
$single = "checked";
}elseif ($userRow['patientMaritialStatus']=='married') {
$married = "checked";
}elseif ($userRow['patientMaritialStatus']=='separated') {
$separated = "checked";
}elseif ($userRow['patientMaritialStatus']=='divorced') {
$divorced = "checked";
}elseif ($userRow['patientMaritialStatus']=='widowed') {
$widowed = "checked";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
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
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">



		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>
<body>
  <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="dashboard.php"><img src="img/mainLogo.png" alt="" title=""  width="250" height="60" /></a>
        </div>
        <nav id="nav-menu-container">

          <ul class="nav-menu">
              <li active ><a href="profile.php">Mon profile</a></li>

              <li class="menu-has-children"><a href="">Demande Intervention</a>
                <ul>
                  <li><a href="interventionFormTeacher.php">professeur</a></li>
                  <li><a href="interventionFormStudent.php"> étudiants</a></li>
                </ul>
              </li>
            <li><a href="logout.php">Deconnexion</a></li>
              </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div class="page-header">
        <h1 style='text-align: center;'>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to your profile.</h1>
    </div>
    <p>

      <!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get together(grouping) to  display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>

				</div>


					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['username']; ?> <?php echo $userRow['prenom']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<!--<a href="profile.php?patientId=<?php echo $userRow['id']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>-->
								</li>
								<li>
								<!--	<a href="patientapplist.php?patientId=<?php echo $userRow['id']; ?>"><i class="glyphicon glyphicon-file"></i> Appointment</a>-->
								</li>
								<li class="divider"></li>
								<li>
									<a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- navigation -->

    </p>
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
</body>
</html>
