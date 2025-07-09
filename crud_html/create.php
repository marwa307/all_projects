 <?php
 
 include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age   = $_POST["age"];

    $sql = "INSERT INTO users (fname, lname, age) VALUES ('$fname', '$lname', '$age')";
    
    if ($conn->query($sql)) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert User</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">Insert New User</h2>
    <form method="POST" action="">
      <div class="row mb-3 align-items-center">
        <label for="fname" class="col-sm-2 col-form-label">First Name:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
      </div>

      <div class="row mb-3 align-items-center">
        <label for="lname" class="col-sm-2 col-form-label">Last Name:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
      </div>

      <div class="row mb-3 align-items-center">
        <label for="age" class="col-sm-2 col-form-label">Age:</label>
        <div class="col-sm-3">
          <input type="number" class="form-control" id="age" name="age" required>
        </div>
      </div>

      <div class="row">
        <div class="offset-sm-2 col-sm-6">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="read.php" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>