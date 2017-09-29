<?php
$pesanArr = array();
include '../../koneksi/conn.php';
if (ISSET($_GET['id_alat'])) {
	$kode_barang = $_GET['id_alat'];
	$query = mysqli_query($conn,"DELETE FROM alat WHERE id_alat='$kode_barang'");
	if ($query) {
		echo "alert('Berhasil Hapus Data Alat')";
		$pesan = "<div class='alert alert-danger'>
                  <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Gagal</strong> Simpan Barang
                </div>";
        array_push($pesanArr, $pesan);
        header("location:../index.php?page=2");

	}echo mysqli_error($conn);
} 
?>
