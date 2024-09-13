<?php 	

session_start();
if (!isset($_SESSION['id_petugas'])) {
    header("Location: login/login.php");
}

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
	<h3>Selamat Datang, Petugas!</h3>

	</div>

		<div class="group">

			<div class="">
					<a href="../admin/laporan/laporan.php" class=""><button class="btn2">Validasi Laporan</button></a>
			</div>
		</div>
	<div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
     </div>
</body>
</html>
