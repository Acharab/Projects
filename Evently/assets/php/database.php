<?php
$servername = "localhost";
$username = "86695";
$password = "Driouch90";
$dbname = "CRUDPro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
