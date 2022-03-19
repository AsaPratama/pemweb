<?php 
include 'connect.php';
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = "SELECT * FROM tbuser WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['iduser'] = $row['iduser'];
        $_SESSION['username'] = $row['username'];
        header("Location: home.php");
    } else {
        $error=true;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
      <!-- Login form -->
    <form method="post" action="">
      <div class="posistion-relative">
        <div class="position-absolute top-50 start-50 translate-middle">
          <div class="container-fluid text-center">
            <div class="card" style="padding:20px;">
              <h1 class="display-6" style="padding-bottom: 30px;">Login</h1>
              <div class="input-group mb-3 py-1">
                <input type="text" name="username" class="form-control text-center" style="padding-left: 80px; padding-right: 80px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Username" required>
              </div>
              <div class="input-group mb-3 py-1">
                <input type="password" name="password" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Password" required>
              </div>
              <button type="submit" name="login" class="btn btn-success" style="padding-left: 80px; padding-right: 80px;" placeholder="login">Login</button>
              <?php if (isset($error)) : ?>
                  <p class="text-danger fst-italic mt-4 text-center">username atau password yang anda masukkan salah</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End of login form -->

    <!-- Optional JavaScript choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>