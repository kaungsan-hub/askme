
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
      <title>Profile</title>
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

      <header> 
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
<!-- 1 section --> 
      </header>
    <body>
    <?php
  $id=$_SESSION['id'];
   $conn = mysqli_connect('localhost', 'root', '', 'askme');     
   $que = mysqli_query($conn,"SELECT * FROM user WHERE id = '$id'");    
   $row=mysqli_fetch_array($que);
   $n=$row['name'];
   $img= $row['image'];  
?>
<table calss="table">
  <tr>
    <th><?php echo "<img src='photo/$img' width='60' height='60' style='border-radius:60%; margin: 20px;' >";?></th>
    <th>
      <nav class="nav" style="align:center;">
        <?php echo "<h5><i>Welcome : $n</i></h5>"; ?>   
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a class='nav-link' href='follow.php?usrid=$usrid'>Followers and Following</a></b>
        
      </nav>
    </th>
  </tr>
</table><hr>

<div class="container px-4 text-center">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light">
       <p>Own Posts</p>
         <?php 
         $showpost="SELECT * FROM  post WHERE userid='$id'";
         $run = mysqli_query($conn, $showpost);
         while($r = mysqli_fetch_array($run)){
            $post_id=$r['id'];
            $text=$r['text'];
            $image=$r['image'];
            echo "<div class='card' style='margin: 15px auto; width:50%; padding: 8px;'>";
            echo "<img src='photo/$image' style='float: left; width: 100px; height: 70px; padding: 0 10px 0 0;'>";   
            echo "<div style='text-align: justify;'>";
            echo $text;
            echo "</div>";
            echo "<a href='postdelete.php?post_id=$post_id'><button><i class='fa fa-trash-o' style='font-size:24px;color:red'></i></button></a>";
            echo "</div>";    
            }
         ?>
     </div>
    </div>

    <div class="col">
      <div class="p-3 border bg-light">
        <p>Share Posts</p>
        <?php 
        $sharepost="SELECT * FROM  share WHERE userid='$id'";
        $run = mysqli_query($conn, $sharepost);
          while($r = mysqli_fetch_array($run)){
            $postid=$r['postid'];
            $runtwo=mysqli_query($conn, "SELECT * FROM  post WHERE id='$postid'");
            while($rtwo=mysqli_fetch_array($runtwo)){
                $image=$rtwo['image'];
                $text=$rtwo['text'];
            echo "<div class='card' style='margin: 15px auto; width:50%; padding: 8px;'>";
            echo "<img src='photo/$image' style='float: left; width: 100px; height: 70px; padding: 0 10px 0 0;'>";
            echo "<div style='text-align: justify;'>";
            echo $text;
            echo "</div>";
            echo "<a href='postdelete.php?share_post_id=$postid'><button><i class='fa fa-trash-o' style='font-size:24px;color:red'></i></button></a>";
            echo "</div>";
            }
            }
        ?>
      </div>
    </div>

  </div>
</div>

</body> 
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>