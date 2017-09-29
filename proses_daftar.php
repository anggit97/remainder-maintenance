<?php
	include 'koneksi/conn.php';
	if (isset($_POST['username'])) {
		foreach ($_POST as $key => $value) {
			${$key} = $value;
		}

		$cost = 10;
		$hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);
		$query = mysqli_query($conn,"INSERT INTO admin VALUES('$username','$name','$hash','$alamat','$email','$role')");
		if ($query) {
			echo "1";
		}else echo mysqli_error($conn);

	}else{
		echo "gagal";
	}

?>
