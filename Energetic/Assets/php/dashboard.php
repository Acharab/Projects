<?php
    require "connect.php";
    session_start();
    if (!isset($_SESSION['naam'])){
        header("Location: ../../index.html");
    }

    if ($_SESSION['naam'] == "admin") {
        header("Location: admin.php");
    }
    $naam = $_SESSION['naam'];
    $sql = "SELECT * FROM verbruik where naamklant = '".$naam."' and jaar = ". 2019 ."";
    $result = $conn->query($sql);



 if ($result->num_rows > 0) {
    $dataGebruik2019 = "[['Maanden', 'Gas', 'Electra'],";
   // output data of each row
    while($row = $result->fetch_assoc()) {

        $dataGebruik2019 = $dataGebruik2019 . "[" . $row['maand']."," . $row['gas'] ."," . $row['energie']."],"; 
    }
    // Close the array
    $dataGebruik2019 = $dataGebruik2019 . "]";

 }
 else {
    echo "0 results";
 }

 $sql = "SELECT * FROM verbruik where naamklant = '".$naam."' and jaar = ". 2020 ."";
 $result = $conn->query($sql);


if ($result->num_rows > 0) {
 $dataGebruik2020 = "[['Maanden', 'Gas', 'Electra'],";
// output data of each row
 while($row = $result->fetch_assoc()) {

     $dataGebruik2020 = $dataGebruik2020 . "[" . $row['maand']."," . $row['gas'] ."," . $row['energie']."],"; 
 }
 // Close the array
 $dataGebruik2020 = $dataGebruik2020 . "]";

}
else {
 echo "0 results";
}
$sql = "SELECT * FROM verbruik where naamklant = '".$naam."' and jaar = ". 2021 ."";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
    $dataGebruik2021 = "[['Maanden', 'Gas', 'Electra'],";
   // output data of each row
    while($row = $result->fetch_assoc()) {
   
        $dataGebruik2021 = $dataGebruik2021 . "[" . $row['maand']."," . $row['gas'] ."," . $row['energie']."],"; 
    }
    // Close the array
    $dataGebruik2021 = $dataGebruik2021 . "]";
   
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

    <title>dashboard</title>
</head>
<body class="img-container">
    <header>
    
        <nav>
            <h2>Energetic</h2>
            <div class="openMenu"><i class="fa fa-bars"></i></div>
                <ul class="mainMenu">
                    <li><a href="vergelijk.php">Vergelijk</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <div class="closeMenu"><i class="fa fa-times"></i></div>
                </ul>
        </nav>
    </header>
    <main>
        <div class="center">
            <div id="welkomscreen">
                <h2>Welkom op Energetic u bent ingelogd als <?php echo $naam ?> </h2>
                <p>Als u naar beneden scrolt ziet u u laatste energie en gas verbruik van de laatste 3 jaar</p>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="t2019" style="width: 100%; height: 500px; background-color: none;">
    <?php
        echo "<script>google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(".$dataGebruik2019.");

        var options = {
            title: 'Energie verbruik 2019',
            hAxis: {title: 'Maanden',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('t2019'));
        chart.draw(data, options);
        };</script>";
    ?>
    </div>

    <div id="t2020" style="width: 100%; height: 500px;">
    <?php
        echo "<script>google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(".$dataGebruik2020.");

        var options = {
            title: 'Energie verbruik 2020',
            hAxis: {title: 'Maanden',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('t2020'));
        chart.draw(data, options);
        };</script>";
    ?>
    </div>
    <div id="t2021" style="width: 100%; height: 500px;">
    <?php
        echo "<script>google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(".$dataGebruik2021.");

        var options = {
            title: 'Energie verbruik 2021',
            hAxis: {title: 'Maanden',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('t2021'));
        chart.draw(data, options);
        };</script>";
    ?>
    </div>
</body>
</html>

