<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cnam";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) ;

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
