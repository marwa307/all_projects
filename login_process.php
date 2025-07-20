
<?php
session_start();
include "config/db.php";

$userName = $_POST["username"];
$password = $_POST["pass"];

$sql = "SELECT users.*, roles.name AS role_name
        FROM users
        JOIN roles ON users.role_id = roles.id
        WHERE users.username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userName);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user["password"])) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'],
        'role' => $user['role_name']  // دي هتكون: admin أو user أو viewer
    ];
    header("Location: index.php");
    exit;
} else {
    header("Location: login.php?error=Invalid username or password");
    exit;
}
?>