<?php
    // session_start();
    // if(isset($_SESSION["a_email"]) == false){
    //     header("location: ../admin_login.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $conn = mysqli_connect('localhost', 'root', '', 'askme');
    $result=mysqli_query($conn, "SELECT * FROM category");
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>";
        echo $row['id'];
        $cid=$row['id'];
        echo "</td>";
        echo "<td>";
        echo $row['category'];
        echo "</td>";
        echo "<td><a href='up_category.php?cid=$cid'>Update</a></td>";
        echo "<td><a href='rm_category.php?cid=$cid'>Delete</a></td>";
        echo "</tr>";
    }    
    ?> 
  </tbody>
</table>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>