<?php
    require 'connect.php';
    session_start();
    if (!isset($_SESSION['naam'])){
        header("Location: ../../index.html");
    }
    if (isset($_POST['submit'])) {
        $naam = $_POST['naam'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM Inlog WHERE naam='$naam'";
        $result = mysqli_query($conn, $sql);
        if(!$result -> num_rows  > 0){
            
            $sql = "INSERT INTO Inlog (naam, pass)
            VALUES('$naam', '$pass')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Gebruiker aangemaakt')</script>";
                $naam = "";
                $pass = "";
            }else    {
                echo "<script>alert('Er is iets fout gegaan')</script>";
            }
    
        }else{
            echo "<script>alert('Gebruiker bestaat al!')</script>";
        }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>klant toevoegen</title>
</head>
<body>
<div class="login-box">
  <form action="" method="POST">
    <div class="user-box">
      <input type="text" name="naam">
      <label>Naam</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass">
      <label>wachtwoord</label>
    </div>
    <button type="submit" name="submit">
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