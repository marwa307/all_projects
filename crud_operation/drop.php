<?php
include "db.php";
$id = 3;
$sql = "DELETE FROM users WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "record deleted ";
} else {
    echo "error! ". $conn->error;
}