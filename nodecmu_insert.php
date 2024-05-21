<?php

    $temp     =(float) $_GET['temp'];
    $humidity = (float)$_GET['humidity'];
   //var_dump($humidity);die;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temp_monitoring";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO temps (temp, humidity)
    VALUES ('".$temp."', '".$humidity."')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;

?>