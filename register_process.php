<?php
include "config/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = trim($_POST['name']);
    $username = trim($_POST['username']);
    $pass     = trim($_POST['pass']);

    // التحقق من الحقول الفارغة
    if (empty($name) || empty($username) || empty($pass)) {
        header("Location: register.php?error=Please fill all fields");
        exit;
    }

    // التحقق من طول الباسورد
    if (strlen($pass) < 6) {
        header("Location: register.php?error=Password must be at least 6 characters");
        exit;
    }

    // التحقق إن اسم المستخدم غير مستخدم بالفعل
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        header("Location: register.php?error=Username already taken");
        exit;
    }

    // تشفير الباسورد وتسجيل المستخدم
    $hpass = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $username, $hpass);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        header("Location: login.php?success=Registration successful");
        exit;
    } else {
        header("Location: register.php?error=Registration failed");
        exit;
    }
}
?>
