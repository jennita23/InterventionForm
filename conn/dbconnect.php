<?php
 //mysqli connection to database
$mysqli = new mysqli("localhost","","","test");

// Check connection
if ($mysqli -> connect_errno) {
 echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
 exit();
}
?>