<?php
include "db.php";

if (!isset($_GET['id'])) {
    die("ID missing");
}
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET fname='$fname', lname='$lname', age='$age' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
if (mysqli_num_rows($result) !== 1) {
    die("User not found");
}
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Edit User</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container">
    <h2 class="text-center my-4">Edit User</h2>

    <form method="POST" class="w-50 mx-auto">
        <input type="text" name="fname" class="form-control mb-3" value="<?= htmlspecialchars($row['fname']) ?>" required>
        <input type="text" name="lname" class="form-control mb-3" value="<?= htmlspecialchars($row['lname']) ?>" required>
        <input type="number" name="age" class="form-control mb-4" value="<?= htmlspecialchars($row['age']) ?>" required>

        <button type="submit" class="btn btn-success me-2">Save</button>
        <a href="read.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>