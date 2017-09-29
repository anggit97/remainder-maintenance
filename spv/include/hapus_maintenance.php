<?php 

include '../../koneksi/conn.php'; 
if (ISSET($_GET['id_maintenance'])) {
	$id_maintenance = $_GET['id_maintenance'];
	$query = mysqli_query($conn,"DELETE FROM maintenance WHERE id_maintenance='$id_maintenance'");
	$query2 = mysqli_query($conn,"DELETE FROM alat_kerusakan WHERE id_maintenance='$id_maintenance'");
	if ($query && $query2) {
		echo "<script>alert('Berhasil Hapus Data maintenance')</script>";
		echo "<script>window.location = '../index.php?page=8'</script>";
	}echo mysqli_error($conn);
}
?>