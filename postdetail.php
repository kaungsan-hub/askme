<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header  ('location:usrlogin.php');
    error_reporting(0);
  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<?php
    $id=$_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'askme'); 
    $run=mysqli_query($conn, "SELECT * FROM post WHERE id='$id'");
    $row=mysqli_fetch_array($run);
    $text=$row['text'];
    $img=$row['image'];
    $category=$row['category'];   
?>

<?php 
  $msg="";
  $postid=$_GET['id'];
  $userid=$_SESSION['id'];
  //store the react data
  $query="SELECT * FROM react WHERE postid='$postid' AND userid='$userid'";
  $run=mysqli_query($conn, $query);
  $rows=mysqli_num_rows($run);
  if(isset($_POST['like']) || isset($_POST['dislike'])){
  if($rows != 0){
    mysqli_query($conn, "DELETE FROM react WHERE postid='$postid' AND userid='$userid' "); 
  }else{ 
    $like=$_POST['like'];
    $dislike=$_POST['dislike'];  
    if($like==="Like question"){
      mysqli_query($conn, "INSERT INTO react (`postid`, `react`, `userid`) VALUES ('$postid', '1', '$userid')");
      $msg="You like this question";
    }elseif($dislike==="Dislike question"){
      mysqli_query($conn, "INSERT INTO react (`postid`, `react`, `userid`) VALUES ('$postid', '0', '$userid')");
      $msg="You dislike this question";
    }else{ echo "<script>alert ('Something is wrong!');</script>"; }
  }}
  
  //store the answers
  $postid=$_GET['id'];
  if(isset($_POST['answer'])){
    $txt=$_POST['text'];
    $img=$_FILES['img']['name']; 
    if($txt!=""){
    move_uploaded_file($_FILES['img']['tmp_name'],'photo/'.$img);
    $query="INSERT INTO answer(`answer`, `image`, `postid`, `userid`) VALUES ('$txt', '$img', '$postid', '$userid')";
    mysqli_query($conn, $query);  
    }else{  
    echo "<script>alert('Please write your comment!');</script>";
  }}

// store the share data
     if(isset($_POST['share'])){
       $result=mysqli_query($conn, "SELECT * FROM post WHERE id='$postid'");
       $r=mysqli_fetch_array($result);
       $ownerid=$r['userid'];
       mysqli_query($conn, "INSERT INTO share (`postid`, `userid`, `ownerid`) VALUES ('$postid', '$userid', '$ownerid')");
       echo "<script>alert ('You shared this post!');</script>";
     }

// store the follow data
     if(isset($_POST['follow'])){
      $result=mysqli_query($conn, "SELECT * FROM post WHERE id='$postid'");
       $r=mysqli_fetch_array($result);
       $followid=$r['userid'];
      mysqli_query($conn, "INSERT INTO follow (userid, followid) VALUES ('$userid', '$followid')");
      echo "<script>alert ('You followed this user!');</script>";
    }
?>

<div class="row g-0 bg-light position-relative ">
  <div class="col-md-6 mb-md-0 p-md-4 text-center">
  <form action="" method="POST"  enctype="multipart/form-data">
    <img src="photo/<?php echo $img; ?>" width='350' height='250' class="rounded mx-auto d-block" >
  </div>
  <div class="col-md-6 p-4 ps-md-0">
    <h3 class="mt-0"><?php echo $category; ?></h3>
    <p><?php echo $text; ?></p>
    <button value="Like question" name="like" class="btn btn-outline-info"><i class="fa fa-thumbs-up" style="font-size:30px"></i></button>
    <button value="Dislike question" name="dislike" class="btn btn-outline-info"><i class="fa fa-thumbs-down" style="font-size:30px"></i></button>
    <!-- <button onclick="openForm()" class="btn btn-outline-info"><i class='far fa-comment-dots' style='font-size:30px'>Comment</i></button> -->
    <button name="share" class="btn btn-outline-info"><i class="fa fa-share-alt" style="font-size:30px">Share</i></button>
    <button name="follow" class="btn btn-outline-info"><i class="fa fa-plus" style="font-size:30px">Follow</i></button>
    <br>
    <?php echo $msg; ?>
    <hr>
<!-- show the comment box -->
<!-- <div id="myDiv"> -->
    <textarea name="text" class="form-control" id="textarea1" rows="3" placeholder="Upload your answer"></textarea>
    <div class="mb-3"><br>
      <label for="formFileSm" class="form-label">Add photo :</label>
      <input class="" id="formFileSm" name="img" type="file">
    <input type="submit" name="answer" value="Answer" class="btn btn-outline-info">
  </div>
<!-- </div> -->
  </form>
  </div>
</div>

<?php
//show the answers
  $showans="SELECT * FROM  answer WHERE postid='$postid'";
  $que = mysqli_query($conn, $showans);
  while($r = mysqli_fetch_array($que)){
    $answer=$r['answer'];
    $image=$r['image'];
    echo "<div class='card' style='margin: 15px auto; width:50%; padding: 8px;'>";
    echo "<img src='photo/$image' style='float: left; width: 100px; height: 70px; padding: 0 10px 0 0;'>";
    echo "<div style='text-align: justify;'>";
    echo $answer;
    echo "</div>";
    echo "</div>";
     }
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- <script>
document.getElementById("myDiv").style.display = "none";
function openForm() {
  
  var x = document.getElementById("myDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script> -->
</html>