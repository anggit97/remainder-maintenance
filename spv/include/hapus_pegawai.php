<?php 

include '../../koneksi/conn.php'; 
if (ISSET($_GET['id_pegawai'])) {
	$kode_pegawai = $_GET['id_pegawai'];
	$query = mysqli_query($conn,"DELETE FROM pegawai WHERE id_pegawai='$kode_pegawai'");
	if ($query) {
		echo "<script>alert('Berhasil Hapus Data Pegawai')</script>";
		echo "<script>window.location = '../index.php?page=5'</script>";
	}echo mysqli_error($conn);
}
?>