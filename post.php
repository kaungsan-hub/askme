<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header  ('location:usrlogin.php');
  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
  .center {
    margin-left: 25%;
    margin-right:25%;
    width: 50%;
  }
</style>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3"><div class='center'>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'askme');
  $result=mysqli_query($conn, "SELECT * FROM category");
  echo "<select name='category' class='form-select'>";
   while($row=mysqli_fetch_assoc($result)){
      echo "<option>";
      echo $row['category'];
      echo "</option>";   
   }
  echo "</select><br>"; 
   ?>
    <textarea name="text" class="form-control" id="textarea1" rows="5" placeholder="Upload your questions"></textarea><br>
    <input class="form-control form-control-sm" name="img" id="formFileSm" type="file"><br>
    <input type="submit" name="upload" value="Upload" class="btn btn-outline-info ">   
  </div></div>
</form>
  <?php
    if(isset($_POST['upload'])){
      $category=$_POST['category'];
      $text=$_POST['text'];
      $date=date("Y-m-d",time());
      $userid= $_SESSION['id'];
      $img=$_FILES['img']['name'];
      if($text!=""){
      move_uploaded_file($_FILES['img']['tmp_name'],'photo/'.$img);
      $query="INSERT INTO post(`category`, `text`, `image`, `userid`, `date`) VALUES ('$category', '$text', '$img', '$userid', '$date')";
      mysqli_query($conn, $query);
      echo "<script>alert('Uploaded')</script>";
      echo "<script>location= 'home.php'</script>";
      }else{echo "<script>alert('Please write your question!');</script>";}
    }
  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>
