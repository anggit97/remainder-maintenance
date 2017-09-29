<?php 

include '../../koneksi/conn.php'; 
if (ISSET($_GET['id_kerusakan'])) {
	$kode_customer = $_GET['id_kerusakan'];
	$query = mysqli_query($conn,"DELETE FROM kerusakan WHERE id_kerusakan='$kode_customer'");
	if ($query) {
		echo "<script>alert('Berhasil Hapus Data Jenis kerusakan')</script>";
		echo "<script>window.location = '../index.php?page=14'</script>";
	}echo mysqli_error($conn);
}
?>