<?php 
session_start();
if (!isset($_SESSION['id_petugas'])) {
    header("Location: ../../petugas/login/login.php");
}

require'../../koneksi.php';


$result = mysqli_query($conn, "SELECT * FROM pengaduan");
// $result2 = mysqli_query($conn, "SELECT * FROM tanggapan where tanggapan=$tanggapan");

//cari
if (isset($_POST["cari"])){
    $result = cari($_POST["keyword"]);

}






 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>Data Petugas</title>
        <style>
        body{
            color:#6a6f8c;
            background: url(../../img/bg1.jpg) no-repeat center fixed;
            font:600 16px/18px 'Open Sans',sans-serif;
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
            color: black;
            font-family: times new roman;
        }
        .cari {
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
       button a{
        text-decoration: none;
        font-family: times new roman;
        font-weight: bold;
        font-size: 12px;
        color: black;
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
/*navbar*/

</style>
 </head>
 <body>
    <!-- NAVBAR -->
    <div class="hero">
        <nav>
            <h2 class="logo"><a href="index.html">Pengaduan Masyarakat</a></h2>
            
            <button type="button"><a href="../beranda-ad.php">Kembali</a></button>
        </nav>
    </div>
    <!-- ----------- -->

 <h1><center>PENGADUAN</center></h1> 
 <br>
 
    
 <center>
 <form action="" method="POST">

    <input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" class="cari">
    <button type="submit" name="cari" style="color: white;">CARI</button>     

 </form>
 </center>

 
 <br>
 <table border="1" cellpadding="10" cellspacing="0" align="center" bgcolor="white">
    <tr>
       
        <th class="field">ID</th>
        <th class="field">TANGGAL</th>
        <th class="field">NIK</th>
        <th class="field">ISI LAPORAN</th>
        <th class="field">FOTO</th>
        <th class="field">STATUS</th>
        <th class="field">AKSI</th>
    </tr>
    <?php $i = 1; 
    

    ?>

    <?php foreach ($result as $log): ?>
        <tr>
             
            <td><?= $log["id_pengaduan"]?></td>
            <td><?= $log["tgl_pengaduan"]?></td>
            <td><?= $log["nik"]?></td>
            <td><?= $log["isi_laporan"]?></td>
            <td><img src="../../user/lapor/img/<?= $log['foto']; ?>" width="90"></td>
            <td><?= $log["status"]?></td>
            <td><button><a href="validasi.php?id=<?= $log["id_pengaduan"];?>">validasi</a></button> </td>
            

    
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
 </table>
 </body>
 </html>