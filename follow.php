<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header  ('location:usrlogin.php');
  }
  $usrid=$_SESSION['id'];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
    #myInput{
        margin: auto;
        width: 300px;
        border: 1px solid  black;
        text-align: center;
    }
</style>
</head>
<body>

<div >
    <input class="form-control" id="myInput" type="text" placeholder="Type to search">
</div>

<div class="container text-center">
  <div class="row">
    <div class="col">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" colspan='2'>Following</th>
    </tr>
  </thead>
  <tbody id="myTable">
<?php
    // my following peoples
    $msg="";
    $conn = mysqli_connect('localhost', 'root', '', 'askme');     
    $qry= mysqli_query($conn, "SELECT * FROM follow WHERE userid='$usrid'");
    if(mysqli_num_rows($qry) < 1){$msg="You haven't follow anyone yet!";}else{
    while($row=mysqli_fetch_array($qry)){
        $other=$row['followid'];
        $q=mysqli_query($conn, "SELECT * FROM user WHERE id='$other'");
        while($r=mysqli_fetch_array($q)){
            $name=$r['name'];
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td><a href='unfollow.php?other=$other'>Unfollow</a></td>";
            echo "</tr>";
        }
    }}
    echo "<tr>";
    echo "<td>$msg</td>";
    echo "</tr>";
?>
  </tbody>
</table>

    </div>
    <div class="col">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Followers</th>
    </tr>
  </thead>
  <tbody id="myTable">
    
<?php
    // show my followers
    $msg1="";
    $qry= mysqli_query($conn, "SELECT * FROM follow WHERE followid='$usrid'");
    if(mysqli_num_rows($qry) < 1){$msg1="You haven't followers!";}else{
    while($row=mysqli_fetch_array($qry)){
        $myFollower=$row['userid'];
        $q=mysqli_query($conn, "SELECT * FROM user WHERE id='$myFollower'");
        while($r=mysqli_fetch_array($q)){
            $name1=$r['name'];
            echo "<tr>";
            echo "<td>$name1</td>"; 
            echo "</tr>";           
        }
    }}
    echo "<tr>";
    echo "<td>$msg1</td>";
    echo "</tr>";
?>
            
  </tbody>
</table>
    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</html>