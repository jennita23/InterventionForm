<!--Auteur:jennita Aubeeluck
Date:24/3/19
Doctor can view all his patientsand do filter search -->

<?php
session_start();
include_once 'assets/conn/dbconnect.php';

if(!isset($_SESSION['id']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['id'];
$res=mysqli_query($con,"SELECT * FROM applicant WHERE idUser=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome Dr <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <style>
        .butu{
          color: #fff;
          background-color: grey;
          border-color: #2B6B29E6;
        }
        .side-nav {
            position: fixed;
            top: 80px;
            left: 225px;
            width: 225px;
            margin-left: -225px;
            border: none;
            border-radius: 0;
            overflow-y: auto;
            background-color: #222;
            bottom: 0;
            overflow-x: hidden;
            padding-bottom: 40px;
        }

    .nav {
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;
    }
    body {
        letter-spacing: .1px;
    }
    body {
        font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 17px;
        line-height: 1.846;
        color: #666666;
    }

    .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
        color: green;
        background-color: transparent;
    }

    .side-nav > li > a {
        width: 225px;
    }

    .side-nav li a:hover, .side-nav li a:focus {
        outline: none;

    }
    .panel-body {
        padding: 22px;
    }
    .panel-primary > .panel-heading {
        color: #ffffff;
        background-color: green;
        border-color: green;
    }

    .panel-heading {
        padding: 10px 15px;

        border-top-right-radius: 2px;
        border-top-left-radius: 2px;
    }
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 20px;
        color: inherit;
    }
    th {
        text-align: left;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    input, button {

        letter-spacing: .1px;
    }
    input, button, select, textarea {
        font-family: inherit;

    }
    .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;

        white-space: nowrap;
        padding: 6px 16px;
        font-size: 13px;
        line-height: 1.846;
        border-radius: 3px;

    }
    .table-bordered {
        border: 1px solid #dddddd;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 23px;
    }
    table {
        background-color: transparent;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    .btn-default:focus {
        background-color: #ffffff;
    }
    .btn-default:focus, .btn-default.focus {
        color: #444444;
        background-color: #e6e6e6;
        border-color: rgba(0, 0, 0, 0);
    }
    .btn-default {
        background-size: 200%;
        background-position: 50%;
    }
    .btn-xs, .btn-group-xs > .btn {
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
    .btn-default {
        color: #444444;
        background-color: #ffffff;
        border-color: transparent;
    }
    button {
        overflow: visible;
    }


    .navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus {
        color: #2F4F4F;
        background-color: transparent;
    }
    .navbar-inverse .navbar-brand {
        color: #2F4F4F;
    }

    .navbar-brand {
        float: left;
        padding: 20.5px 15px;
        font-size: 25px;
        line-height: 23px;
        height: 64px;
    }
    .container-fluid {
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
    table-hover > tbody > tr, .table-hover > tbody > tr > th, .table-hover > tbody > tr > td {

      transition: all 0.2s;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
      border: 1px solid #dddddd;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
      padding: 8px;
      line-height: 1.846;
      vertical-align: top;

    }
  </style>
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
          
            <div id="page-wrapper">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                                <img src="../img/logo1.png" alt="" width="150" height="40" />
                                <br>
                        My Patient
                            </h2>

                        </div>
                    </div>


                    <!-- panel start -->
                    <div class="panel panel-primary filterable">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Mes interventions</h3>
                            <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Search</button>
                        </div>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="FirstName" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>

                                    <th><input type="text" class="form-control" placeholder="ContactNo." disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Gender" disabled></th>

                                    <th><input type="text" class="form-control" placeholder="Address" disabled></th>
                                </tr>
                            </thead>

                            <?php

                            include_once 'assets/conn/dbconnect.php';

                            if(!isset($_SESSION['id']))
                            {
                            header("Location: ../index.php");
                            }
                            //$usersession = $_SESSION['id'];
                            $result=mysqli_query($con,"SELECT * FROM application  WHERE idUser=".$_SESSION['id']);



                            while ($patientRow=mysqli_fetch_array($result)) {


                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $patientRow['nom'] . "</td>";
                                    echo "<td>" . $patientRow['prenom'] . "</td>";

                                    echo "<td>" . $patientRow['email'] . "</td>";
                                     echo "<td>" . $patientRow['equipement'] . "</td>";
                                    echo "<td>" . $patientRow['lab'] . "</td>";


                                    echo "<td>" . $patientRow['dept'] . "</td>";
                                      echo "<td>" . $patientRow['description'] . "</td>";
                                        echo "<td>" . $patientRow['statut'] . "</td>";
                                          echo "<td>" . $patientRow['disponible'] . "</td>";
                                            echo "<td>" . $patientRow['statutEquipement'] . "</td>";
                                    echo "<form method='POST'>";
                                   echo "<td class='text-center'><a href='#' id='".$patientRow['idUser']."' class='delete'></a>
                            </td>";

                            }
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                      // echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Update</button>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>
                    <!-- panel start -->

                </div>
            </div>




        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
        <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var ic = element.attr("id");
var info = 'ic=' + ic;
if(confirm("Are you sure you want to delete this patient ?"))
{
 $.ajax({
   type: "POST",
   url: "deletepatient.php",
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
 <script type="text/javascript">
            /* filter information on user */
            $(document).ready(function(){
                $('.filterable .btn-filter').click(function(){
                    var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function(e){
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9') return;
                    /* Useful data and selectors */
                    var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');

                    var $filteredRows = $rows.filter(function(){
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clear previous no-result if exist */
                    $table.find('tbody .no-result').remove();

                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found ! </td></tr>'));
                    }
                });
            });
        </script>


        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-clockpicker.js"></script>

    </body>
</html>
