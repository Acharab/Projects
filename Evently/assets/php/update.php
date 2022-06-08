<?php
include 'database.php';

session_start();
if (!isset($_SESSION['naam'])) {
    header("Location: ../../index.html");
}
$id = $_GET["id"];
$name = $_POST['name'];
$date = $_POST['date'];
$ticket = $_POST['ticket'];
$amount = $_POST['amount'];
if (isset($_POST['submit'])) {
    $sql = "UPDATE `reservation` SET `name`='$name',`date`='$date',`ticket`='$ticket',`amount`='$amount' WHERE `id`=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Gegevens geupdate')</script>";
        header('Location: dashboard.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="../css/animate.css" />
    <link rel="stylesheet" href="../css/tiny-slider.css" />
    <link rel="stylesheet" href="../css/glightbox.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Reservation</title>
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
                                        <a href="dashboard.php" class="active" aria-label="Toggle navigation">Dashboard</a>
                                    </li>

                                    </li>

                                    <li class="nav-item">
                                        <a href="#" aria-label="Toggle navigation">Tickets</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="../../contact.html" aria-label="Toggle navigation">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar collapse -->
                            <div class="button">
                                <a href="logout.php" class="btn">Logout<i class="lni lni-ticket"></i></a>
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
                                <h2>Reservation</h2>
                                <form method="post">
                                    <div class="inputBx">
                                        <input type="text" name="name" required readonly placeholder="Name" value="<?php echo $_SESSION['naam'] ?>">
                                    </div>
                                    <div class="inputBx">
                                        <input type="date" min="2023-06-14" max="2023-06-18" name="date" required placeholder="Date">
                                    </div>
                                    <div class="inputBx">
                                        <select name="ticket">
                                            <?php
                                            if ($setTicket == "regular") {
                                            ?>
                                                <option selected>Regular</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option>Regular</option>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($setTicket == "exclusive") {
                                            ?>
                                                <option selected>Exclusive</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option>Exclusive</option>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($setTicket == "premium") {
                                            ?>
                                                <option selected>Premium</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option>Premium

                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="inputBx">
                                        <input type="number" min="0" max="15" name="amount" required placeholder="How Many Persons?">
                                    </div>
                                    <div class="inputBx">
                                        <input type="submit" name="submit" value="Book now">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="../js/bootstrap.min.js"></script>
    <script src="a..ssets/js/wow.min.js"></script>
    <script src="../js/tiny-slider.js"></script>
    <script src="../js/glightbox.min.js"></script>
    <script src="../js/count-up.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>