<?php
include "db.php";
$id=2;
$new_lname="omar";
$sql="UPDATE users SET lname='$new_lname' WHERE id=$id";
if($conn->query($sql)==true){
    echo "record updated";}
    else{
        echo "error!".$conn->error;}
        
        ?>