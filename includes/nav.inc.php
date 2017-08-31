<?php 
    require 'db/dbconnection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/register.css">
        <link rel="stylesheet" href="assets/css/profile.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    </head>
    <body>
        <div class="main-nav-wrapper">
            <nav class="main-nav container" id="myTopnav">
                <a class="main-nav--logo" href="index.php">Blog.com</a>
                <ul class="main-nav--menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="main-nav--login">
                <?php if (!isset($_SESSION['logged_in'])) { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul> <?php } else { ?>
                    <li><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>
            </nav>
        </div>