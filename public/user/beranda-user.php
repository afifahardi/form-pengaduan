<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

include '../koneksi.php';
 $data    =mysqli_query($conn, "SELECT * FROM masyarakat WHERE nama='$_SESSION[nama]'");
 $tampil   =mysqli_fetch_array($data);


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
	<h3>Selamat Datang, <?=$tampil['nama']?> !</h3>
	<h1>Dimohon untuk mengisi formulir dengan lengkap berserta bukti yang akurat agar laporanmu lebih cepat diproses! <br> note : Data pribadi milik masyarakat aman dan akan disembunyikan </h1>

	</div>
		<div class="group">	
			<a href="lapor/lapor.php" class=""><button class="btn1">Lapor</button></a>
			<a href="lapor/history-laporan.php" class=""><button class="btn2">History Laporan</button></a>
		</div>
		<div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
            </div>
</body>
</html>
