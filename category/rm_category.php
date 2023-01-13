<?php
    session_start();
    if(isset($_SESSION["a_email"]) == false){
        header("location: ../admin_login.php");
    }
	include "showcategory.php";

	$cid = $_GET["cid"];
    $conn = mysqli_connect('localhost', 'root', '', 'askme');
	$result = mysqli_query($conn, "DELETE FROM `category` WHERE `id`='$cid'");
    echo "<script>alert('Successfully Removed!')</script>";
    echo "<script>location= 'category.php'</script>";
	
	mysqli_close($conn);
    
?>