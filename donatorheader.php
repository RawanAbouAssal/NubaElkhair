<?php
include "datab.php";
include_once "result.php";
session_start();
if (!isset($_SESSION['userid'])) {
    // Redirect to the specific page
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Nuba Elkhair</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
        .sub-header {
            background-color: #f8f9fa;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .sub-header .info {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sub-header .info li {
            display: inline;
            margin-right: 20px;
            color: #333;
        }
        .sub-header .social-links {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: right;
        }
        .sub-header .social-links li {
            display: inline;
            margin-left: 10px;
        }
        .header-area {
            background: #fff;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .header-area .navbar-nav .nav-item .nav-link {
            color: #333;
            padding-left: 20px;
            padding-right: 20px;
        }
        .header-area .nav-item .nav-link:hover {
            color: #f35525;
        }
        .header-area .navbar-nav .nav-item .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border-radius: 5px;
            
        }
        .header-area .navbar-nav .nav-item .logout-btn:hover {
            background-color: #c82333;
        }
        .navbar-brand img {
            max-width: 75px;
            height: auto;
            
        }
    </style>
</head>
<body>

<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="info">
                    <li><i class="fa fa-envelope"></i> nubaelkhair2015@gmail.com</li>
                    <li><i class="fa fa-map"></i> 10 Ebn Sehel Street, Imbabah, Egypt</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="home.php">
                        <img src="assets/images/logo.jpg" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php

                            $res = new result();
                            $result = $res->pageAccess('1');


                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<li class="nav-item"><a class="nav-link" href="donatorcontroller.php?action=' . $row['Friendlyname'] . '">' . $row['Friendlyname'] . '</a></li>';

                                }
                            } else {
                                echo "<li class='nav-item'><a class='nav-link' href='#'>No Pages Available</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item"><a class="nav-link" href="donations.php"><i class="fa fa-calendar"></i> Donate</a></li>
                        <li class="nav-item"><a class="nav-link logout-btn" href="logout.php">Logout</a></li>
                        
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
