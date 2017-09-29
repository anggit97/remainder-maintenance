		<h1>
            Input Data Rincian Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Mainetanance</a></li>
            <li><a href="#"><i class="fa fa-file"></i> Rincian Data Maintenance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Input Rincian Data Maintenance</a></li>
          </ol>
<hr>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Input Data Maintenance</h2></center>
				
      <a href="index.php?page=10&&id_maintenance=<?php echo $id_maintenance; ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
			 <br><br>

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Form Input Data Miantenance</h3>
                  
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Maintenance *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $id_maintenance; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Alat</label>
                      <select name="id_alat" id="id_alat" class="form-control">
                        <option value="">-- Pilih Alat --</option>
                        <?php  
                        $sqli = mysqli_query($conn,"SELECT * FROM alat");
                         if (mysqli_num_rows($sqli) > 0) {
                           if ($sqli) {
                             while ($peg = mysqli_fetch_array($sqli)) {
                               echo "<option value='$peg[id_alat]'>$peg[nama_alat] - $peg[id_alat]</option>";
                             }
                           }else echo mysqli_error($conn);
                         }else echo mysqli_error($conn);
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Kerusakan</label>
                      <select name="id_kerusakan" id="id_kerusakan" class="form-control">
                        <option value="">-- Pilih Kerusakan --</option>
                        <?php  
                        $sqli = mysqli_query($conn,"SELECT * FROM kerusakan");
                         if (mysqli_num_rows($sqli) > 0) {
                           if ($sqli) {
                             while ($peg = mysqli_fetch_array($sqli)) {
                               echo "<option value='$peg[id_kerusakan]'>$peg[nama_kerusakan] - $peg[id_kerusakan]</option>";
                             }
                           }else echo mysqli_error($conn);
                         }else echo mysqli_error($conn);
                        ?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="sel1">Solusi</label>
                      <textarea name="solusi" id="solusi" class="form-control" cols="30" rows="10" placeholder="Solusi"></textarea>
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

            
            if ($id_alat == "") {
                echo "<script>alert('Alat harus dipilih!')</script>";
            }elseif($id_kerusakan == ""){
                echo "<script>alert('Kerusakan Harus dipilih!')</script>";
            }elseif($solusi == ""){
                echo "<script>alert('Solusi Harus diisi!')</script>";
            }else{
              $query = mysqli_query($conn, "INSERT INTO alat_kerusakan VALUES(null,'$id_mainetanance','$id_alat','$id_kerusakan','$solusi')");
              if ($query) {
                echo "<script>alert('Berhasil Input Data Rincian Maintenance')</script>";
                echo "<script>window.location.href = 'index.php?page=10&&id_maintenance=$id_maintenance';</script>";
              }else{
                echo mysqli_error($conn);
              }
            }

          }

            ?>

          