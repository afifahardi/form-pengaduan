<?php
$conn = mysqli_connect("localhost","root","","pengaduan");

//REGRISTRASI

function registrasi($data){
    global $conn;

    $nik= ($_POST["nik"]);
    $nama= strtolower(stripcslashes($_POST["nama"]));
    $username= strtolower(stripcslashes($_POST["username"]));
    $password= mysqli_real_escape_string($conn, $_POST["password"]);
    $password2= mysqli_real_escape_string($conn, $_POST["password2"]);
    $telp= ($_POST["telp"]);

    //cek username sudah ada atau blm
    $result= mysqli_query($conn, "SELECT nik FROM masyarakat WHERE nik='$nik'");
    $result2= mysqli_query($conn, "SELECT username FROM masyarakat WHERE username='$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('tidak dapat menggunakan NIK ini karena sudah terdaftar.');
            </script>";
        return false;
    }

    if (mysqli_fetch_assoc($result2)){
        echo "<script>
                alert('username sudah terdaftar, Silahkan gunakan username lain!');
            </script>";
        return false;
    }


    //cek konfirmai password
    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!'); </script>";

        return false;
    }


    //tambahkan userbaru ke database

    mysqli_query($conn,"INSERT INTO masyarakat VALUES ('$nik','$nama','$username','$password','$telp')");

    return mysqli_affected_rows($conn);

}



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


    //tambahkan userbaru ke database

    mysqli_query($conn,"INSERT INTO petugas VALUES ('','$nama_petugas','$username','$password','$telp','$level')");

    return mysqli_affected_rows($conn);

}



////////////////////////////////

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function lapor($data){
    global $conn;

   
    $tgl_pengaduan = ($_POST["tgl_pengaduan"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $isi_laporan = ($_POST["isi_laporan"]);

    $id_pengaduan = ($_POST["id_pengaduan"]); //satu untuk tabel pengaduan dan tanggapan
    $tgl_tanggapan = ($_POST["tgl_tanggapan"]);
    $tanggapan = htmlspecialchars($_POST["tanggapan"]);
    $id_petugas = ($_POST["id_petugas"]);
    

    //upload gambar
    $foto = upload();
    if(!$foto){
        return false;
    }
    $status = ($_POST["status"]);

    $query = "INSERT INTO pengaduan VALUES ('$id_pengaduan','$tgl_pengaduan','$nik','$isi_laporan','$foto','$status')";
    $query2 = "INSERT INTO tanggapan VALUES ('', '$id_pengaduan','$tgl_tanggapan', '$tanggapan','$id_petugas')";

    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);
    return mysqli_affected_rows($conn);

}

function upload(){
    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    if($error === 4) {
        echo "<script> alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
        
    }

$ekstensigambarvalid = ['jpg','jpeg','png'];
$ekstensigambar = explode('.', $namafile);
$ekstensigambar = strtolower(end($ekstensigambar));
    if(!in_array($ekstensigambar, $ekstensigambarvalid) ) {
        echo "<script>
        alert('yang anda upload bukan gambar');</script>";
        return false;
    }


    if($ukuranfile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar'); </script>";
        return false;
    }


move_uploaded_file($tmpname, 'lapor/img/'.$namafile);
return $namafile;

}

function edittanggapan($data) {
    global $conn;
    
    $id =($_GET["id"]);
    $status = ($_POST["status"]);
    $tgl_tanggapan = htmlspecialchars($_POST["tgl_tanggapan"]);
    $tanggapan = htmlspecialchars($_POST["tanggapan"]);
    $id_petugas = htmlspecialchars($_POST["id_petugas"]);

    $query = "UPDATE pengaduan SET
                
                status = '$status'
                WHERE id_pengaduan=$id";

    $query2 = "UPDATE tanggapan SET
                
                tgl_tanggapan = '$tgl_tanggapan',
                tanggapan = '$tanggapan',
                id_petugas = '$id_petugas'
                WHERE id_pengaduan=$id";    
    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);
    return  mysqli_affected_rows($conn);
    
}

function cari($keyword) {
    $query = "SELECT * FROM pengaduan
                WHERE
                id_pengaduan LIKE '%$keyword%' OR
                isi_laporan LIKE '%$keyword%' OR
                status LIKE '%$keyword%'
                ";
    return query($query);
}


?>