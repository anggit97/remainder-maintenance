<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Administrator Maintenance</title>
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
	</style>
</head>
<body>
	<div class="container">

	  <div class="row" id="pwd-container">
	    <div class="col-md-4"></div>

	    <div class="col-md-4">
	      <section class="login-form">
	        <form method="post" action="" role="login">
	          <center><h3>Daftar Administrator</h3></center>
	          <input type="text" name="username" id="username" required class="form-control input-lg" placeholder="Username" minlength="8" autocomplete="off"/>
	          <label for="" style="color: red;" id="error1" hidden></label>

	          <input type="text" name="name" id="name" required class="form-control input-lg" placeholder="Nama Lengkap" />
			  <label for="" style="color: red;" id="error2" hidden></label>

	          <input type="email" name="email" id="email" required class="form-control input-lg" placeholder="Email" />
			  <label for="" style="color: red;" id="error3" hidden></label>

	          <input type="password" class="form-control input-lg" id="password" name="password" minlength="8" placeholder="Password" required="" />
	          <label for="" style="color: red;" id="error4" hidden></label>

	          <input type="password" class="form-control input-lg" id="re_password" placeholder="Konfirmasi Password" required="" />
	          <label for="" style="color: red;" id="error5" hidden></label>

	          <div class="pwstrength_viewport_progress"></div>

							<label for="sel1">Alamat</label>
							<textarea name="alamat" id="alamat" class="form-control" required cols="10" rows="5" placeholder="Alamat"></textarea>


							<label for="sel1">Role</label>
							<select name="role" id="role" class="form-control combobox" >
							<option value="Administrator">Administrator</option>
							</select>


	          <button type="submit" name="regis" id="regis" class="btn btn-lg btn-primary btn-block">Daftar</button>

	  		  <hr>

	  		  <center>Sudah terdaftar?<a href="login_adm.php">login</a></center>

	        </form>

	        <div class="form-links">
	          <a href="">Remainder Maintenance</a>
	        </div>
	      </section>
	      </div>

	      <div class="col-md-4"></div>


	  </div>
	</div>

	<script>
		$(document).ready(function() {

			$("#username").keyup(function() {
				/* Act on the event */
				var username = $("#username").val();
				$.ajax({
					url: 'check_username.php',
					type: 'POST',
					data: {'username' : username},
					success: function(response){
						if (response != "*Username tersedia") {
							$("#error1").show();
							$("#error1").css('color', 'red');
							$("#error1").text(response);
						}else{
							$("#error1").show();
							$("#error1").css('color', 'green');
							$("#error1").text(response);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
			           console.log(textStatus, errorThrown);
			        }
				});

			});



			$("#regis").click(function(e) {
				/* Act on the event */
				e.preventDefault()

				var username = $("#username").val();
				var name = $("#name").val();
				var email = $("#email").val();
				var password = $("#password").val();
				var re_password = $("#re_password").val();
				var alamat = $("#alamat").val();
				var role = $("#role").val();


				var error = "";

				if (username == "") {
					$("#error1").show();
					$("#error1").css('color', 'red');
					$("#error1").text('*Username tidak boleh kosong');
					error = "1";
				}else{
					$("#error1").hide();
					error = "0";
				}

				if(name == ""){
					$("#error2").show();
					$("#error2").text('*Nama tidak boleh kosong');
					error = "1";
				}else{
					$("#error2").hide();
					error = "0";
				}

				if(email == ""){
					$("#error3").show();
					$("#error3").css('color', 'red');
					$("#error3").text('*Email tidak boleh kosong');
					error = "1";
				}else{
					$("#error3").hide();
					error = "0";
				}

				if(password == ""){
					$("#error4").show();
					$("#error4").text('*Password tidak boleh kosong');
					error = "1";
				}else{
					error = "0";
					$("#error4").hide();
					if(password != re_password){
						error = "1";
						$("#error5").show();
						$("#error5").text('*Tidak sesuai dengan password');
					}else{
						$("#error5").hide();
						error = "0";
					}
				}

				if (error == "0") {
					$.ajax({
						url: 'proses_daftar.php',
						type: 'POST',
						data: {'username' : username, 'name' : name, 'email' : email, 'password' : password, 'alamat':alamat, 'role':role},
						success: function(response){

							if (response == "1") {
								window.location.replace("success.php");
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
				           console.log(textStatus, errorThrown);
				        }
					});

					//window.location.replace("http://google.com");
				}
			});

		});
	</script>
</body>
</html>
