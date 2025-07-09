
<?php
include "db.php";
$fname = "Rana";
$lname = "Mohamed";
$age = 33;

$sql = "INSERT INTO users (lname, fname, age) VALUES ('$lname', '$fname', $age)";

if ($conn->query($sql) === TRUE) {
    echo "Rana Mohamed added successfuly";
} else {
    echo "error  " . $conn->error;
}
?>
