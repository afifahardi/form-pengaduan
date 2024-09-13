<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login/login.php");
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

</style>
 </head>
 <body>
 <h1><center>HISTORY PENGADUAN</center></h1>
 <br>
 <center>
 <form action="" method="POST">

    <input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" class="cari">
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
                 <?php if ($log["status"] == "selesai"){
                    echo "<a href='validasi.php' type='button'>Selesai</a>";
                 } else { ?>
                        <button name="kosong" onclick=""><?= $log["status"]?></button>
                <?php
                 }
                 ?>
             </td>
          
            

    
 		</tr>
 		<?php $i++; ?>
 	<?php endforeach; ?>
 </table>
 </body>
 </html>