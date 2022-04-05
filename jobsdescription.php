<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="apply.html">
    <link rel="stylesheet" href="fontawesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title class="text-uppercase">Search Nepal</title>
</head>

<body>
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
            <div class="collapse navbar-collapse" id="na" style="font-size: 2rem;">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html" title="Home" data-toggle="tooltip" data-placement="bottom"
                            class="text-capitalize " active>home</a></li>
                    <li><a href="service.html" title="Services" data-toggle="tooltip" data-placement="bottom"
                            class="text-capitalize">services</a></li>
                    <li><a href="#content" title="Portfolio" data-toggle="tooltip" data-placement="bottom"
                            class="text-capitalize">About Us</a></li>
                    <li><a href="#contact" title="Contact us" data-toggle="tooltip" data-placement="bottom"
                            class="text-capitalize">contact us</a></li>
                    <li><a href="jobs.php" data-toggle="popover" data-placement="popover"
                            class="text-capitalize">Jobs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar-ends -->

    <!-- jobs display -->
    <div class="container">
        <div>
            <?php
                require('connection.php');
                $query = "SELECT * FROM `job`";
                $result = mysqli_query($conn,$query);
                $tot = mysqli_num_rows($result);
            ?>
            <!-- <h4><?php echo $tot ?> of the jobs</h4> -->
            <?php
                    require('connection.php');
                    if(isset($_GET['id'])) {
                    $query = "SELECT * FROM `job`";
                    $result = mysqli_query($conn,$query);
                    $num=mysqli_num_rows($result);
                    while($rows = mysqli_fetch_array($result))
                    {
                        if($_GET['id'] == $rows['id']){
                ?>
            <fieldset style="border: 2px solid grey; padding: 1% 0 2% 3%; margin-top:1%;" class="d-flex">
                <div style="width:80%;float:left;">
                <h2 style="font-weight:bold;"><?php echo $rows['Position']; ?></h2>
                <h3 style="font-weight:bold">
                    <?php echo $rows['CompanyName']; ?>
                </h3>
                <h5 style="color: gray; font-weight:bold;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    Location: <?php echo $rows['CLocation']; ?>
                </h5>
                <p style="color: gray;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    Required number of employee: <?php echo $rows['Requiredno']; ?>
                <p>
                <h5 style="color: gray; font-weight:bold;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    Experience: <?php echo $rows['Experience']; ?>
                <h5>
                <h5 style="color: gray; font-weight:bold;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                    </svg>
                    Salary: <?php echo $rows['Salary']; ?>
                </h5> 
                <h5 style="font-weight:bold;">Qualification:</h5>
                <h6><?php echo $rows['Qualification']; ?></h6>
                <h5 style="font-weight:bold;">Roles</h5>
                <h6><?php echo $rows['Roles']; ?></h6>
                <td></td>
                </div>
                <div style="width:20%;float:right;margin-top: 10%;" >
                    <a href="apply.html"><button type="submit" name="apply" class="btn text-center text-dark" style="width:50%;height:90%;">Apply</button></a>
                </div>
            </fieldset>
                    <?php
                        }}}
                ?>
        </div>
        
    </div>
    <!-- footer -->
    <footer>
        <ul class="social_icon">
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-google"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="service.html">Services</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="jobs.php">Jobs</a></li>
        </ul>
        <p>&copy;2022 Search Nepal | All Rights Reserved </p>
        <p style="font-size: 10px;">Designed By Digify Technology Pvt. Ltd </p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- footer ends -->
    </body>