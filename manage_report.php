<?php
    session_start();
    if(isset($_SESSION["a_email"]) == false){
        header("location: admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container px-4 text-center">
  <div class="row gx-5">

    <div class="col">
     <div class="p-3 border bg-light">
       <p>Most Dislike Posts</p>
       <?php
        $conn = mysqli_connect('localhost', 'root', '', 'askme');
        $repeat="SELECT postid FROM react WHERE react = '0' Group by postid order by count(postid) desc";
        $run = mysqli_query($conn, $repeat);
        while($res=mysqli_fetch_array($run)){
            $postid = $res['postid'];
            $que = mysqli_query($conn, "SELECT * FROM post WHERE id = $postid");
            while($r=mysqli_fetch_array($que)){
                $post_id=$r['id'];
                $text=$r['text'];
                $image=$r['image'];
                echo "<div class='card' style='margin: 15px auto; width:50%; padding: 8px;'>";
                echo "<img src='photo/$image' style='float: left; width: 100px; height: 70px; padding: 0 10px 0 0;'>";   
                echo "<div style='text-align: justify;'>";
                echo $text;
                echo "</div>";
                echo "<a href='postdelete.php?post_id=$post_id'><i class='fa fa-trash-o' style='font-size:24px;color:red'></i></a>";
                echo "</div>"; 
            }
        }
        ?>
     </div>
    </div>

    <div class="col">
      <div class="p-3 border bg-light">
        <p>No Comment Posts</p>
        <?php
        $selectcmt=mysqli_query($conn, "SELECT * FROM answer");
        while($run=mysqli_fetch_array($selectcmt)){
          $cmtPosts=$run['postid'];
          $noCmt=mysqli_query($conn, "SELECT * FROM post WHERE id != $cmtPosts");
          while($r=mysqli_fetch_array($noCmt)){
            $post_id=$r['id'];
            $text=$r['text'];
            $image=$r['image'];
                echo "<div class='card' style='margin: 15px auto; width:50%; padding: 8px;'>";
                echo "<img src='photo/$image' style='float: left; width: 100px; height: 70px; padding: 0 10px 0 0;'>";   
                echo "<div style='text-align: justify;'>";
                echo $text;
                echo "</div>";
                echo "<a href='postdelete.php?post_id=$post_id'><i class='fa fa-trash-o' style='font-size:24px;color:red'></i></a>";
                echo "</div>"; 
          }
        }
        ?>
      </div>
    </div>

  </div>
</div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>