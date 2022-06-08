<?php
include 'database.php';
session_start();
if (!isset($_SESSION['naam'])) {
    header("Location: ../../index.html");
}
$id = $_GET["id"];

$sql = "DELETE FROM `reservation` WHERE `id`=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Deleted Succesfull')</script>";
    header('Location: dashboard.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
