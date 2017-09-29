<?php  
include '../../koneksi/conn.php';
if (isset($_GET['id_maintenance'])) {
	$id_maintenance = $_GET['id_maintenance'];
	$sql = mysqli_query($conn, "UPDATE maintenance SET status='diproses' WHERE id_maintenance='$id_maintenance'");
	if ($sql) {
		echo "<script>alert('Berhasil Ubah Status Maintenance')</script>";
		echo "<script>window.location = '../index.php?page=8'</script>";
	}echo mysqli_error($conn);
}
?>