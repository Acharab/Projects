<?php
include "database.php";
session_start();
if (isset($_SESSION['naam'])) {
    header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
    $naam = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM Login WHERE user='$naam'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows  > 0) {

        $sql = "INSERT INTO Login (user, password)
            VALUES('$naam', '$pass')";
        $result = mysqli_query($conn, $sql);
        var_dump($sql);
        if ($result) {
            echo "<script>alert('Gebruiker aangemaakt')</script>";
            $naam = "";
            $pass = "";
            header('Location: login.php');
        } else {
            echo "<script>alert('Er is iets fout gegaan')</script>";
        }
    } else {
        echo "<script>alert('Gebruiker bestaat al!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="../css/animate.css" />
    <link rel="stylesheet" href="../css/tiny-slider.css" />
    <link rel="stylesheet" href="../css/glightbox.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
</head>

<body>
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">

                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="../images/logo/logo.svg" alt="Logo" />
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="../../index.html" class="active" aria-label="Toggle navigation">Home</a>
                                    </li>

                                    </li>

                                    <li class="nav-item">
                                        <a href="../../about-us.html" aria-label="Toggle navigation">About Us</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="../../contact.html" aria-label="Toggle navigation">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar collapse -->
                            <div class="button">
                                <a href="login.php" class="btn">Get Tickets<i class="lni lni-ticket"></i></a>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="hero-area hero-contact" style="height: 100vh;">
        <div class="main__circle"></div>
        <div class="main__circle2"></div>
        <div class="main__circle3"></div>
        <div class="main__circle4"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <div class="hero-content contact-hero">
                        <div class="container-contact">
                            <div class="form">
                                <h2>Register</h2>
                                <form method="post">
                                    <div class=" inputBx">
                                        <input type="text" name="username" required placeholder="Username">
                                    </div>
                                    <div class="inputBx">
                                        <input type="password" name="password" required placeholder="Password">
                                    </div>
                                    <div class="inputBx">
                                        <input type="submit" name="submit" value="Register">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/tiny-slider.js"></script>
    <script src="../js/glightbox.min.js"></script>
    <script src="../js/count-up.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>