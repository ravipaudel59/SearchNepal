<?php
    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header('Location: admin.php');
    }
    if(isset($_POST["upload"])){
        require('connection.php');

        $position = $_POST["position"];
        $requiredno = $_POST["requiredno"];
        $companyname = $_POST["companyname"];
        $location = $_POST["location"];
        $experience = $_POST["experience"];
        $qualification = $_POST["qualification"];
        $roles = $_POST["roles"];
        $salary = $_POST["salary"];

        $sql = "INSERT INTO job(Position, Requiredno, CompanyName, CLocation, Experience, Qualification, Roles, Salary) 
        values('$position', '$requiredno', '$companyname', '$location', '$experience', '$qualification', '$roles', '$salary')";
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        header('Location: jobs.php');
    }
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
                            <li class="list-unstyled"><a href="adminpanel.php" style="color:white">Registered Data</a></li>&nbsp
                            <li class="list-unstyled"><a href="managejobs.php" style="color:white">Manage Jobs</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col col-sm-12 col-md-8 col-lg-9">
                    <h2>Manage Jobs</h2>
                    <form method="POST">
                        <fieldset style="border: 2px solid grey; padding: 1% 0 2% 3%"><br>
                            <div class="form-group row">
                                <label class="col-sm-3">Position</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="position">
                                </div>
                            </div>
                            <!-- required number -->
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Required Number</label>
                                
                                <div class="col-sm-4">
                                    <input type="number" class="form-control mb-2 mr-sm-2" name="requiredno" id="requiredno" >
                                </div>
                            </div>

                            <!-- Company Name -->
                            <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Company Name</label>
                            
                            <div class="col-sm-4">
                                <input type="text" name="companyname" class="form-control mb-2 mr-sm-2">             
                            </div>
                            </div> 
                            <!-- Location -->
                            <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Location</label>
                            
                            <div class="col-sm-4">
                                <input type="text" name="location" class="form-control mb-2 mr-sm-2">               
                            </div>
                            </div>       

                            <!-- Salary -->
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Salary</label>
                            <div class="col-sm-4">
                                <input type="number" name="salary" class="form-control mb-2 mr-sm-2" id="salary" placeholder="in Rs.">
                            </div>
                            </div>

                            <!-- Experience -->
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Experience</label>
                                <div class="col-sm-4">
                                <input type="text" name="experience" class="form-control mb-2 mr-sm-2" 
                                id="experience" >                 
                                </div>
                            </div>
                            
                            <!-- Qualification -->
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Qualification</label>
                            <div class="col-sm-4">
                                <input type="text" name="qualification" class="form-control mb-2 mr-sm-2" id="qualification">
                            </div>
                            </div>

                            <!-- Roles -->
                            <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Roles</label>
                            
                            <div class="col-sm-4">
                                <input type="text" name="roles" size="50" class="form-control mb-2 mr-sm-2"> 
                                             
                            </div>
                            </div>
                        </label>
                    </fieldset> <br>  
        
                    <!--for buttons-->
                    <div class="d-flex flex-row container mt-2 mb-2 justify-content-between justify-items-center" style="max-width:300px;">
                        <div class="d-grid d-flex-column mx-auto">
                            <button type="submit" name="upload" class="btn btn-primary" href="jobs.html">UPLOAD</button>
                        </div>
                    </div>  
                </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST["Logout"]))
        {
            session_destroy();
            header('Location: admin.php');
        }
    ?>
</body>
</html>