<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

$admin = mysqli_query($conn,"SELECT * FROM petugas WHERE username='$username' AND password='$password'");
$user = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'");
$cek_admin = mysqli_num_rows($admin);
 
// cek apakah username dan password di temukan pada database
if($cek_admin > 0){
 
	$data = mysqli_fetch_assoc($admin);
	if($data['level']=="admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location:home-admin.php");

	}else if($data['level']=="petugas"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
		header("location:home-petugas.php");
	}else{
		header("location:login.php?pesan=gagal");
	}	
}else if($user > 0) {
		$row = mysqli_fetch_assoc($user);
		$_SESSION['username'] = $row['username'];
		header("location:home-masyarakat.php");
}else{
	header("location:login.php?pesan=gagal");
}

?>