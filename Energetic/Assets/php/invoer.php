<?php
    require "connect.php";
    session_start();
    if (!isset($_SESSION['naam'])){
        header("Location: ../../index.html");
    }
    $klant = $_GET['klant'];
    $gas = $_POST['gas'];
    $energie = $_POST['energie'];
    $jaar = $_POST['jaar'];
    $maand = $_POST['maand'];
    $sql = "INSERT INTO `verbruik`(`naamklant`, `gas`, `energie`, `jaar`, `maand`) VALUES (' ".$klant."' ," . $gas. ",".$energie.",".$jaar.",".$maand.")" ;
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "de gevens zijn ingevuld";
        header("Location: admin.php");
      } else {
        echo "Error";
      }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Invoeren gegevens</title>
</head>
<body>
<div class="login-box">
  <form action="" method="POST">
    <div class="user-box">
      <input type="number" name="gas">
      <label>Voer gas verbruik</label>
    </div>
    <div class="user-box">
      <input type="number" name="energie">
      <label>Voer energie verbruik</label>
    </div>
    <div class="user-box">
      <input type="number" name="jaar" max="2022">
      <label>Voer het jaar in</label>
    </div>
    <div class="user-box">
      <input type="number"  name="maand" max="12">
      <label>Voer de maand in</label>
    </div>
    <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </button>
  </form>
</div>
</body>
</html>