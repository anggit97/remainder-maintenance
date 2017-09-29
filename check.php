<?php  
include 'koneksi/conn.php';
$username=$_POST['username_up'];
$sql= mysqli_query($conn,"select * from admin where username ='".$username."'");

if(mysqli_num_rows($sql) > 0) 
	{  
		echo("{\"error\": \"Username exists\" }");  
	}else {
		echo("{\"error\": \"Username available\" }");
	}

?>