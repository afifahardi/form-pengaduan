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
	<div class="judul">
		<h1>PENGADUAN</h1> <br>
		<h1>MASYARAKAT</h1>
	</div>
 <form action="cek-login3.php" method="POST">
	<div class="login-wrap">
		<div class="login-html">
			<input  type="radio"  class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
			<input  type="radio"  class="sign-up"><label for="tab-2" class="tab"></label>

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
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="submit">
				</div>
				<!-- <div class="hr"></div> -->
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
		<form>




<?php 

// if(isset($_POST["registrasi"]) ) {

//     if(registrasi($_POST) > 0){
//         echo "<script>
//                 alert('User baru berhasil ditambahkan!'); window.location.href='index.php';</script>";
//     }else{
//         echo mysqli_error($conn);
//     }
// }

 ?>
 	<!-- <form action="" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">NIK</label>
					<input id="user" type="text" class="input" name="nik">
				</div>
				<div class="group">
					<label for="user" class="label">Nama</label>
					<input id="user" type="text" class="input" name="nama">
				</div>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password2">
				</div>
				<div class="group">
					<label for="pass" class="label">Nomor Telepon</label>
					<input id="pass" type="text" class="input" name="telp">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="registrasi">
				</div>
				<div class="foot-lnk">
					<a href="member.php">Already Member?</a>
				</div>

			</div>
		</div>
	</div>
</div>

</form> -->
</body>
</html>