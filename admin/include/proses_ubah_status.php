<?php  
include '../../koneksi/conn.php';
if (isset($_GET['id_maintenance'])) {
	$id_maintenance = $_GET['id_maintenance'];
	$tgl_mnt  = $_GET['tgl_mnt'];
	$sql = mysqli_query($conn, "UPDATE maintenance SET status='servis',tgl_maintenance='$tgl_mnt' WHERE id_maintenance='$id_maintenance'");
	if ($sql) {
		echo "<script>alert('Berhasil Ubah Status Maintenance menjadi Servis')</script>";
		echo "<script>window.location = '../index.php?page=8'</script>";
	}echo mysqli_error($conn);
}
?>