<?php
 //mysqli connection to database
$con= new mysqli("localhost","","root","intervention");

// Check connection
if ($con -> connect_errno) {
 echo "Failed to connect to MySQL: " . $con -> connect_error;
 exit();
}
?>
