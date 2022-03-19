<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>


<?php
include 'connect.php';
$query = "SELECT * FROM tbtransaksi";
$result = mysqli_query($db, $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>List Transaksi</title>
  </head>
  <body>
<form action="" method="post">
    <!--table-->
    <div class="container py-5">
        <table class="table">
            <thead>
            <?php foreach ($result as $trt) : ?>
            <tr>
              <th scope="col">idTransaksi</th>
              <th scope="col">tanggal</th>
              <th scope="col">user</th>
              <th scope="col">paket cuci</th>
              <th scope="col">paket tambahan</th>
              <th scope="col">total harga</th>
              <th scope="col">pembayaran</th>
              <th scope="col">kembalian</th>
              <th scope="col">opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
              
                  <td><?= $trt['idtransaksi'] ?></td>
                  <td><?= $trt['tgltransaksi'] ?></td>
                  <td><?= $trt['iduser'] ?></td>
                  <td><?= $trt['idpaketcuci'] ?></td>
                  <td><?= $trt['namapakettambahan'] ?></td>
                  <td><?= $trt['totalharga'] ?></td>
                  <td><?= $trt['pembayaran'] ?></td>
                  <td><?= $trt['kembalian'] ?></td>
                  <td>  <a href="hapus.php?idtransaksi=<?= $trt['idtransaksi']; ?>" class="btn btn-danger shadow bi bi-trash-fill" onclick="return confirm('apakah yakin akan dihapus?')">Hapus</a></td>
              <?php endforeach?>
        </tbody>
      </table>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </form>
  </body>
</html>