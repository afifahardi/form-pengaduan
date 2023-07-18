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

	<!-- NAVBAR -->
	<div class="hero">
		<nav>
			<h2 class="logo"><a href="index.php">Pengaduan Masyarakat</a></h2>
			
			<button type="button"><a href="logout.php">Logout</a></button>
		</nav>
	</div>
	<!-- ----------- -->

	<div class="judul">
	<h3>Selamat Datang <?=$tampil['level']?>!</h3>
	<div class="des">
		Data Admin:<br><br>
		Username : <?=$tampil['username']?><br>
		Id Petugas : <?=$tampil['id_petugas']?><br>	
		Nama Petugas : <?=$tampil['nama_petugas']?><br>	
		Nomor Telepon : <?=$tampil['telp']?><br>	
		Level : <?=$tampil['level']?><br>	

	</div>

	</div>

		<div class="group">	
			<div class="">
					<a href="laporan/laporan.php" class=""><button class="btn1">Verifikasi Pengaduan</button></a>
			</div>

			<div class="">
					<a href="laporan/laporan2.php" class=""><button class="btn2">Generate dan Print Laporan</button></a>
			</div>

			<div class="">
					<a href="daftar/daftar.php" class=""><button class="btn3">Tambah Petugas</button></a>
			</div>
		</div>
</body>
</html>
