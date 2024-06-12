<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pw2024_tubes_233040148";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Use this $conn variable for your database queries
