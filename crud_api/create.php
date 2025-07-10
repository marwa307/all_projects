<?php
// create.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
include "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit();
}

$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$age = intval($_POST['age'] ?? 0);

if (!$fname || !$lname || !$age) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit();
}

$stmt = $conn->prepare("INSERT INTO users (fname, lname, age) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $fname, $lname, $age);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "User added successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
