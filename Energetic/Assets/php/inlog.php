<?php
    include "connect.php";
    session_start();
    if (isset($_SESSION['naam'])){
        header("Location: dashboard.php");
    }
    if (isset($_POST['submit'])) {
        $naam = $_POST['naam'];
        $pass = $_POST['wachtwoord'];
        $sql = "SELECT * FROM Inlog WHERE naam='$naam' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            header("Location: dashboard.php");
            $_SESSION['naam'] = $row['naam'];
        }else{
            echo "<script>alert('Verkeerde naam of wachtwoord')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>inlog</title>
</head>
<body class="img-container">
    <header>
            <nav>
                <h2>Energetic</h2>
                <div class="openMenu"><i class="fa fa-bars"></i></div>
                    <ul class="mainMenu">
                        <li><a href="../../index.html">Home</a></li>
                        <li><a href="../../contact.html">Contact</a></li>
                        <div class="closeMenu"><i class="fa fa-times"></i></div>
                    </ul>
            </nav>
      </header>
      <main>
        <section class="vh-100 bg-image register-form">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
              <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                      <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">inloggen</h2>
          
                        <form action="#" method="post">
          
                          <div class="form-outline mb-4">
                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="naam" required />
                            <label class="form-label" for="form3Example1cg">Naam</label>
                          </div>
          
                          <div class="form-outline mb-4">
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="wachtwoord" required/>
                            <label class="form-label" for="form3Example4cg">Wachtwoord</label>
                          </div>
                          </div>
                          <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn  btn-block btn-lg gradient-custom-4 text-body register-btn">login</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </main>
</body>
</html>
