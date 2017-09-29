<?php  
include 'koneksi/conn.php';
if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$sql	= mysqli_query($conn,"SELECT email FROM admin WHERE email = '$email'");
	if (mysqli_num_rows($sql) > 0) {
		echo "*email sudah digunakan";	
	}else{
		echo "*email tersedia";
	}
}
?>