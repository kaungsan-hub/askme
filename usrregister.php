
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Register</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body class="main-layout footer_to90 contact_page">
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <header>

      </header>
      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Register</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="contact" class="contact">
         <div class="con_bg">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <form id="request" class="main_form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Name" type="text" name="usrname"> 
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Email" type="email" name="usremail">                          
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Password" type="password" name="usrpass">                          
                           </div>
                           <div>
                              <p>Add photo </p>
                              <input type="file" name="usrimg">
                           </div>
                           <div class="col-md-12">
                             <input type="submit" name="submit" class="send_btn" value="Register">
                           </div>
                           <p><a href="usrlogin.php">I have already account</a></p>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

 <?php 
    $conn = mysqli_connect('localhost', 'root', '', 'askme');
    if(isset($_POST['submit'])){
      $usrname=$_POST['usrname'];
      $usremail=$_POST['usremail'];
      $usrpass=$_POST['usrpass'];
      $img=$_FILES['usrimg']['name'];
    $emailcheck="SELECT * FROM user WHERE email='$usremail'";
    $run=mysqli_query($conn, $emailcheck);
    if(mysqli_num_rows($run)>0){
      echo "<script>alert('Email is already exists')</script>";
      exit();
    }else{    
      move_uploaded_file($_FILES['usrimg']['tmp_name'],'photo/'.$img);
      $i="INSERT INTO `user`(`name`, `email`, `password`, `image`) VALUES ('$usrname','$usremail','$usrpass','$img')";
      if(mysqli_query($conn,$i))
        echo "<script>alert('Successful Register')</script>";
        echo "<script>location= 'usrlogin.php'</script>";
      }}
  ?>

      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>     
   </body>
</html>

