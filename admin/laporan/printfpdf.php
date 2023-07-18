
<?php 

//manggil library FPDF
require('fpdf185/fpdf.php');
include '../../koneksi.php';


// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'REKAP PENGADUAN',0,0,'C');
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);

$pdf->Cell(10,7,'ID',1,0,'C');
$pdf->Cell(20,7,'TANGGAL',1,0,'C');
$pdf->Cell(45,7,'NIK',1,0,'C');
$pdf->Cell(38,7,'ISI LAPORAN',1,0,'C');
$pdf->Cell(30,7,'STATUS',1,0,'C');



$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($conn, "SELECT * FROM pengaduan");
while($d = mysqli_fetch_array($data)){
	$pdf->Cell(10,6, $d['id_pengaduan'],1,0,'C');
	$pdf->Cell(20,6, $d['tgl_pengaduan'],1,0);
	$pdf->Cell(45,6, $d['nik'],1,0);
	$pdf->Cell(38,6, $d['isi_laporan'],1,0);
	$pdf->Cell(30,6, $d['status'],1,1);
	
	

}
$pdf->Output();




 ?>