<?php

$host ="localhost";
$user ="root";
$pass ="";

$db_name ="dashboard";




$conn = new mysqli($host,$user,$pass,$db_name);
if ($conn->connect_error) {
    echo"connection failed" .$conn->connect_error;
}

echo "Connected successfully";

?>