<?php
  include "connect.php";
  session_start();
  if (isset($_SESSION['naam'])){
    header("Location: inlog.php");
}
  if (isset($_POST['submit'])) {
        $naam = $_POST['naam'];
        $pass = $_POST['wachtwoord'];
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
                header('Location: inlog.php');
            }else    {
                echo "<script>alert('Er is iets fout gegaan')</script>";
            }
    
        }else{
            echo "<script>alert('Gebruiker bestaat al!')</script>";
        }
  }
?>

            