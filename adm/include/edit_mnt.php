			   <h1>
            Ubah Data Staff Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> SPV</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Ubah Data Staff Maintenance</a></li>
          </ol>

<hr>

      <?php
        $query_updt = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);


      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Ubah Data Staff Maintenance</h2></center>

            <a href="index.php?page=11" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>


              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Data Staff Maintenance</h3>

                </div>
                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="sel1">Username</label>
                      <input type="text" class="form-control" name="username" readonly="readonly" value="<?php echo $rows['username'];?>" placeholder="Kode Barang">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama Staff Maintenance</label>
                      <input type="text" class="form-control" name="nm_admin" id="nm_admin" value="<?php echo $rows['nama_admin'];?>"  placeholder="Nama Staff Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $rows['email'];?>"  placeholder="Email">
                    </div>
                </div>
								<div class="form-group">
									<label for="sel1">Alamat</label>
									<textarea name="alamat" class="form-control" id="alamat"  cols="30" rows="5" placeholder="Alamat" required><?php echo $rows['alamat'];?></textarea>
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

                $query = mysqli_query($conn, "UPDATE admin SET nama_admin='$nm_admin',email='$email' ,alamat='$alamat' WHERE username='$username'");
                if ($query) {
                  echo "<script>alert('Berhasil Ubah Data SPV')</script>";
                  echo "<script>window.location = 'index.php?page=11'</script>";
                }else{
                  echo "<script>alert('Gagal Ubah Data SPV')</script>";
                  echo "<script>window.location = 'index.php?page=13&&usr=$username'</script>";
                }
              }

              ?>
