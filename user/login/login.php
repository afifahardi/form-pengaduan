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
	<title>LOGIN</title>
</head>
<body>
	<!-- navbar -->
	<div class="hero">
		<nav>
			<h2 class="logo"><a href="../../index.php">Pengaduan Masyarakat</a></h2>
			
		</nav>
	</div>
<!-- selesai navbar -->

 <form action="cek.php" method="POST">
	<div class="login-wrap">
		<div class="login-html">
			<input type="radio" class="sign-in" checked><label for="tab-1" class="tab">LOGIN</label> <br>
			

		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username">
				</div>

				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>

				<div class="group">
					<input type="submit" class="button" value="Sign In" name="submit">
				</div>
				<!-- <div class="hr"></div> -->
				<div class="foot-lnk">
					<a href="../daftar/daftar.php">Daftar Akun</a> <br> <br>	
					<a href="../../petugas/login/kode.php">Already Member?</a>
				</div>
			</div>
		<form>
	</body>
</html>