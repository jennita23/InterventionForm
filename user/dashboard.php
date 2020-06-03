<?php
// Initialize the session
session_start();
include_once 'assets/conn/dbconnect.php';

if(!isset($_SESSION['id']))
{
header("Location: ../index.php");
}
// Check if the user is logged in, if not then redirect him to login page

$res=mysqli_query($con,"SELECT * FROM applicant WHERE UserID=".$_SESSION['id']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
$username = $_POST['username'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$year = $_POST['year'];

$patientId = $_POST['patientId'];
// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$res=mysqli_query($con,"UPDATE applicant SET username='$username', prenom='$prenom', email='$email', dob='$dob', gender='$gender' , year='$year' WHERE UserID=".$_SESSION['id']);
// $userRow=mysqli_fetch_array($res);
header( 'Location: dashboard.php' ) ;
}
?>

<?php
$male="";
$female="";
if ($userRow['gender']=='Male') {
$male = "checked";
}elseif ($userRow['gender']=='Female') {
$female = "checked";
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


      <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
      <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">

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
			margin-left: 1000px;
		}
		.btnU {
		    color: #fff;
		    background-color: #8490ff;
		    border-color: #8490ff;


}
.topnav-right{
  float: right;
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
  <header id="header">
  <div class="container main-menu">
      <div class="row align-items-center justify-content">
        <div id="logo" >
          <a href="dashboard.php"><img src="../img/mainLogo.png" alt="" title=""  width="250" height="60"/></a>
        </div>

        <nav id="nav-menu-container" class="topnav-right">

          <ul class="nav-menu">
              <li active ><a href="dashboard.php">Mon profile</a></li>

              <li class="menu-has-children"><a href="">Demande Intervention</a>
                <ul>
                  <li><a href="../interventionFormTeacher.php">professeur</a></li>
                  <li><a href="../interventionFormStudent.php"> étudiants</a></li>
                </ul>
              </li>
            <li><a href="interventionDetails.php">Consulter Demande</a></li>
              </ul>
        </nav><!-- #nav-menu-container -->
      </div>
      </div>

      </header><!-- #header -->

    <br>

    <div class="page-header">

    </div>
    <p>
<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to our site.</h1>
      <!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get together(grouping) to  display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>

					</button>

				</div>

					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user "></i> <?php echo $userRow['username']; ?> <?php echo $userRow['prenom']; ?></a>
							<ul class="dropdown-menu">


								<li>
									<a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
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
									<h4><?php echo $userRow['username']; ?> <?php echo $userRow['prenom']; ?></h4>
									<h5> <strong>  </strong></h5>
									<p>

									</p>
									<hr />
									<button type="button" class="btn btnU" data-toggle="modal" data-target="#myModal">Modifier mon profile</button>
								</div>
							</div>
						</div>

						<div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								<h3> <?php echo $userRow['username']; ?> <?php echo $userRow['prenom']; ?> </h3>
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
													<td>Year</td>
													<td><?php echo $userRow['year']; ?>
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
										<h4 class="modal-title" id="myModalLabel">Modifier mon profile</h4>
									</div>
									<div class="modal-body">
										<!-- form start -->
										<form action="<?php $_PHP_SELF ?>" method="post" >
											<table class="table table-user-information">
												<tbody>

													<tr>
														<td>Nom:</td>
														<td><input type="text" class="form-control" name="username" value="<?php echo $userRow['username']; ?>"  /></td>
													</tr>
													<tr>
														<td>Prénom</td>
														<td><input type="text" class="form-control" name="prenom" value="<?php echo $userRow['prenom']; ?>"  /></td>
													</tr>

                          <tr>
                            <td>Adresse Email</td>
                            <td><input type="text" class="form-control" name="email" value="<?php echo $userRow['email']; ?>"  /></td>
                          </tr>
													<!-- radio button -->

													<!-- radio button end -->
													<tr>
														<td>Date de naissance</td>
														<!-- <td><input type="text" class="form-control" name="patientDOB" value="<?php echo $userRow['dob']; ?>"  /></td> -->
														<td>
															<div class="form-group ">

																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar">
																		</i>
																	</div>
																	<input class="form-control" id="dob" name="dob" placeholder="MM/DD/YYYY" type="date" value="<?php echo $userRow['dob']; ?>"/>
																</div>
															</div>
														</td>

													</tr>
													<!--for  radio button -->
													<tr>
														<td>Gender</td>
														<td>
															<div class="radio">
																<label><input type="radio" name="gender" value="Male" <?php echo $male; ?>>Male</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="gender" value="Female" <?php echo $female; ?>>Female</label>
															</div>
														</td>
													</tr>
													<!-- radio button end -->


                          <tr>
                            <td>Annee</td>
                            <td><input type="text" class="form-control" name="year" value="<?php echo $userRow['year']; ?>"  /></td>
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

</html>
