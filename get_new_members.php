<?php
include "config/db.php"; 

$sql = "SELECT COUNT(*) AS total FROM users WHERE created_at >= NOW() - INTERVAL 30 DAY";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['total'];
} else {
    echo "Error";
}
?>