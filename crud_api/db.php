<?php
// db.php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "crud_oper";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

$conn->set_charset("utf8");
?>
