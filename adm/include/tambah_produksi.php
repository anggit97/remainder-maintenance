    <h1>
            Tambah Staff Produksi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Pegawai</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Tambah Staff Produksi</a></li>
          </ol>

<hr>


      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Tambah Staff Produksi</h2></center>


			      <a href="index.php?page=5" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Tambah Staff Produksi</h3>

                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">Username *</label>
                      <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama</label>
                      <input type="text" class="form-control" name="nm_produksi" id="nm_produksi" placeholder="Nama Staff Produksi" required>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Alamat</label>
                      <textarea name="alamat" id="alamat" class="form-control" required cols="30" rows="10" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Konfirmasi Password</label>
                      <input type="password" class="form-control" name="re_password" placeholder="Konfirmasi Password" required>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Role</label>
                      <select name="role" id="role" class="form-control combobox" >

  		                <option value="Staff Produksi">Staff Produksi</option>
                      </select>
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


                $sql = mysqli_query($conn,"SELECT * FROM staff");
                while ($rows = mysqli_fetch_array($sql)) {
                  if ($rows['username'] == $username) {
                    echo "<script>alert('Username sudah digunakan')</script>";
                    break;
                  }
                }

                if ($password != $re_password) {
                  echo "<script>alert('Password dan Konfirmasi Password tidak sesuai')</script>";
                }

                $cost = 10;
                $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);

                $query = mysqli_query($conn, "INSERT INTO admin VALUES('$username','$nm_produksi','$hash','$alamat','$email','$role')");
                if ($query) {
                  echo "<script>alert('Berhasil Tambah Staff Produksi')</script>";
                  echo "<script>window.location.href = 'index.php?page=20';</script>";
                }else{
                  echo "<script>alert('Gagal Tambah Produksi')</script>";
                  header("Refresh:0");
                }


              }

              ?>
