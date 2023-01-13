
<?php
session_start();
if(!isset($_SESSION['id'])){
  header  ('location:usrlogin.php');
}
    $id=$_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'askme');
    mysqli_query($conn, "DELETE FROM user WHERE id='$id'");
    mysqli_query($conn, "DELETE FROM post WHERE userid='$id'");
    mysqli_query($conn, "DELETE FROM answer WHERE userid='$id'");
    mysqli_query($conn, "DELETE FROM react WHERE userid='$id'");
    mysqli_query($conn, "DELETE FROM share WHERE userid='$id'");
    mysqli_close($conn);
    header  ('location:index.html');
?>

