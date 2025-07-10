<?php
// update.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
include "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit();
}

$id = intval($_POST['id'] ?? 0);
$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$age = intval($_POST['age'] ?? 0);

if (!$id || !$fname || !$lname || !$age) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit();
}

$stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, age=? WHERE id=?");
$stmt->bind_param("ssii", $fname, $lname, $age, $id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "User updated successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
