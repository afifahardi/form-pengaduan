<?php
include '../../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/login.php");
}


 $nama    =mysqli_query($conn, "SELECT * FROM masyarakat WHERE nama='$_SESSION[nama]'");
 $tampil  =mysqli_fetch_array($nama);


if(isset($_POST['lapor'])){

	if(lapor($_POST<1)){
		echo 
		"<script>
		alert ('Laporan berhasil dikirim!');
		document.location.href = 'history-laporan.php';
		</script>";
		
	}else{
		"<script>
		alert ('Laporan gagal dikirimkan! Silahkan cek kembali');
		document.location.href ='lapor.php';
		</script>";
	}
	
}




 ?>	


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LAPOR</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">
		<h2>Pengaduan Masyarakat</h2>
		<h1 class="nama">Pelapor atas nama, <?=$tampil['nama']?> !</h1>
		
	</div>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="login-wrap">
				<div class="login-html">
					
	<div class="login-form">
		<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">NIK</label>
					<input id="user" type="text" class="input" name="nik" value="<?=$tampil['nik']?>">
				</div>

				<div class="group">
					<label for="user" class="label">Tanggal Pengaduan</label>
					<input id="user" type="text" class="input" name="tgl_pengaduan" value="<?php echo date('Y-m-d'); ?>">
				</div>

				<div class="group">
					<label for="user" class="label">Laporan</label>
					<textarea name="isi_laporan"></textarea>
				</div>

				<div class="group">
					<label for="user" class="label">Foto</label>
					<input id="user" type="file" class="input" name="foto">
				</div>

				<!-- form tanggapan hidden -->
					<?php 
					$angka = '0123456789';
					$shuffle = substr(str_shuffle($angka), 0,5);
					$id_pengaduan = $shuffle;

					 ?>
					<input id="user" type="hidden" class="input" name="id_pengaduan" value="<?= $id_pengaduan ?>">
				
					<input id="user" type="hidden" class="input" name="tgl_tanggapan" value="<?php echo date('Y-m-d'); ?>">
			
					<input id="user" type="hidden" class="input" name="tanggapan" value="Belum ditanggapi">
	
					<input id="user" type="hidden" class="input" name="id_petugas" value="9">
				<!-- s -->



				<div>
				<input type="hidden" name="status" value="0">
				</div>

				

				<div class="group">
					<input type="submit" class="button" value="LAPOR" name="lapor">
				</div>
		</div>
	</div>
</div>
</div>


	</form>
</body>
</html>