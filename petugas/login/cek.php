

<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../../koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
// $level = $_POST['level'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"SELECT * FROM petugas where username='$username'and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){


	$login = mysqli_fetch_assoc($data);
	//untuk menampilkan nama
	$_SESSION['id_petugas'] = $login['id_petugas'];
	$_SESSION['nama_petugas'] = $login['nama_petugas'];


// cek jika user login sebagai admin
	if($login['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../../admin/beranda-ad.php");
 
	// cek jika user login sebagai petugas
	}else if($login['level']=="petugas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
		// alihkan ke halaman dashboard petugas
		header("location:../beranda-p.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	


 
?>