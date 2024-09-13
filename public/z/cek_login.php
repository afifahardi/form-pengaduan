<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$q = mysqli_query("SELECT * from petugas where username='$username' and password='$password'");
$r = mysqli_fetch_array ($q);

$q2 = mysqli_query("SELECT * from masyarakat where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q2);
if (mysqli_num_rows($q) == 0) {
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['level'] = 'petugas';
    header('location:petugas.php');
}
else if (mysqli_num_rows($q2) == 0) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['level'] = 'masyarakat';
    header('location:masyarakat.php');
}else {
    echo "Login Gagal";
}
?>