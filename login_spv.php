<?php
session_start();
$error = "";

include 'koneksi/conn.php';

if (isset($_POST['login'])) {

	foreach ($_POST as $key => $value) {
		${$key} = $value;
	}

	$query = mysqli_query($conn, "SELECT password from admin where username='$username' and role='SPV'");

	if ($query) {

		if (mysqli_num_rows($query)>0) {

			$data  = mysqli_fetch_array($query);
			if (password_verify($password,$data['password'])) {
				$_SESSION['username'] = $username;
				header("location:spv");
				exit;
			}else $error = "Password dan username Salah!";
		}else $error = "Password dan username Salah!";

	}else $error = "Password dan username Salah!";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Remainder Maintenance | Login SPV</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style2.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		body {
			background: url(img/GHr12sH.jpg) no-repeat center center fixed;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
		}

		hr{
			margin-top: 0px;
			margin-bottom: 0px;
			width:50px solid black;
		}

		h3{
			margin-top: 0px;
		}
		.login-form{
			margin-top: 0px;
		}
	</style>
</head>
<body>
	<div class="container">

	  <div class="row" id="pwd-container">
	    <div class="col-md-4"></div>

	    <div class="col-md-4">
	    	<center><img src="img/pt.png" alt="" class="img img-responsive img-circle" draggable="false" style="margin-top: 30px;margin-bottom: 20px;"></center>
	      <section class="login-form">
	        <form method="post" action="" role="login">

			  <center><h3>Login SPV</h3></center>

	          <center><h5><?php echo "<font color='red'>$error</font>"; ?></h5></center>
	          <input type="text" name="username" required class="form-control input-lg" placeholder="username" />

	          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" required="" />


	          <div class="pwstrength_viewport_progress"></div>


	          <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Masuk</button>
	          <div>
	            <a href="login_adm_maintenance.php">Login Staff Maintenanace</a> |
	            <a href="login_produksi.php">Login Staff Produksi</a>
	          </div>

	        </form>

	        <div class="form-links">
	          <a href="">Remainder Maintenance</a>
	        </div>
	      </section>
	      </div>

	      <div class="col-md-4"></div>


	  </div>


	</div>
</body>
</html>
