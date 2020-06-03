<?php
// Initialize the session
include_once 'assets/conn/dbconnect.php';
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php

$res=mysqli_query($con,"SELECT * FROM users WHERE id=".$_SESSION['loggedin']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$year = $_POST['year'];
$gender = $_POST['gender'];

$patientId = $_POST['patientId'];
// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$res=mysqli_query($con,"UPDATE users SET username='$nom', prenom='$prenom', email='$email', dob='$dob' WHERE id=".$_SESSION['loggedin']);
// $userRow=mysqli_fetch_array($res);
header( 'Location: dashboard.php' ) ;
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

      <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
      <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">

		  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

		  <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <style>
		.top-area {
		    background: #2B6B29E6;
				color: white;
				font-size: 16px;
				font-weight: 700;
				width:100%;
				padding-top: 20px;
		padding-bottom: 20px;

		}
		.container-fluid {
			padding-right: 15px;
			padding-left: 50px;
			margin-right: auto;
			margin-left: auto;
		}
		.btnU {
		    color: #fff;
		    background-color: #2B6B29E6;
		    border-color: #2B6B29E6;


}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #a49c9c;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.panel-body {
    padding: 16px;
}
		</style>
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

    <div class="container">
			<section style="padding-bottom: 50px; padding-top: 50px;">
				<div class="row">
					<!-- start -->
					<!-- USER PROFILE ROW STARTS-->
					<div class="row">
						<div class="col-md-3 col-sm-3">

							<div class="user-wrapper">
								<img src="assets/img/img.jpg" class="img-responsive" />
								<div class="description">
									<h4><?php echo $userRow['nom']; ?> <?php echo $userRow['prenom']; ?></h4>
									<h5> <strong>  </strong></h5>
									<p>
										Passionate and loving!
									</p>
									<hr />
									<button type="button" class="btn btnU" data-toggle="modal" data-target="#myModal">Update Profile</button>
								</div>
							</div>
						</div>

						<div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								<h3> <?php echo $userRow['nom']; ?> <?php echo $userRow['prenom']; ?> </h3>
								<hr />

								<div class="panel panel-default">
									<div class="panel-body">

<!--show information on user using a table -->
										<table class="table table-user-information" align="center">
											<tbody>
												<tr>
													<td>Date of Birth </td>
													<td><?php echo $userRow['dob']; ?></td>
												</tr>
												<tr>
													<td>Gender</td>
													<td><?php echo $userRow['gender']; ?></td>
												</tr>

												<tr>
													<td>Phone Number</td>
													<td><?php echo $userRow['patientPhone']; ?>
													</td>
												</tr>
												<tr>
													<td>Email Adress </td>
													<td><?php echo $userRow['email']; ?>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>

							</div>

						</div>
					</div>
					<!-- USER PROFILE ROW END-->
					<!-- end -->
          <br>
          <br>
          <br>
          <br>
          <br>


					<div class="col-md-4">

						<!-- Large modal -->

						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Edit My profile</h4>
									</div>
									<div class="modal-body">
										<!-- form start -->
										<form action="<?php $_PHP_SELF ?>" method="post" >
											<table class="table table-user-information">
												<tbody>

													<tr>
														<td>First Name:</td>
														<td><input type="text" class="form-control" name="nom" value="<?php echo $userRow['nom']; ?>"  /></td>
													</tr>
													<tr>
														<td>Last Name</td>
														<td><input type="text" class="form-control" name="prenom" value="<?php echo $userRow['prenom']; ?>"  /></td>
													</tr>

													<!-- radio button -->

													<!-- radio button end -->
													<tr>
														<td>Date of Birth</td>
														<!-- <td><input type="text" class="form-control" name="patientDOB" value="<?php echo $userRow['patientDOB']; ?>"  /></td> -->
														<td>
															<div class="form-group ">

																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar">
																		</i>
																	</div>
																	<input class="form-control" id="dob" name="dob" placeholder="MM/DD/YYYY" type="text" value="<?php echo $userRow['dob']; ?>"/>
																</div>
															</div>
														</td>

													</tr>
													<!--for  radio button -->
													<tr>
														<td>Gender</td>
														<td>
															<div class="radio">
																<label><input type="radio" name="gender" value="male" <?php echo $male; ?>>Male</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="gender" value="female" <?php echo $female; ?>>Female</label>
															</div>
														</td>
													</tr>
													<!-- radio button end -->


													<tr>
														<td>Email</td>
														<td><input type="text" class="form-control" name="email" value="<?php echo $userRow['email']; ?>"  /></td>
													</tr>

													<tr>
														<td>
															<input type="submit" name="submit" class="btn btnU" value="Modifier Information"></td>
														</tr>
													</tbody>

												</table>



											</form>
											<!-- form end -->
										</div>

									</div>
								</div>
							</div>
							<br /><br/>
						</div>

					</div>
					<!-- end of row -->
				</section>

			</div>


    </p>
    <script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>

			<script type="text/javascript">
														$(function () {
														$('#dob').datetimepicker();
														});
														</script>
		</body>
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
