<?php
include '../koneksi.php';


if(isset($_POST["registrasi"]) ) {

    if(registrasi($_POST) > 0){
        echo "<script>
                alert('User baru berhasil ditambahkan!'); window.location.href='../login/login.php';</script>";
    }else{
        echo mysqli_error($conn);
    }
}



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>DAFTAR</title>
</head>
<body>
    <div class="judul">
        <h1>PENGADUAN</h1>
        <h1>MASYARAKAT</h1>
    </div>
 <form action="" method="POST">
    <div class="login-wrap">
        <div class="login-html">
            <label class="tab">Daftar</label>

        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">Nik</label>
                    <input id="user" type="text" class="input" name="nik" required>
                </div>

                <div class="group">
                    <label for="user" class="label">Nama</label>
                    <input id="user" type="text" class="input" name="nama" required>
                </div>

                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="username" required>
                </div>

                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="password" required>
                </div>

                <div class="group">
                    <label for="pass" class="label">Confirm Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="password2" required>
                </div>

                <div class="group">
                    <label for="user" class="label">Nomor Telepon</label>
                    <input id="user" type="text" class="input" name="telp" required>
                </div>

                <div class="group">
                    <input type="submit" class="button" value="Sign In" name="registrasi">
                </div>
                <!-- <div class="hr"></div> -->
                <div class="foot-lnk">
                    <a href="../login/login.php">Sudah punya akun? login</a> <br> <br>  
                </div>
            </div>
        <form>
    </body>
</html>