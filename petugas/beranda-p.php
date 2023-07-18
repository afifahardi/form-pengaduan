<?php 	
include '../koneksi.php';

session_start();
if (!isset($_SESSION['id_petugas'])) {
    header("Location: login/login.php");
}

$data    = mysqli_query($conn,"SELECT * FROM petugas WHERE id_petugas='$_SESSION[id_petugas]'");
 $tampil = mysqli_fetch_array($data);

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
		Data Petugas:<br><br>
		Username : <?=$tampil['username']?><br>
		Id Petugas : <?=$tampil['id_petugas']?><br>	
		Nama Petugas : <?=$tampil['nama_petugas']?><br>	
		Nomor Telepon : <?=$tampil['telp']?><br>	
		Level : <?=$tampil['level']?><br>	

	</div>

	</div>

		<div class="group">

			<div class="">
					<a href="laporan/laporan.php" class=""><button class="btn2">Validasi Laporan</button></a>
			</div>
		</div>
	<div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
     </div>
</body>
</html>
