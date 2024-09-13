<?php 	
include '../koneksi.php';

session_start();
if (!isset($_SESSION['id_petugas'])) {
    header("Location: ../petugas/login/login.php");
}

 $data    = mysqli_query($conn,"SELECT * FROM petugas WHERE id_petugas='$_SESSION[id_petugas]'");
 $tampil  = mysqli_fetch_array($data);


 ?>	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">
	<h2>Pengaduan Masyarakat</h2>
	<h3>Selamat Datang! <?=$tampil['nama_petugas']?></h3>

	</div>
		<div class="group">	
			<div class="">
					<a href="laporan/laporan.php" class=""><button class="btn1">Verifikasi Pengaduan</button></a>
			</div>

			<div class="">
					<a href="laporan/laporan2.php" class=""><button class="btn2">Generate Laporan</button></a>
			</div>

			<div class="">
					<a href="daftar/daftar.php" class=""><button class="btn3">Tambah Petugas</button></a>
			</div>
		</div>
		<div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
     </div>
</body>
</html>
