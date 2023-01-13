<?php
    session_start();
    if(isset($_SESSION["a_email"]) == false){
        header("location: ../admin_login.php");
    }
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
<?php include "showcategory.php"; 
$cid=$_GET["cid"];
$conn = mysqli_connect('localhost', 'root', '', 'askme');
$result=mysqli_query($conn, "SELECT * FROM category WHERE id='$cid'");
$row=mysqli_fetch_array($result);
$cid=$row['id'];
$cname=$row['category'];

 if(isset($_POST["update"])){
        $c_id=$_POST["id"];
        $c_name=$_POST["category"];
        $result=mysqli_query($conn, "UPDATE category SET category='$c_name' WHERE id='$c_id'");			
		echo "<script>alert('Update Successful')</script>";
        echo "<script>location= 'category.php'</script>";
    }
?>

<form class="row g-3" method="POST" action="">
  <div class="col-auto">
    <input type="text" value="<?=$cid?>" readonly name="id" class="form-control" id="inputPassword2">
    <input type="text" value="<?=$cname?>" name="category" class="form-control" id="inputPassword2">
  </div><br>
  <div class="col-auto">
    <button type="submit" name="update" class="btn btn-primary mb-3">Update</button>
  </div>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>