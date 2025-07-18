
<?php  

session_start();
include "config/db.php";

$userName = $_POST["username"];
$password = $_POST["pass"];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userName);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && $password == $user["password"]) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username']
    ];
    header("Location: index.php");
    exit;
} else {
    header("Location: login.php?error=user not found");
    exit;
}
?>