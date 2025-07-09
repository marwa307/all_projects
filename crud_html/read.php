<?php


include "db.php";
$result =mysqli_query($conn,"SELECT * FROM users");
print_r($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document </title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <table class="table table-striped">
  <thead>
    
    <tr>
      <th scope="col">id</th>
      <th scope="col">Fname</th>
      <th scope="col">Lname</th>
      <th scope="col">age</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      

      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['fname'] . "</td>";
              echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['age'] . "</td>";
              echo "
  <td>

    

    <a href='update.php?id={$row['id']}' class='btn btn-sm btn-success me-1'>Edit</a>
   <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
  </td>
";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>not found data</td></tr>";
      }

      ?>

    
   
  </tbody>
</table>
    
</body>
</html>