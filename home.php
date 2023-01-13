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
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      
      <style>
         .hovercolor:hover {background-color: lightgrey;}
      </style>
   </head>
   <!-- body -->
   <body class="main-layout footer_to90 news_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->

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
      <header> 
<form action="" method="POST">
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item ">
                                    <a class="nav-link" href="home.php">Home</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="profile.php">Profile</a>
                                 </li>
                                 <div class="nav-item">
                                 <div class="dropdown">
                                 <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter
                                 </a>
                                 <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" name='follow_users'>Follow Users</button></li>
                                    <li><button class="dropdown-item" name='popular'>Popular</button></li>
                                    <li><button class="dropdown-item" name='latest'>Latest</button></li>
                                 </ul>
                                 </div></div>
                                 <div class="nav-item">
                                 <div class="dropdown">
                                 <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Setting
                                 </a>
                                 <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" <?php echo "href='usrupdate.php?id=$usrid'" ?>>Update Profile</a></li>
                                    <li><a class="dropdown-item" href="contact.php">Contact</a></li>
                                    <li><a class="dropdown-item" href="about.php">About</a></li>
                                    <li><a class="dropdown-item" href="usrlogout.php">Logout</a></li>
                                    <li><a class="dropdown-item" onClick="javascript: return confirm('Delete Account!(Posts, Comments and all data will be lose)');"  <?php echo "href='usrdelete.php?id=$usrid'" ?>>Delete Account</a></li>
                                 </ul>
                                 </div></div>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <div class="search">
                              <input class="form_sea" id="myInput" type="text" placeholder="Search" name="search">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</form>         
<!-- 1 section -->

            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                  <?php 
                     $id=$_SESSION['id'];
                     $conn = mysqli_connect('localhost', 'root', '', 'askme');     
                     $que = mysqli_query($conn,"SELECT * FROM user WHERE id = '$id'");    
                     $row=mysqli_fetch_array($que);
                     $n=$row['name'];
                     $img= $row['image'];                  
                     echo"<div class='col-md-4'>";
                        echo"<ul class='conta_icon d_none1'>";
                           echo"<a href='profile.php'><img src='photo/$img' width='40' height='40' style='border-radius:20%;' ></a>";
                           echo" Welcome : $n";
                        echo"</ul>";
                     echo"</div>";
                     ?>
                     <div class='col-md-4'>
                        <ul class='right_icon d_none1'>
                           <a href='post.php' class='order'>NEW POST</a> 
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
      </header>
<!-- end header inner -->
<!-- end header -->  
<!-- news section -->
   <table id="myTable">
      <?php   
         $conn = mysqli_connect('localhost', 'root', '', 'askme');
         if(isset($_POST['follow_users'])) {
            $run=mysqli_query($conn, "SELECT * FROM follow WHERE userid = $usrid");
            while($r=mysqli_fetch_array($run)){
                $followid=$r['followid'];
               $que = mysqli_query($conn, "SELECT * FROM post WHERE userid = $followid");
               while($result = mysqli_fetch_array($que)){
                  echo "<tr>";
                  $category=$result['category'];
                  $date=$result['date'];
                  $text = $result['text'];
                  $image = $result['image'];
                  $id = $result['id'];
                  echo "<td>";
                  echo"<div class='news'";
                  echo"<div class='container'>";
                  echo"<div class='row'>";
                  echo"<div class='col-md-12 margin_top40'>";
                  echo"<div class='row d_flex'>";
                  echo"<div class='col-md-5'>";
                  echo"<div class='news_img'>";
                  echo"<figure><img src='photo/$image'></figure>";
                  echo"</div>";
                  echo"</div>";
                  echo"<div class='col-md-7'>";
                  echo"<div class='hovercolor'>";
                  echo"<a href='postdetail.php?id=$id'>";
                  echo"<div class='news_text'>";
                  echo"<h3>$category</h3>";
                  echo"<span>$date</span> ";
                  echo"<p>$text</p>";
                  echo"</div></a></div>";
                  echo"</div>";
                  echo"</div>";
                  echo"</div>";
                  echo"</div>";
                  echo"</div>";    
                  echo"</div>";
                     echo "</td>";
                     echo "</tr>";}
            }
            }else if(isset($_POST['popular'])){
               $repeat="SELECT postid FROM react WHERE react = '1' Group by postid order by count(postid) desc";
               $run = mysqli_query($conn, $repeat);
               while($res=mysqli_fetch_array($run)){
                   $postid = $res['postid'];
                   $que = mysqli_query($conn, "SELECT * FROM post WHERE id = $postid");
                   while($result = mysqli_fetch_array($que)){
                     echo "<tr>";
                     $category=$result['category'];
                     $date=$result['date'];
                     $text = $result['text'];
                     $image = $result['image'];
                     $id = $result['id'];
                     echo "<td>";
                     echo"<div class='news'";
                     echo"<div class='container'>";
                     echo"<div class='row'>";
                     echo"<div class='col-md-12 margin_top40'>";
                     echo"<div class='row d_flex'>";
                     echo"<div class='col-md-5'>";
                     echo"<div class='news_img'>";
                     echo"<figure><img src='photo/$image'></figure>";
                     echo"</div>";
                     echo"</div>";
                     echo"<div class='col-md-7'>";
                     echo"<div class='hovercolor'>";
                     echo"<a href='postdetail.php?id=$id'>";
                     echo"<div class='news_text'>";
                     echo"<h3>$category</h3>";
                     echo"<span>$date</span> ";
                     echo"<p>$text</p>";
                     echo"</div></a></div>";
                     echo"</div>";
                     echo"</div>";
                     echo"</div>";
                     echo"</div>";
                     echo"</div>";    
                     echo"</div>";
                        echo "</td>";
                        echo "</tr>";} 
                                        
               }
            }else if(isset($_POST['latest'])){
               $que = mysqli_query($conn,"SELECT * FROM post ORDER BY date DESC");
            }else{
               $que = mysqli_query($conn,"SELECT * FROM post");   
            }
        
         while($result = mysqli_fetch_array($que)){
         echo "<tr>";
         $category=$result['category'];
         $date=$result['date'];
         $text = $result['text'];
         $image = $result['image'];
         $id = $result['id'];
         echo "<td>";
         echo"<div class='news'";
         echo"<div class='container'>";
         echo"<div class='row'>";
         echo"<div class='col-md-12 margin_top40'>";
         echo"<div class='row d_flex'>";
         echo"<div class='col-md-5'>";
         echo"<div class='news_img'>";
         echo"<figure><img src='photo/$image'></figure>";
         echo"</div>";
         echo"</div>";
         echo"<div class='col-md-7'>";
         echo"<div class='hovercolor'>";
         echo"<a href='postdetail.php?id=$id'>";
         echo"<div class='news_text'>";
         echo"<h3>$category</h3>";
         echo"<span>$date</span> ";
         echo"<p>$text</p>";
         echo"</div></a></div>";
         echo"</div>";
         echo"</div>";
         echo"</div>";
         echo"</div>";
         echo"</div>";    
         echo"</div>";
            echo "</td>";
            echo "</tr>";} 
      ?>
   </table>
      
      <!-- end news section -->
      
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      
   </body>
</html>

