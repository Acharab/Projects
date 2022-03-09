<?php
    require "connect.php";
    session_start();
    if (!isset($_SESSION['naam'])){
        header("Location: ../../index.html");
    }
    $jaarvergelijken = $_POST['jaartal'];
    $naam = $_SESSION['naam'];
    $sql = "SELECT * FROM verbruik where naamklant = 'Karel Ankerwout' and jaar = ". intval( $jaarvergelijken )."";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $vergelijk20 = "[['Maanden', 'Gas', 'Electra'],";
   // output data of each row
    while($row = $result->fetch_assoc()) {

        $vergelijk20 = $vergelijk20 . "[" . $row['maand']."," . $row['gas'] ."," . $row['energie']."],"; 
    }
    // Close the array
    $vergelijk20 = $vergelijk20 . "]";

 }
 else {
    echo "0 results";
 }

 $sql = "SELECT * FROM verbruik where naamklant = 'Achraf Aarab' and jaar = ". intval( $jaarvergelijken )."";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $vergelijk10 = "[['Maanden', 'Gas', 'Electra'],";
   // output data of each row
    while($row = $result->fetch_assoc()) {

        $vergelijk10 = $vergelijk10 . "[" . $row['maand']."," . $row['gas'] ."," . $row['energie']."],"; 
    }
    // Close the array
    $vergelijk10 = $vergelijk10 . "]";

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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>vergelijk</title>
</head>
<body class="img-container">
    <header>
        
        <nav>
            <h2>Energetic</h2>
            <div class="openMenu"><i class="fa fa-bars"></i></div>
                <ul class="mainMenu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <div class="closeMenu"><i class="fa fa-times"></i></div>
                </ul>
        </nav>
    </header>
    <main>
      <form action="" method="post">
          <label id="jaarla" for="jaar">Wat is het jaar dat u wilt vergelijken</label>
            <select name="jaartal" class="form-select" aria-label="Default select example">
                <option class="kiesjaar" selected>Kies een jaar</option>
                <?php for ($i=2019; $i < 2022; $i++) { 
                    
                ?>
                <option value="<?= $i ?>" <?php 
                
                
                if ($i == $jaarvergelijken) {
                        echo("selected");
                }
                ?> name="jaar"><?= $i ?></option>
                <?php  }?>
            </select>
            <div class="submitselectdiv">
                <input type="submit" id="selectsubmit" value="submit">
            </div>
      </form>
      <h3></h3>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <div id="vergelijk1" style="width: 100%; height: 500px; background-color: none;">
        <?php
            echo "<script>google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
            var data = google.visualization.arrayToDataTable(".$vergelijk20.");

            var options = {
                title: 'Energie verbruik Karel Ankerwout ". strval($jaarvergelijken) ."',
                hAxis: {title: 'Maanden',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('vergelijk1'));
            chart.draw(data, options);
            };</script>";
        ?>
    </div>

    <div id="vergelijk2" style="width: 100%; height: 500px; background-color: none;">
        <?php
            echo "<script>google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
            var data = google.visualization.arrayToDataTable(".$vergelijk10.");

            var options = {
                title: 'Energie verbruik Achraf Aarab ". strval($jaarvergelijken) ."',
                hAxis: {title: 'Maanden',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('vergelijk2'));
            chart.draw(data, options);
            };</script>";
        ?>
    </div>
    </main>
</body>
</html>