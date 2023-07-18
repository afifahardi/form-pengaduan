<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

require'../../koneksi.php';

$nik = $_SESSION['nik'];
$result = mysqli_query($conn, "SELECT * FROM pengaduan WHERE nik=$nik");

//cari
if (isset($_POST["cari"])){
    $result = cari($_POST["keyword"]);

}


if (isset($POST["kosong"])) {
    echo "<script>alert
            ('Pengaduan ini belum ditanggapi oleh petugas, Harap tunggu 3x24 jam hari kerja!');
            window.location = 'history-laporan.php';
        </script>";

}



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>History Pengaduan</title>
        <style>
        body {
             background: url('../../img/bg1.jpg') no-repeat center fixed;
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
            background: #00A180;
            color: white;
            font-weight: bold;
        }
        .carikolom{
            background: white;
        }
       .field{
        background: #004650;
        color: white;
       }

       h1{
        color: black;
        text-decoration-style: franklin gothic heavy;
       }

       .hero{
            height: 10vh;
            width: 100%;
            background-image: url(../img/bg1.jpg);
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
            <h2 class="logo"><a href="" style="text-align: left;">Pengaduan Masyarakat</a></h2>
            <button type="button"><a href="../beranda-user.php">Kembali</a></button>
        </nav>
    </div>
 <h1><center>HISTORY PENGADUAN</center></h1>

 <br>
 <center>
 <form action="" method="POST">

    <input type="text" name="keyword" size="50" autofocus placeholder="Masukkan id pengaduan/isi laporan..." autocomplete="off" class="carikolom">
    <button type="submit" name="cari" class="cari">CARI</button>     

 </form>
 </center>

 
 <br>
 <table border="1" cellpadding="10" cellspacing="0" align="center" bgcolor="white">
 	<tr>
       
 		<th class="field">ID PENGADUAN</th>
 		<th class="field">TANGGAL</th>
 		<th class="field">NIK</th>
 		<th class="field">ISI LAPORAN</th>
 		<th class="field">FOTO</th>
 		<th class="field">STATUS</th>
 	</tr>
 	<?php $i = 1; 
    

    ?>

 	<?php foreach ($result as $log): ?>
 		<tr>
             
 			<td><?= $log["id_pengaduan"]?></td>
 			<td><?= $log["tgl_pengaduan"]?></td>
 			<td><?= $log["nik"]?></td>
            <td><?= $log["isi_laporan"]?></td>
            <td><img src="img/<?= $log['foto']; ?>" width="90"></td>
             
             <td>
                        <button><a href='tanggapan.php?id=<?= $log["id_pengaduan"];?>' type='button'><?= $log["status"]?></a></button>
             </td>
    
 		</tr>


 		<?php $i++; ?>
 	<?php endforeach; ?>
 </table>
        
 </body>
 </html>