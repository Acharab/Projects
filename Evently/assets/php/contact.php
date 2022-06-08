<?php
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$submit = $_POST["submit"];

if (isset($_POST["submit"])) {
    echo "<script>alert(We got your message)</script>";
    header("Location: ../../index.html");
}
