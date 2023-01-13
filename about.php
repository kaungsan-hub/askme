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
      <title>About</title>
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
                  </div>
               </div>
            </div>
         </div>
</form>         
<!-- 1 section -->
<div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>About</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section -->
      <div class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="about_text">
                  <h3>QUESTION & ANSWER SYSTEM  </h3>
                     <i><p>Easy to know the problems and solutions</p></i>
                     <p> The web application is the question and answer system. In ordinary process of this system, we are need to say problem to another person. I want to replace with computerized process so, I implemented a web application. PHP and MySQL are use to develop this website.</p>   
                  <a class="read_more" href="home.php">Go Home</a>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="images/questionmark.png"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about section -->
      <!--  footer -->
      <footer>  
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2022 Develop By Kaung San </p>
                     </div>
                  </div>
               </div>
            </div>
      </footer>
      
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

