<?php 	

session_start();
error_reporting();


 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>MASUKKAN KODE</title>
</head>
<body>
	<!-- navbar -->
	<div class="hero">
		<nav>
			<h2 class="logo"><a href="../../index.html">Pengaduan Masyarakat</a></h2>
			
		</nav>
	</div>
<!-- selesai navbar -->
 <form action="cek-kode.php" method="POST">
	<div class="login-wrap">
		<div class="login-html">
			<input type="radio" class="sign-in" checked><label class="tab">MASUKKAN KODE</label> <br>
			
			<?php 
		if(isset($_GET['kode'])){
			if($_GET['kode'] == "kosong"){
				echo "<h4 style='color:red'>Kode Belum Di Masukkan !</h4>";
			}
		}
		?>
		<div class="login-form">
			<div class="sign-in-htm">

				<div class="group">
					<input id="pass" type="password" class="input" data-type="password" name="kode">
				</div>

				<div class="group">
					<input type="submit" class="button" value="Submit" name="submit">
				</div>
				<!-- <div class="hr"></div> -->
				
			</div>
		<form>
	</body>
</html>