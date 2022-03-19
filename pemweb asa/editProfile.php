<?php 
 
session_start();
include 'connect.php';
if(isset($_POST['edit'])) {
    $iduser=$_SESSION['iduser'];
    $username=$_POST['username'];
    
    $query = "UPDATE tbuser SET username= '$username' WHERE iduser =$iduser";
    mysqli_query($db, $query);
    echo"
    <script>
         alert('Data berhasil di Simpan');
         document.location.href = 'home.php';
         </script>";
}?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>profile</title>
  </head>
  <body>
    <!------------------navbar---------------------------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand text-primary">SKENDA Carwash</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            </li>
          </ul>
          <form class="d-flex">
            <a class="nav-link active" aria-current="page" href="logout.php">LogOut</a>
            <a class="nav-link active" aria-current="page" href="listTransaksi.php">Transaksi</a>
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            <a class="nav-link active" aria-current="page" href="editProfile.php">Edit Profile</a>
          </form>
        </div>
      </div>
    </nav>`

  <!-----------------end of navbar---------------------------------------------------->
    <form method="post" action="">
    <div class="container text-center py-5">
        <div class="posistion-relative">
      <div class="position-absolute top-50 start-50 translate-middle">
        <div class="container-fluid text-center">
          <div class="card" style="padding:20px;">
            <h1 class="display-6" style="padding-bottom: 30px;">Edit Profile</h1>
            <div class="input-group mb-3 py-1">
              <input type="text" name="username" class="form-control text-center" style="padding-left: 80px; padding-right: 80px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Username" required>
            </div>
            
            <input type="submit" name="edit" class="btn btn-success" style="padding-left: 80px; padding-right: 80px;" placeholder="login">
            <?php if (isset($berhasil)) : ?>
                <p class="text-danger fst-italic mt-4 text-center">Data berhasil diubah</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>