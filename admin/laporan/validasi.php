<?php 
session_start();
if (!isset($_SESSION['id_petugas'])) {
    header("Location: ../../petugas/login/login.php");
}

require'../../koneksi.php';

$id_petugas = $_SESSION['id_petugas'];

$id = $_GET['id'];
$log = query ("SELECT * FROM pengaduan where id_pengaduan=$id")[0];
$log2 = query ("SELECT * FROM tanggapan where id_pengaduan=$id")[0];


// menampilkan nama petugas
 $data    = mysqli_query($conn,"SELECT * FROM petugas WHERE id_petugas='$_SESSION[id_petugas]'");
 $tampil  = mysqli_fetch_array($data);


 if(isset($_POST['submit'])){
	if(edittanggapan($_POST<1)){
		echo 
		"<script>
		alert ('tanggapan berhasil ditambahkan!');
		document.location.href = 'laporan.php';
		</script>";
	}else{
		"<script>
		alert ('tanggapan gagal ditambahkan!');
		document.location.href = 'laporan.php';
		</script>";
	}

}

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VALIDASI</title>
	<link rel="stylesheet" type="text/css" href="style-va.css">
		<style>
        body {
             background-image: url('../../img/bg1.jpg');
             background-size: cover;
            }
            {
                font-family: "Trebuchet MS";
             }
        input{
                background: grey;
            }
        textarea{
            background: grey;
             }
        table{
            margin: 100px auto;
            font-size: 20px;
        }
        .cari {
            background: white;
        }
       .field{
        background: darkred;
        color: white;
       }

       h1{
        color: black;
        text-decoration-style: franklin gothic heavy;
       }
       /*navbar*/
.hero{
        height: 10vh;
        width: 100%;
        background-image:url(img/bg1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
nav{
    background: #004650;
    display: flex;
    align-items: center;
    justify-content: space-between ;
    padding-top: 0px;
    padding-left: 10%;
    padding-right: 10%;
}
.logo a{
    color: white;
    font-size: 28px ;
    text-decoration: none;
}

button{
        border: none;
        background: #00A180;
        padding: 12px 30px;
        border-radius: 30px;
        transition: .3s;
        }
button a{
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 15px;
}

</style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="hero">
        <nav>
            <h2 class="logo"><a href="index.html">Pengaduan Masyarakat</a></h2>
            
            <button type="button"><a href="laporan.php">Kembali</a></button>
        </nav>
    </div>
    <!-- ----------- -->

	<h1><center>VALIDASI</center></h1>
<form action="" method="POST">

	<div id="sidebar">
 		Id pengaduan :<br>
 		 <?= $log['id_pengaduan']; ?><br> <br>
 		Tanggal : <br>
 		<?= $log['tgl_pengaduan']; ?><br> <br>
 		NIK : <br>
 		<?= $log['nik']; ?> <br> <br>
 		isi laporan : <br>
 		<?= $log['isi_laporan']; ?> <br><br>
 		foto : <br>
 		<img src="../../user/lapor/img/<?= $log['foto']; ?>" width="120px">





 	</div>
<!--------------- #content --------------->
 	<div id="content">
 		Status : <br>
 		<input type="radio" name="status" value="proses" <?php if($log['status']=='proses') echo 'checked'?>/>Proses <br>	
 		<input type="radio" name="status" value="selesai" <?php if($log['status']=='selesai') echo 'checked'?>/>Selesai 
 		<br><br>

 		Tanggal : <br>
 		<input type="text" name="tgl_tanggapan" value="<?php echo date('Y-m-d'); ?>"> 
 		<br><br>

 		Id Petugas : <br>
 		<input type="text" name="id_petugas" value="<?=$tampil['id_petugas']?>"> <br><br>
 		

 		Tanggapan : <br>
 		<textarea name="tanggapan"><?=$log2['tanggapan']?></textarea>

        <br> <br>
        <input type="submit" class="button" value="KIRIM" name="submit">
 	</div>
</form>
</body>
</html>