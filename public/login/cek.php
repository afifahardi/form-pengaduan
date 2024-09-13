<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"SELECT * from masyarakat where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$data_user = mysqli_fetch_assoc($data);
	//mengambil nik untuk menampilkan nama masyarakat di beranda
	$_SESSION['nik'] = $data_user['nik'];
	$_SESSION['nama'] = $data_user['nama'];
	
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	echo "<script>alert
	('Berhasil masuk, selamat datang :D');
	window.location = '../user/beranda-user.php';
	</script>";
}else{
	echo "<script>alert
	('Anda gagal masuk karena username atau password yang anda masukkan salah!');
	window.location = 'login.php';
	</script>";
}
?>