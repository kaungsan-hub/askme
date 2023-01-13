<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Login</title>
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
                     <h2>Login as Admin</h2>
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
                              <input class="contactus" placeholder="Name" type="text" name="a_name">                          
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Email" type="email" name="a_email">                          
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Password" type="password" name="a_password">                          
                           </div>
                           <div class="col-md-12">
                             <input type="submit" name="submit" class="send_btn" value="Login">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php
        session_start();
          if(isset($_POST['submit'])){
            $a_name=$_POST['a_name'];
            $a_email=$_POST['a_email'];
            $a_password=$_POST['a_password'];
            $conn = mysqli_connect('localhost', 'root', '', 'askme');
            $result=mysqli_query($conn, "SELECT * FROM admin WHERE a_email='$a_email' AND a_password='$a_password'");
            if(mysqli_num_rows($result)>0){
              $f=mysqli_fetch_assoc($result);
              $_SESSION['a_email']=$f['a_email'];
              echo "<script>alert('Successful Login')</script>";
              echo "<script>location= 'admin.php'</script>";

            }else{
              echo "<script>alert('User name or Password is wrong')</script>";
            }
          }
      ?>

      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>     
   </body>
</html>

