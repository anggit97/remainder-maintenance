<?php

include '../../koneksi/conn.php';
if (ISSET($_GET['usr'])) {
	$username = $_GET['usr'];
	$query = mysqli_query($conn,"DELETE FROM admin WHERE username='$username'");
	if ($query) {
		echo "<script>alert('Berhasil Hapus Data Staff Produksi')</script>";
		echo "<script>window.location = '../index.php?page=20'</script>";
	}echo mysqli_error($conn);
}
?>
