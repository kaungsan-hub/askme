<?php
   session_start();
   if(isset($_SESSION['id'])){
     
   $usrid=$_SESSION['id'];

    $pid=$_GET['post_id'];
    $spid=$_GET['share_post_id'];

   $conn = mysqli_connect('localhost', 'root', '', 'askme');
   if(isset($pid)){
      mysqli_query($conn, "DELETE FROM post WHERE id='$pid'");
         echo "<script>alert('Successful Delete Your Post');</script>";
         echo "<script>location= 'profile.php'</script>";
   }
   if(isset($spid)){
      mysqli_query($conn, "DELETE FROM share WHERE postid='$spid' AND userid='$usrid'");
      echo "<script>alert('Successful Delete Your Share Post');</script>";
      echo "<script>location= 'profile.php'</script>";
   }
  
   }else if(isset($_SESSION['a_email'])){
    $pid=$_GET['post_id'];
   $conn = mysqli_connect('localhost', 'root', '', 'askme');
   if(isset($pid)){
      mysqli_query($conn, "DELETE FROM post WHERE id='$pid'");
         echo "<script>alert('Successful Delete Post');</script>";
         echo "<script>location= 'manage_report.php'</script>";
   }
   }
   echo "<script>alert('You need to login first');</script>";
   
   
   
?>