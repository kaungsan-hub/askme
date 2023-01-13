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
<?php include "showcategory.php"; ?>

<form class="row g-3" method="POST">
  <div class="col-auto">
    <input type="text" name="category" class="form-control" id="inputPassword2" placeholder="Add Category">
  </div>
  <div class="col-auto">
    <button type="submit" name="add" class="btn btn-primary mb-3">Add</button>
  </div>
  <div class="col-auto">
      <a href="../admin.php"><input type="button" class='btn btn-primary mb-3' value="Back to Home"></a>
  </div>
</form>

<?php
    if(isset($_POST["add"])){
        $cname=$_POST["category"];
        $conn = mysqli_connect('localhost', 'root', '', 'askme');
		$result=mysqli_query($conn, "INSERT INTO category(`category`)
	        		VALUES ('$cname')");		
		echo "<script>alert('Add Successful')</script>";
        echo "<script>location= 'category.php'</script>";
        mysqli_close($conn);
    }
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>