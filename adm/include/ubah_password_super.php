			   <h1>
            Ubah Password Staff Administrator
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Administrator</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Ubah Password Administrator</a></li>
          </ol>

<hr>

      <?php
        $query_updt = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' and role='Administrator'");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);


      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Ubah Password Staff Administrator</h2></center>

            <a href="index.php?page=5" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>


              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Password Staff Administrator</h3>

                </div>
                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="sel1">Password Terakhir</label>
                      <input type="password" class="form-control" name="last_password" placeholder="Password Terakhir" required="">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Password Baru</label>
                      <input type="password" class="form-control" name="new_password" placeholder="Password Baru" required="">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control" name="conf_password" placeholder="Konfirmasi Password Baru" required="">
                    </div>
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-primary" name="simpan" id="simpan">Simpan <i class="fa fa-arrow-circle-right"></i></button>
                </div>
                </form>
              </div>


              <?php

              if (isset($_POST['simpan'])) {
                foreach ($_POST as $key => $value) {
                  ${$key} = $value;
                }

                if (password_verify($last_password,$rows['password'])) {
                  if ($new_password == $conf_password) {

                    $cost = 10;
                    $hash = password_hash($new_password,PASSWORD_BCRYPT,["cost" => $cost]);

                    $query = mysqli_query($conn, "UPDATE super_admin SET password='$hash' WHERE username='$username'");
                    if ($query) {
                      echo "<script>alert('Berhasil Ubah Password staff Administrator')</script>";
                      echo "<script>window.location = 'index.php?page=19'</script>";
                    }else{
                      echo "<script>alert('Gagal Ubah Password staff produksi')</script>";
                      echo "<script>window.location = 'index.php?page=26&&usr=$username'</script>";
                    }


                  }else echo "<script>alert('Password baru dan konfirmasi password tidak sesuai!')</script>";
                }else echo "<script>alert('Salah Memasukan Password!')</script>";


              }

              ?>
