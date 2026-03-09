<?php
$servername_database = "localhost";
$username_database = "!21!TesterAdmin";
$password_database = "!21!TesterAdmin";
$dbname = "users"; 

$conn = mysqli_connect($servername_database, $username_database, $password_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "DATABASE CONNECTION PROBLEM";
  }
  //echo "Connected successfully";
?>