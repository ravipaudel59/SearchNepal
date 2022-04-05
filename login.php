<?php
   require('connection.php');
   if(isset($_POST['Signin'])) {
      $AdminName=$_POST["AdminName"];
      $AdminPassword=$_POST["AdminPassword"];
      $query = "SELECT * FROM `admin_login` WHERE Admin_Name='$AdminName' AND Admin_Password='$AdminPassword'";
      $result = mysqli_query($conn,$query);
      if(mysqli_num_rows($result)==1)
      {
         session_start();
         $_SESSION['AdminLoginId']=$_POST['AdminName'];
         header('Location: adminpanel.php');
      }
      else
      {
         echo"<script>alert('Incorrect Admin Name or Password');</script>";
         header('Location: admin.html');
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin Login</title>

        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="apply/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <!-- <link rel="stylesheet" href="apply.html"> -->
        <link rel="stylesheet" href="fontawesome.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title class="text-uppercase">Search Nepal</title>
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#na">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </button>
                    <a href="" class="navbar-brand navbars" style="height: auto;">
                        <img src="image/logo1.png" width="100%" style="max-width: 50px;">
                    </a>
                    <img src="image/cropped-Search-Nepal.jpg" width="100%" style="max-width: 100px; margin-top: 25px;">
                </div>
                <div class="collapse navbar-collapse" id="na">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html" title="Home" data-toggle="tooltip" data-placement="bottom"
                                class="text-capitalize">home</a></li>
                        <li><a href="service.html" title="Services" data-toggle="tooltip" data-placement="bottom"
                                class="text-capitalize">services</a></li>
                        <li><a href="#" title="Portfolio" data-toggle="tooltip" data-placement="bottom"
                                class="text-capitalize">About Us</a></li>
                        <li><a href="#contact" title="Contact us" data-toggle="tooltip" data-placement="bottom"
                                class="text-capitalize">contact us</a></li>
                        <li><a href="jobs.html" data-toggle="popover" data-placement="popover"
                                class="text-capitalize">Jobs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar ends -->

        <!-- login -->
        <div style="text-align: center;">
            <main class="mt-3 pt-2"><br>
                <div class="row  mt-5 m-2 pt-3  justify-content-center justify-item-center" style="display:inline-block;">
                    <div class="col-md-5" style="width:450px;">
                        <div class="card bg-warning m-5"><br>
                            <h3 class="card-header text-center">Admin Login</h3><br><br>
                            <div class="card-body"> 
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <input type="text" name="AdminName" placeholder="Admin Name" id="name" class="form-control" required autofocus>
                                    </div>
                
                                    <div class="form-group mb-3">
                                        <input type="password" name="AdminPassword" placeholder="Password" id="password" class="form-control" required>
                                    </div>
                                    <center><a><button type="submit" name="Signin" class="btn text-center text-dark">Sign in</button></a></center><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>