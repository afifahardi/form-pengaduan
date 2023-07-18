<?php 
$kode = $_POST['kode'];
 
if($kode == "0405"){
	header("location:login.php");
}else{
	header("location:kode.php?kode=kosong");
}
?>