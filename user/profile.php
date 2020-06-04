



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>

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
      <style>
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
      </style>
</head>
<body>
  <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="dashboard.php"><img src="../img/mainLogo.png" alt="" title=""  width="250" height="60" /></a>
        </div>
        <nav id="nav-menu-container">

          <ul class="nav-menu">
              <li active ><a href="dashboard.php">Mon profile</a></li>

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

      <?php
      /* Attempt MySQL server connection. Assuming you are running MySQL
      server with default setting (user 'root' with no password) */
      $link = mysqli_connect("localhost", "root", "", "test");

      // Check connection
      if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
      }

      // Attempt select query execution
      $sql = "SELECT * FROM student where studentID=1";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
              echo "<table>";
                  echo "<tr>";
                      echo "<th>id</th>";
                      echo "<th>first_name</th>";
                      echo "<th>last_name</th>";
                      echo "<th>email</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['studentID'] . "</td>";
                      echo "<td>" . $row['nom'] . "</td>";
                      echo "<td>" . $row['prenom'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No records matching your query were found.";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      // Close connection
      mysqli_close($link);
      ?>
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
