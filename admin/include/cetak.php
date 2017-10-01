<?php
ob_start();
include '../fpdf/fpdf.php';
include '../../koneksi/conn.php';
include '../fpdf/mc_table/mc_table.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();

$sql = mysqli_query($conn,"SELECT a.*,b.* FROM maintenance a, admin b where id_maintenance='$id_maintenance' AND b.username=a.id_pegawai");
if ($sql) {
  $rows = mysqli_fetch_array($sql);
}

$pdf->SetFont('TIMES','B',12);
$pdf->Ln(10);
$pdf->Cell(100,10,'Data Maintenance',1,1,'C');
$pdf->SetFont('TIMES','',10);
$pdf->Cell(50,7,'ID Maintenance ',0,0,'L');
$pdf->Cell(50,7,' :   '.$rows['id_maintenance'],0,1,'L');
$pdf->Cell(50,7,'Tanggal Pengajuan Maintenance ',0,0,'L');
$pdf->Cell(50,7,' :   '.date('d F, Y',strtotime($rows['tgl_peng_maintenance'])),0,1,'L');
$pdf->Cell(50,7,'Tanggal Maintenance ',0,0,'L');
$pdf->Cell(50,7,' :   '.date('d F, Y',strtotime($rows['tgl_maintenance'])),0,1,'L');
$pdf->Cell(50,7,'Pegawai ',0,0,'L');
$pdf->Cell(50,7,' :   '.$rows['nama_admin'],0,1,'L');
$pdf->Cell(50,7,'Status ',0,0,'L');
$pdf->Cell(50,7,' :   '.$rows['status'],0,1,'L');

$pdf->Ln(15);
$pdf->Cell(40,10,'',0,0,'L');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(100,10,'Rincian Data Maintenance',1,1,'C');
$pdf->Ln();
$pdf->SetFont('TIMES','',10);
$pdf->Cell(20,10,'No.',1,0,'C');
$pdf->Cell(20,10,'ID Alat',1,0,'C');
$pdf->Cell(30,10,'Nama Alat',1,0,'C');
$pdf->Cell(20,10,'ID Kerusakan',1,0,'C');
$pdf->Cell(30,10,'Nama Kerusakan',1,0,'C');
$pdf->Cell(40,10,'Solusi',1,0,'C');
$pdf->Cell(30,10,'Deskripsi',1,1,'C');

$sqli = mysqli_query($conn, "SELECT a.*,b.*, c.* FROM alat a, Kerusakan b, alat_kerusakan c WHERE a.id_alat=c.id_alat AND b.id_kerusakan=c.id_kerusakan AND c.id_maintenance='$id_maintenance' ORDER BY  c.id_maintenance DESC");

$no = 0;

$pdf->SetWidths(array(20,20,30,20,30,40,30));

while ($rowss = mysqli_fetch_array($sqli)) {
  $pdf->Row(array(++$no,$rowss['id_alat'],$rowss['nama_alat'],$rowss['id_kerusakan'],$rowss['nama_kerusakan'],$rowss['solusi'],$rowss['deskripsi']));
}


$pdf->Output();
?>
