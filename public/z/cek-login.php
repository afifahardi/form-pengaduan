<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "pengaduan");
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * from masyarakat where username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if($cek > 0){
	$login = mysqli_fetch_assoc($data);

	if($login['level']=="masyarakat"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "masyarakat";
		header("location: user/user.php");
}else{
	echo"<script>alert ('Gagal masuk!');
	window.location = 'index.php'; </script>";
}
}
?>