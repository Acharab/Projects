<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

require "connect.php";
$sql = "SELECT * FROM verbruik FROM data where naamklant = ? and jaar = 2019 ";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {
   // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['naamklant'];
        echo "</br>";
        echo $row['gas'];
        echo "</br>";
        echo $row['energie'];
        echo "</br>";
        echo $row['jaar'];
        echo "</br>";
        echo $row['maand'];
        echo "</br>";
    }
 }
 else {
    echo "0 results";
 }
 $conn->close();

?>