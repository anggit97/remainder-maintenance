<?php  
include 'koneksi/conn.php';
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$sql	= mysqli_query($conn,"SELECT username FROM admin WHERE username = '$username'");
	if (mysqli_num_rows($sql) > 0) {
		echo "*Username sudah digunakan";	
	}else{
		echo "*Username tersedia";
	}
}
?>