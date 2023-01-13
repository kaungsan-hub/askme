<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header  ('location:usrlogin.php');
  }
?> 

<!DOCTYPE html>
    <html lang="en">
       <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="viewport" content="initial-scale=1, maximum-scale=1">
          <title>Update</title>
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
                         <h2>Update</h2>
                      </div>
                   </div>
                </div>
             </div>
          </div>
<?php
    $usrid=$_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'askme');
    $res=mysqli_query($conn, "SELECT * FROM user WHERE  id='$usrid'");
    $row=mysqli_fetch_array($res);
    $name=$row['name'];
    $email=$row['email'];
    $password=$row['password'];
    $image=$row['image'];

    if(isset($_POST['submit'])){
        $usrname=$_POST['usrname'];
        $usremail=$_POST['usremail'];
        $usrpass=$_POST['usrpass'];
        $img=$_FILES['usrimg']['name'];  
        move_uploaded_file($_FILES['usrimg']['tmp_name'],'photo/'.$img);
        $i="UPDATE user SET name='$usrname', email='$usremail', password='$usrpass', image='$img' WHERE id=$usrid";
        if(mysqli_query($conn,$i))
          echo "<script>alert('Successful Update')</script>";
          echo "<script>location= 'usrlogin.php'</script>";
        }

?>   
          <div id="contact" class="contact">
             <div class="con_bg">
                <div class="container">
                   <div class="row">
                      <div class="col-md-10 offset-md-1">
                         <form id="request" class="main_form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                               <div class="col-md-6 col-sm-6">
                                  <input class="contactus" value="<?=$name?>" type="text" name="usrname"> 
                               </div>
                               <div class="col-md-6 col-sm-6">
                                  <input class="contactus" value="<?=$email?>" type="email" name="usremail">                          
                               </div>
                               <div class="col-md-6 col-sm-6">
                                  <input class="contactus" value="<?=$password?>" type="password" name="usrpass">                          
                               </div>
                               <div>
                                  <p>Add photo </p>
                                  <input type="file" name="usrimg" value="<?=$image?>">
                               </div>
                               <div class="col-md-12">
                                 <input type="submit" name="submit" class="send_btn" value="Update">
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
          </div>
    
          <script src="js/jquery.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.0.0.min.js"></script>
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
          <script src="js/custom.js"></script>     
       </body>
    </html>
    
    