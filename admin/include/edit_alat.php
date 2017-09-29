			<h1>
            Ubah Data Alat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Alat</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Ubah Data Alat</a></li>
          </ol>
      
<hr>

      <?php  
        $query_updt = mysqli_query($conn,"SELECT * FROM alat WHERE id_alat='$id_alat'");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);
      ?>
      
      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			
      <a href="index.php?page=2" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
       <br><br>
			 

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Data Alat</h3>
                  
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">Kode Alat *</label>
                      <input type="text" class="form-control" name="kd_barang" readonly="readonly" value="<?php echo $rows['id_alat'];?>" placeholder="Kode Barang">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama Alat</label>
                      <input type="text" class="form-control" name="nm_barang" id="nm_barang" value="<?php echo $rows['nama_alat'];?>"  placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Keterangan Alat</label>
                      <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" placeholder="Keterangan Alat"><?php echo $rows['keterangan'];?></textarea>
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

              $query = mysqli_query($conn, "UPDATE alat SET nama_alat='$nm_barang', keterangan='$keterangan' WHERE id_alat='$kd_barang'");
              if ($query) {
               echo "<script>alert('Berhasil Ubah Data Alat')</script>";
               echo "<script>window.location = 'index.php?page=2'</script>";
              }else{
               echo "<script>alert('Gagal Ubah Data Alat')</script>";
               echo "<script>window.location = 'index.php?page=4&&id_alat=$kd_barang'</script>";
              }
            }
            ?>
          