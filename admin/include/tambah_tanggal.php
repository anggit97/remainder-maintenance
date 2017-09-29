		<h1>
            Input Tanggal Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Mainetanance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Input Tanggal Maintenance</a></li>
          </ol>
<hr>
      

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Input Data Maintenance</h2></center>
				
      <a href="index.php?page=2" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
			 <br><br>

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Form Tanggal Miantenance</h3>
                  
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Maintenance *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $id_maintenance; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Tanggal Maintenance</label>
                      <input type="date" class="form-control" name="tgl_maintenance" id="tgl_maintenance" placeholder="Tanggal Maintenance">
                    </div>
                     <div class="form-group">
                      <label for="sel1">Tanggal Maintenance Selanjutnya</label>
                      <input type="date" class="form-control" name="tgl_maintenance_sel" id="tgl_maintenance_sel" placeholder="Tanggal Maintenance Selanjutnya">
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
              echo ${$key} = $value;
            }

            
            if ($tgl_maintenance == "") {
                echo "<script>alert('Tanggal Maintenance Harus diisi!')</script>";
            }elseif($tgl_maintenance_sel == ""){
                echo "<script>alert('Tanggal Maintenance Selanjutnya Harus diisi!')</script>";
            }elseif($tgl_maintenance_sel <= $tgl_maintenance){
                echo "<script>alert('Tanggal Maintenance Selanjutnya Harus Lebih Besar dari Tanggal Maintenance!')</script>";
            }else{
              $query = mysqli_query($conn, "UPDATE maintenance 
                SET tgl_maintenance='$tgl_maintenance', tgl_maintenance_selanjutnya='$tgl_maintenance_sel', status='diproses' 
                WHERE id_maintenance='$id_maintenance'");
              if ($query) {
                echo "<script>alert('Berhasil Input Tanggal Maintenance')</script>";
                echo "<script>window.location.href = 'index.php?page=10&&id_maintenance=$id_maintenance';</script>";
              }else{
                echo mysqli_error($conn);
              }
            }

          }

            ?>

          