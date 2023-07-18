<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}


 $nama    =mysqli_query($conn, "SELECT * FROM masyarakat WHERE nama='$_SESSION[nama]'");
 $tampil  =mysqli_fetch_array($nama);


if(isset($_POST['lapor'])){

	if(lapor($_POST<1)){
		echo 
		"<script>
		alert ('Laporan berhasil dikirim!');
		document.location.href = 'lapor/history-laporan.php';
		</script>";
		
	}else{
		"<script>
		alert ('Laporan gagal dikirimkan! Silahkan cek kembali');
		document.location.href ='beranda-user.php';
		</script>";
	}
	
}




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PENGADUAN MASYARAKAT</title>
	 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
</head>
<body>

	<!-- NAVBAR -->
	<div class="hero">
		<nav>
			<h2 class="logo"><a href="" style="text-align: left;">Pengaduan Masyarakat</a></h2>
			<h3 style="font-family: times new roman;"><a href="lapor/history-laporan.php" style="text-decoration: none; color: white; font-size: 16px;">History Pengaduan</a></h3>
			<button type="button"><a href="logout.php">Log Out</a></button>
		</nav>
	</div>

<!-- form -->
<center>
	<h2 style="color: #004650; font-weight: bold;">LAYANAN ASPIRASI DAN PENGADUAN ONLINE MASYARAKAT</h2>
	<h3 style="color: #004650; font-family: franklin gothic book;">Memberdayakan masyarakat untuk berperan aktif dalam membantu meningkatkan pelayanan publik.</h3>
</center>


		<div class="login-wrap">
			<div class="login-html">
				<input type="radio" class="sign-in" checked><label for="tab-1" class="tab">SAMPAIKAN LAPORAN ANDA!</label> <br>


<form action="" method="POST" enctype="multipart/form-data">
	<div class="login-form">
		<div class="sign-in-htm">
				<div class="group">
					<input id="user" type="text" class="input" name="nik" placeholder="Masukkan NIK" value="<?=$tampil['nik']?>" readonly>
				</div>

				<div class="group">
					<input  type="text" class="input"  placeholder="Pilih Tanggal lapor" name="tgl_pengaduan" value="<?php echo date('Y-m-d'); ?>">
				</div>

				<div class="group">
					<textarea placeholder="Masukkan Laporan" style="resize: none;" name="isi_laporan" required></textarea>
				</div>

				<div class="group">
					<label for="user" class="label" readonly>Upload Bukti Lampiran</label>
					<input  type="file" class="input" name="foto">
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
<br><br><br>
<center>
<ul class="clear">
	<li class='bx bxs-edit'><br>Tulis Laporan -> proses Verifikasi -> proses tindak lanjut -> Beri tanggapan -> Selesai </li>

	<!-- <br>
	<li class='bx bxs-right-arrow-alt'><br>Proses Verifikasi</li>
	<li class='bx bxs-conversation'><br>Proses Tindak lanjut</li>
	<li class='bx bx-comment-dots'><br>Beri tanggapan</li>
	<li class='bx bxs-check-circle'><br>Selesai</li> -->
</ul>
</center>

<footer class="footer">
<div class="container">
<div class="menu">
            <h4 style="color:white; font-family:times new roman;">Follow us on</h4>
            <div class="social-media">
              <i class="fab fa-facebook">pengaduan masyarakat</i>
              <i class="fab fa-instagram">  pengaduan_masyarakat    </i>
              <i class="fab fa-twitter">pengaduan_masyarakat      </i>
            </div>
</div>
</div>
</footer>
<div class="fixed-footer">
      <div class="container">Copyright &copy; 2023 Pengaduan Masyarakat</div>
    </div>
</body>
</html>