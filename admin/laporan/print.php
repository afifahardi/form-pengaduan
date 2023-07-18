<?php 	

require_once __DIR__ . '/print/vendor/autoload.php';

require '../../koneksi.php';
$pengaduan = query("SELECT * FROM pengaduan where status='selesai'");

$mpdf = new \Mpdf\Mpdf();
$html = ' <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	<center><h1> REKAP PENGADUAN </h1> </center>
 	<table border="1" cellpadding="10" cellspacing="0" align="center" bgcolor="white">
	 	<tr>
	       	<th>ID</th>
	 		<th>TANGGAL</th>
	 		<th>NIK</th>
	 		<th>ISI LAPORAN</th>
	 		<th>FOTO</th>
	 		<th>STATUS</th>

	 	</tr>';

	 	$i = 1;
	 	foreach( $pengaduan as $row ) {
	 		$html .= '<tr>
	 				<td>'. $row["id_pengaduan"] .'</td>
	 				<td>'. $row["tgl_pengaduan"] .'</td>
	 				<td>'. $row["nik"] .'</td>
	 				<td>'. $row["isi_laporan"] .'</td>
	 				<td><img src="img/'. $row["foto"] .'" width="70px"></td>
	 				<td>'. $row["status"] .'</td>
	 				</tr>';
	 	}

 $html  .=	'</table>
 </body>
 </html>';

$mpdf->WriteHTML($html);
$mpdf->Output();


 ?>