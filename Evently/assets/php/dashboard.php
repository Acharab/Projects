<?php
include 'database.php';
session_start();
if (!isset($_SESSION['naam'])) {
    header("Location: ../../index.html");
}
$ticket = $_GET["ticket"];
if ($ticket != "") {
    header("Location: reservation.php?ticket=" . $ticket . "");
}
$sql = "SELECT * FROM reservation where name='" . $_SESSION['naam'] . "'";



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
    <title>dashboard</title>
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
                                        <a href="#" class="active" aria-label="Toggle navigation">Dashboard</a>
                                    </li>

                                    </li>

                                    <li class="nav-item">
                                        <a href="reservation.php" aria-label="Toggle navigation">Tickets</a>
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
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="main__circle"></div>
        <div class="main__circle2"></div>
        <div class="main__circle3"></div>
        <div class="main__circle4"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <div class="hero-content">
                        <div class="centerd-text">
                            <h2>
                                Your Reservations
                            </h2>
                        </div>
                        <?php
                        if ($result = $conn->query($sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered grocery-crud-table table-hover'>";
                                echo "<tr>";
                                echo "<th>Name</th>";
                                echo "<th>Date</th>";
                                echo "<th>Ticket</th>";
                                echo "<th>Amount</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["date"] . "</td>";
                                    echo "<td>" . $row["ticket"] . "</td>";
                                    echo "<td>" . $row["amount"] . "</td>";
                                    echo "<td>
                                    <a class='btn btn-default btn-outline-warning' href='update.php?id=" . $row["id"] . "'>Update</a>
                                    <a class='btn btn-default btn-outline-danger' href='deleteconfirm.php?id=" . $row["id"] . "'>Delete</a>
                                    </td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "No records matching your query were found.";
                            }
                        }

                        ?>
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