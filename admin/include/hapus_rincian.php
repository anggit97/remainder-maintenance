<?php 

include '../../koneksi/conn.php'; 
if (ISSET($_GET['id_ka']) && ISSET($_GET['id_maintenance'])) {
	$id_ka = $_GET['id_ka'];
	$id_maintenance = $_GET['id_maintenance'];
	$query = mysqli_query($conn,"DELETE FROM alat_kerusakan WHERE id_ka='$id_ka'");
	if ($query) {
		echo "<script>alert('Berhasil Hapus Data Rincian Maintenance')</script>";
		echo "<script>window.location = '../index.php?page=10&&id_maintenance=$id_maintenance'</script>";
	}echo mysqli_error($conn);
}
?>