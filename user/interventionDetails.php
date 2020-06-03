<?php
session_start();
include_once 'assets/conn/dbconnect.php';
$session=$_SESSION[ 'patientSession'];
$res=mysqli_query($con, "SELECT * FROM student where studentID='$session'");
	if (!$res) {
		die( "Error running $sql: " . mysqli_error());
	}
	$userRow=mysqli_fetch_array($res);
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
    <link href="../css/signUp.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/material.css" rel="stylesheet">


    		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />
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
    		.panel-primary > .panel-heading {
    		  color: #ffffff;
    		  background-color: #228B22;

    			font-size:16px;
    		}

    		body {
    		  font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
    		  font-size: 15px;
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
    		.table > thead > tr > th {
        vertical-align: bottom;
        border-bottom: 2px solid #181717;
    }
    th {
        text-align: left;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    body {
        letter-spacing: .1px;
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
                  <li><a href="dashboard.php">Mon profile</a></li>

                  <li class="menu-has-children"><a href="">Demande Intervention</a>
                    <ul>
                      <li><a href="../interventionFormTeacher.php">professeur</a></li>
                      <li><a href="../interventionFormStudent.php"> étudiants</a></li>
                    </ul>
                  </li>
                <li active><a href="interventionDetails.php">Consulter Demande</a></li>
                  </ul>
            </nav><!-- #nav-menu-container -->
          </div>
          </div>
    </header><!-- #header -->

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
  <?php

//display appointment details of user
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='page-header'>";
echo "<h1>My Appointment </h1>";
echo "</div>";
echo "<div class='panel panel-primary'>";
echo "<div class='panel-heading'>My appointment</div>";
echo "<div class='panel-body'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";

echo "<th>Name </th>";
echo "<th>Day </th>";
echo "<th>Date </th>";
echo "<th>Time </th>";
echo "<th>Action </th>";



//echo "<th>Cancel Appointment </th>"; //cancel appointment

echo "</tr>";
echo "</thead>";
$res = mysqli_query($con, "SELECT * FROM student where studentID ='$session'");

if (!$res) {
die("Error running $sql: " . mysqli_error());
}


//display details from database using a table
while ($userRow = mysqli_fetch_array($res)) {
echo "<tbody>";
echo "<tr>";

echo "<td>" . $userRow['nom'] . "</td>";
echo "<td>" . $userRow['prenom'] . "</td>";
echo "<td>" . $userRow['categorie'] . "</td>";
echo "<td>" . $userRow['lab'] . "</td>";
//echo "<td></span>".' '."". $appointment['status'] . "</td>";

//echo "<td>" . $userRow['endTime'] . "</td>";
//echo "<td><a href='invoice.php?appid=".$userRow['appId']."' target='_blank'></span></a> </td>";
echo "<form method='POST'>";
//echo "<td class='text-center'><input type='checkbox' name='enable' id='enable' value='".$appointment['appId']."' onclick='chkit(".$appointment['appId'].",this.checked);' ".$checked."></td>";
echo "<td class='text-center'><a href='#' id='".$student['studentID']."' class='delete'>Cancel </span></a>
</td>";
}

echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<div class='panel panel-default'>";
echo "<div class='col-md-offset-3 pull-right'>";
echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Update</button>";
echo "</div>";
echo "</div>";

?>
	</div>
</div>
</div>
</div>
<!-- display appoinment end -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--Cancel appointment-->
<script src="../user/assets/js/jquery.js"></script>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var appid = element.attr("id");
var info = 'id=' + appid;
if(confirm("Are you sure you want to cancel this appointment?"))
{
$.ajax({
type: "POST",
url: "deleteappointment.php",
data: info,
success: function(){
}
});
$(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
}
return false;
});
});
</script>

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
