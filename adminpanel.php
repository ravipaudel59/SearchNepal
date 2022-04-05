<?php
    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header('Location: admin.php');
    }
    require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="apply/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="apply.html"> -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
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
                        
                        <li>
                            <form method="POST">
                            <a><button type="submit" name="Logout" class="btn text-center text-dark">Log out</button></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar ends -->
    <div>
        <div class="container"> 
            <div class="row">
                <div class="col col-sm-12 col-md-4 col-lg-3 bg-primary text-white">
                    <aside>
                        <ul class="h3">
                            <li class="list-unstyled"><a href="#" style="color:white">Registered Data</a></li>&nbsp
                            <li class="list-unstyled"><a href="managejobs.php" style="color:white">Manage Jobs</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col col-sm-12 col-md-8 col-lg-9">
                    <h2>Registered Data</h2>
                    <div style="overflow:auto">
                        <table class="table table-stripped table-hover w-100">
                            <thead>
                                <tr class="h4 text-center">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact no </th>
                                    <th>Position</th>
                                    <th>File uploaded</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `form`";
                                    $result = mysqli_query($conn,$query);
                                    $num=mysqli_num_rows($result);
                                    while($rows = mysqli_fetch_array($result))
                                    {
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $rows['fullname']; ?></td>
                                    <td><?php echo $rows['email']; ?></td>
                                    <td><?php echo $rows['contact']; ?></td>
                                    <td><?php echo $rows['position']; ?></td>
                                    <td><a href="download.php?id=<?php echo $rows['id'] ?>"><button type="submit" name="Logout" class="btn text-center text-dark">Download</button></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST["Logout"]))
        {
            session_destroy();
            header('Location: admin.html');
        }
    ?>
</body>
</html>