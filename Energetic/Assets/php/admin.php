<?php
    include "connect.php";
    session_start();
    if (!isset($_SESSION['naam'])){
        header("Location: ../../index.html");
    }

    $naam = $_POST['gebruiker'];

    $sql = "SELECT * FROM Inlog";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($naam == $row['naam']){
                header("Location: invoer.php?klant=".$naam."");
            }
        }
    }
    else {
        echo "0 results";
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/script.js" defer></script>
    <title>Admin</title>
</head>
<body>
<header>

<nav>
    <h2>Energetic</h2>
    <div class="openMenu"><i class="fa fa-bars"></i></div>
        <ul class="mainMenu">
            <li><a href="toevoegengebruiker.php">add user</a></li>
            <li><a href="allegebruikers.php">all users</a></li>
            <li><a href="logout.php">logout</a></li>
            <div class="closeMenu"><i class="fa fa-times"></i></div>
        </ul>
</nav>
</header>

<div class="login-box">
  <form action="" method="POST">
    <div class="user-box">
      <input type="text" name="gebruiker">
      <label>Voer de naam van klant in!</label>
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