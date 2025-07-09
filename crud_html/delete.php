<?php
include "db.php";

if (!isset($_GET['id'])) {
    $message = "ID not found";
} else {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "deleted successfully";
    } else {
        echo "error " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <title>delete result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <div class="alert alert-info">
      <?= $message ?>
    </div>
    <a href="read.php" class="btn btn-primary">bach to home</a>
  </div>
</body>
</html>