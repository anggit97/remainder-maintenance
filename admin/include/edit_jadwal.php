			   <h1>
            Ubah Jadwal Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Maintenance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Ubah Jadwal Maintanance</a></li>
          </ol>

<hr>

      <?php
        $query_updt = mysqli_query($conn,"SELECT * FROM jadwal where id_jadwal='$id_jadwal';");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);
      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Ubah Jadwal Maintenance</h2></center>

            <a href="index.php?page=17" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>


              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Jadwal Maintenance</h3>

                </div>
								<div class="box-body">
									<form action="#" method="post">
										<div class="form-group">
											<label for="sel1">ID Jadwal *</label>
											<input type="text" class="form-control" name="id_mainetanance" value="<?php echo $rows['id_jadwal']; ?>" readonly="readonly" placeholder="ID Maintenance">
										</div>
										<div class="form-group">
											<label for="sel1">Periode Maintenance</label>
											<select name="periode" id="" class="form-control">
												<option value="" disabled selected>-- Pilih Periode --</option>
												<option value="1">Per 1 Bulan</option>
												<option value="3">Per 3 Bulan</option>
												<option value="6">Per 6 Bulan</option>
												<option value="12">Per 12 Bulan</option>
											</select>
										</div>
										<div class="form-group">
											<label for="sel1">Hari Maintenance</label>
											<select name="hari" id="" class="form-control">
												<option value="" disabled selected>-- Pilih Hari --</option>
												<option value="senin">Senin</option>
												<option value="selasa">Selasa</option>
												<option value="rabu">Rabu</option>
												<option value="kamis">Kamis</option>
												<option value="jumat">Jumat</option>
											</select>
										</div>
										<div class="form-group">
											<label for="sel1">Lama Maintenance (Satu kali maintenance)</label>
											<select name="lama" id="" class="form-control">
												<option value="" disabled selected>-- Pilih Lama Perawatan --</option>
												<option value="1">1 jam</option>
												<option value="2">2 jam</option>
												<option value="3">3 jam</option>
											</select>
										</div>
										<div class="form-group">
											<label for="sel1">Alat</label>
											<select name="alat" id="" class="form-control">
												<option value="" disabled selected>-- Pilih Alat --</option>
												<?php
												$sql = mysqli_query($conn, "SELECT * FROM alat");
												while ($s = mysqli_fetch_array($sql)) {
												?>
												<option value="<?php echo $s['id_alat']; ?>"><?php echo $s['id_alat']." - ".$s['nama_alat']; ?></option>
												<?php
												}
												?>
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

                if($id_jadwal == ""){
                    echo "<script>alert('Jadwal Harus dipilih!')</script>";
                }else{
                    $query = mysqli_query($conn, "UPDATE jadwal SET periode='$periode', hari='$hari', waktu_perawatan='$lama', id_alat='$alat' WHERE id_jadwal='$id_jadwal'");
                    if ($query) {
                      echo "<script>alert('Berhasil Ubah Jadwal Maintenance')</script>";
                      echo "<script>window.location = 'index.php?page=17'</script>";
                    }else{
                      echo "<script>alert('Gagal Ubah Jadwal Maintenance')</script>";
                      echo "<script>window.location = 'index.php?page=25&&id_jadwal=$id_jadwal'</script>";
                    }
                }
              }

              ?>
