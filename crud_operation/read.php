<?php
include "db.php";

$sql="SELECT * FROM users";
$result=$conn->query($sql);
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
         echo "ID: " . $row["id"] . " LastName: " .  $row["lname"] . "FirstName: " . $row["fname"] . " Age: " . $row["age"] . "<br>";
}}
else{
    echo "no records found";
}
?>