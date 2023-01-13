<?php
session_start();
if(!isset($_SESSION['id'])){
  header  ('location:usrlogin.php');
}
$unfollow=$_GET['other'];
$conn = mysqli_connect('localhost', 'root', '', 'askme');
mysqli_query($conn, "DELETE FROM `follow` WHERE `followid`='$unfollow'");
    echo "<script>alert('Successfully Unfollow!')</script>";
    echo "<script>location= 'follow.php'</script>";
	
	mysqli_close($conn);

?>