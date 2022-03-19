<?php 
 
session_start();
 
 
?>

<?php

include 'connect.php';
    $idtransaksi =$_GET['idtransaksi'];
    $query = "DELETE FROM `tbtransaksi` WHERE idtransaksi='$idtransaksi'";
    echo"
    <script>
          alert('Data berhasil di Hapus');
          document.location.href = 'listTransaksi.php';
          </script>";
	mysqli_query($db, $query);