<?php
session_start();
include 'connect.php';

$idpaket = $_GET["idpaket"];
$query ="SELECT * FROM tbpaketcuci WHERE idpaket=$idpaket";
$result = mysqli_query($db, $query);


//simpan data
if(isset($_POST['simpan'])){
    $tambahan = $_POST['tambahan'];
    if ($tambahan == 20000) {
        $val = "Fogging";
    }
    elseif ($tambahan == 10000) {
        $val = "wax";
    }
    else{
        $val = "-";
    }
    $tambahan = $val;
    $tgltransaksi = $_POST['tgltransaksi'];
    $iduser = $_SESSION['iduser'];
    $idpaketcuci = $_POST['idpaketcuci'];
    $totalharga = $_POST['totalharga'];
    $pembayaran = $_POST['uang'];
    $kembalian = $_POST['kembalian'];

    /*var_dump($tambahan);
    var_dump($tgltransaksi);
    var_dump($iduser);
    var_dump($idpaketcuci);
    var_dump($totalharga);
    var_dump($pembayaran);
    var_dump($kembalian);*/

    $query = "INSERT INTO tbtransaksi (idtransaksi, tgltransaksi, iduser, idpaketcuci, namapakettambahan, totalharga, pembayaran, kembalian)VALUES(NULL,'$tgltransaksi', '$iduser', '$idpaketcuci', '$tambahan' ,'$totalharga', '$pembayaran' ,'$kembalian')";
					
	echo"
	<script>
          alert('Data berhasil di Simpan');
          document.location.href = 'home.php';
          </script>";
	mysqli_query($db, $query);


}
?>

<!---------------------------------------------------------------------------------->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Transaksi</title>
  </head>




<!----------------------------------------------------------------------------------->
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
        <div class="container py-5">
            <div class="row">
                <!--------------------------input text------------------------------>
                <div class="col-5">
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Id pelanggan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="number" name="iduser" id="iduser" value="<?php echo $_SESSION['iduser']?>" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Tanggal transaksi</span>
                        <input type="date" name="tgltransaksi" id="tgltransaksi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <?php foreach ($result as $paket) : ?>
                        <span class="input-group-text" id="inputGroup-sizing-default">Nama paket cuci</span>
                        <input type="text" readonly name="namapaketcuci" id="namapaketcuci" value="<?php echo $paket['namapaket'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input type="hidden" readonly name="idpaketcuci" id="idpaketcuci" value="<?php echo $paket['idpaket'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Harga paket cuci</span>
                        <input type="text" readonly name="harga" id="harga" value="<?php echo $paket['harga'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <?php endforeach?>
                    </div>
                <!---------------------RADIO BUTTON-------------------------->
                    <div class="form-check">
                                <div class="form-group">
                                    <input type="radio" name="tambahan" id="tidakada" value="0"> Tidak ada tambahan
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="tambahan" id="wax" value="10000"> wax RP 10.000
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="tambahan" id="fogging" value="20000" class="mb-5"> Fogging RP 20.000
                                </div>
                        <!------------------button TOTAL--------------------------------->
                        <a class="btn btn-primary" type="submit" name="btnTotal" id="btnTotal">Hitung Total Harga</a>
                    </div>
                </div>
                <div class="col-5 offset-1">
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Total</span>
                        <input type="number" class="form-control" name="totalharga" id="total_harga" aria-describedby="emailHelp" placeholder="Masukkan Total Harga" required  value="" readonly/>
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Uang bayar</span>
                        <input type="number" name="uang" id="uang" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" id="inputGroup-sizing-default">Kembalian</span>
                        <input type="number" readonly name="kembalian" id="kembalian" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <!------------------button KEMBALIAN--------------------------------->
                    <a class="btn btn-primary" type="" name="btnKembalian" id="btnKembalian">Hitung kembalian</a>
                    <!------------------button SIMPAN--------------------------------->
                    <input class="btn btn-primary" type="submit" name="simpan" id="">
                </div>
            </div>
        </div>
    </form>



<!---------------------------JavaScript---------------------------------------------->    
            <!-- jQuery -->
            <script src="jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

            <!-- jQuery end -->
            
            
            <script type="text/javascript">
                // panggil tombol yang memakai id "total lalu jalankan function total"
                document.getElementById('btnTotal').addEventListener("click", total)
                // panggil tombol yang memakai id "tombol_kembalian lalu jalankan function total"
                document.getElementById('btnKembalian').addEventListener("click", kembalian)

                function total(){
                    var hargaPaket = document.getElementById('harga').value;
                    var hargaTambahanWax = document.getElementById('wax').value;
                    var tidakAdaHargaTambahan = document.getElementById('tidakada').value;
                    var hargaTambahanFogging = document.getElementById('fogging').value;
                    if ($("input[id='wax']:checked").val() != null ) {
                        var grand_total = Number(hargaPaket) + Number(hargaTambahanWax);
                    } else if ($("input[id='fogging']:checked").val() != null ) {
                        var grand_total = Number(hargaPaket) + Number(hargaTambahanFogging);
                    } else{
                        var grand_total = Number(hargaPaket) + Number(tidakAdaHargaTambahan);
                    }   
                    var hasil = document.getElementById('total_harga').value = grand_total;
                    document.getElementById("total_harga").innerHTML=hasil;
                }

                function kembalian(){
                    var totalHarga = document.getElementById('total_harga').value;
                    var uang = document.getElementById('uang').value;
                    var kembalian = Number(uang) - Number(totalHarga);
                    var hasilKembalian = document.getElementById('kembalian').value = kembalian;
                    document.getElementById("kembalian").innerHTML=hasilKembalian;
                }

                function onlyNumberKey(event) {
                    // Only ASCII character in that range allowed
                    var ASCIICode = (event.which) ? event.which : event.keyCode
                    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                        return false;
                    return true;
                }
            </script>
<!----------------------------------------------------------------------------------->






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
