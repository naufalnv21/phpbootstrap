<?php

require('fpdf17/fpdf.php');


include 'koneksi.php';


 //memanggil data yang akan diprint                   
$result=mysqli_query($config,"SELECT * FROM anggota") or die(mysql_error());


//Menentukan Ukuran kertas
$pdf = new FPDF('L','mm','A4');

$pdf->AddPage();
//menentukan ukuran font
$pdf->SetFont('Arial','B',16);

$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
//60=lebar kolom 6=tinggi kolom 1=tebal garis 0=gatau
$pdf->Cell(60,6,'Nama',1,0,'C');
$pdf->Cell(80,6,'Alamat',1,0,'C');

$pdf->SetFont('Arial','',10);

 


while ($row = mysqli_fetch_array($result)){
$pdf->Ln();

    $pdf->Cell(60,10,$row['nama'],1,0);
    $pdf->Cell(80,10,$row['alamat'],1,0);
   

                            
   
}

$pdf->Ln();
$pdf->Ln();

$pdf->Ln();

$pdf->Output();

?>