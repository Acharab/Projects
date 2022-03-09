<?php
$servername = "localhost";
$username = "86695";
$password = "Driouch90";
$databasename = "image_upload";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
  echo "<script>alert('Connectie fout')</script>";
}
?> 