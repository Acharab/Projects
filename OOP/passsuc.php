<?php

require 'connect.php';
$passinv = $_POST["passw"];
$idp = $_POST["id"];
$sql = "SELECT * FROM `collective1` WHERE id=$idp";



if ($passinv == $row["password"]) {
    echo "je bent ingelogt";
}
else{
    echo "verkeerd ww";
}
?>