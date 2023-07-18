<?php

$conn = mysqli_connect("localhost","root","","pengaduan");

function registrasi2($data){
    global $conn;

    $nama_petugas= strtolower(stripcslashes($_POST["nama_petugas"]));
    $username= strtolower(stripcslashes($_POST["username"]));
    $password= mysqli_real_escape_string($conn, $_POST["password"]);
    $password2= mysqli_real_escape_string($conn, $_POST["password2"]);
    $telp= ($_POST["telp"]);
    $level= ($_POST["level"]);

    //cek username sudah ada atau blm
    $result= mysqli_query($conn, "SELECT username FROM petugas WHERE username='$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah terdaftar. Silahkan gunakan username lain!');
            </script>";
        return false;
    }


    //cek konfirmai password
    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!'); </script>";

        return false;
    }

    if(empty($level)) {
        echo "<script>
                alert('Silahkan pilih level terlebih dahulu!'); </script>";

        return false;
    }    


    //tambahkan userbaru ke database

    mysqli_query($conn,"INSERT INTO petugas VALUES ('','$nama_petugas','$username','$password','$telp','$level')");

    return mysqli_affected_rows($conn);

}

if(isset($_POST["registrasi2"]) ) {

    if(registrasi2($_POST) > 0){
        echo "<script>
                alert('User baru berhasil ditambahkan!'); window.location.href='daftar.php';</script>";
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

    <!-- NAVBAR -->
    <div class="hero">
        <nav>
            <h2 class="logo"><a href="index.php">Pengaduan Masyarakat</a></h2>
            
            <button type="button"><a href="../beranda-ad.php">Kembali</a></button>
        </nav>
    </div>
    <!-- ----------- -->
    
 <form action="" method="POST">
    <div class="login-wrap">
        <div class="login-html">
            <label class="tab">Daftar Petugas</label>

        <div class="login-form">
            <div class="sign-in-htm">

                <div class="group">
                    <label for="user" class="label">NAMA</label>
                    <input id="user" type="text" class="input" name="nama_petugas" required>
                </div>

                <div class="group">
                    <label for="user" class="label">USERNAME</label>
                    <input id="user" type="text" class="input" name="username" autocomplete="off" required>
                </div>

                <div class="group">
                    <label for="user" class="label">PASSWORD</label>
                    <input id="user" type="password" class="input" name="password" required>
                </div>

                <div class="group">
                    <label for="user" class="label">CONFIRM PASSWORD</label>
                <input id="user" type="password" placeholder="Confirm Password" name="password2" class="input" required>
            </div>

            <div class="group">
                    <label for="user" class="label">NOMOR TELEPON</label>
                    <input id="user" type="text" class="input" name="telp" autocomplete="off" required>
                </div>

                <div class="group">
                    <label for="user" class="label">LEVEL</label>
                    <select name="level" >
                    <option value="">Pilih</option>
                   <option value="admin">Admin</option>
                   <option value="petugas">petugas</option>
                </select>
                </div>

                <div class="group">
                    <input type="submit" class="button" value="Sign In" name="registrasi2">
                </div>
                <div class="foot-lnk">
                    <a href="../../petugas/login/login.php">Sudah punya akun? login</a> <br> <br>  
                </div>
            </div>
        <form>
    </body>
</html>