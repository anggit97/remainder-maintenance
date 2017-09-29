<?php
ob_start();
include '../fpdf/fpdf.php';
include '../../koneksi/conn.php';
include '../fpdf/mc_table/mc_table2.php';

if (isset($_GET['dr_tgl']) && isset($_GET['smp_tgl'])) {
	$dr_tgl = $_GET['dr_tgl'];
	$smp_tgl = $_GET['smp_tgl'];
	class PDF extends FPDF
	{


	}

	// Instanciation of inherited class
	$pdf = new PDF_MC_Table();

	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,-50,'Pertanggal : '.$dr_tgl." / ".$smp_tgl,0,0,'C');
	$pdf->Ln(0);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(10,10,"No",1,0,'C');
	$pdf->Cell(40,10,"ID Maintenance",1,0,'C');
	$pdf->Cell(30,10,"Tgl Pengajuan",1,0,'C');
	$pdf->Cell(40,10,"Tgl Maintenance",1,0,'C');
	$pdf->Cell(40,10,"Pegawai",1,0,'C');
	$pdf->Cell(30,10,"Status",1,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);

	$query = mysqli_query($conn,"SELECT a.*,d.* FROM admin a, maintenance d WHERE a.nama_admin=d.id_pegawai AND (STR_TO_DATE(tgl_maintenance, '%Y-%m-%d') BETWEEN '$dr_tgl' AND '$smp_tgl') ORDER BY  d.id_maintenance DESC");
	$no = 0;

	$pdf->SetWidths(array(10,40,30,40,40,30));

	while ($rowss = mysqli_fetch_array($query)) {
	   $pdf->Row(array(++$no,$rowss['id_maintenance'],$rowss['tgl_peng_maintenance'],$rowss['tgl_maintenance'],$rowss['nama_admin'],$rowss['status']));
	}
	$pdf->Output();

	}
?>
