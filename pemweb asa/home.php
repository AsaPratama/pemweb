<!--session-->
<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>

<!--query ambil data paket cuci-->
<?php
include 'connect.php';
$query = "SELECT * FROM tbpaketcuci";
$result = mysqli_query($db, $query);
?>
<!------------------------------------------------------------------------------------------------------------>


<!--html-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>
    <!-- Navbar -->
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
            <a class="nav-link active" aria-current="page" href="editProfile.php">Edit Profile</a>
          </form>
        </div>
      </div>
    </nav>
    <!--end of navbar-->


<!---------------------------------------------------------------------------------------------------->    
  <form action="" method="POST" class="login-email">
    <div class="container-fluid">
      <div class="row">
        <img src="cuci.png" style="border-radius:15px;" class="d-block w-100 img-fluid" alt="...">
      </div>
      <div class="container-fluid py-3">
          <h4 class="py-5">Daftar paket pencucian mobil</h4>
            <div class="row mb-5">
              <?php foreach ($result as $paket) : ?>
                <div class="col-3">
                  <h5 class="card-title"><?= $paket['idpaket'] ?></h5>
                  <h5 class="card-title"><?= $paket['namapaket'] ?></h5>
                  <p class="card-text"><?= $paket['deskripsi'] ?></p>                
                  <b><p class="card-text"><?= $paket['harga'] ?></p></b>
                  <a href="transaksi.php?idpaket=<?= $paket['idpaket']; ?> & namapaket=<?= $paket['namapaket']; ?> & harga=<?= $paket['harga']; ?>" class="btn btn-success shadow">Pesan</a>
                </div>
              <?php endforeach?>
            </div>
      </div>
    </div>
  </form>
<!------------------------------------------------------------------------------------------------------------------>


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

