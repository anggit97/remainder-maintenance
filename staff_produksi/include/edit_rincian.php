			   <h1>
            Ubah Data Rincian Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Maintenance</a></li>
            <li><a href="#"><i class="fa fa-file"></i> Rincian Data Maintanance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> pencil Rincian Data Maintanance</a></li>
          </ol>
      
<hr>

      <?php  
        $query_updt = mysqli_query($conn,"SELECT a.*, b.*,c.* FROM kerusakan a, alat b, alat_kerusakan c WHERE id_maintenance='$id_maintenance' AND id_ka='$id_ka' AND c.id_alat=b.id_alat AND a.id_kerusakan=c.id_kerusakan");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);
      ?>
  
      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Ubah Rincian Data Maintenance</h2></center>
				
            <a href="index.php?page=10&&id_maintenance=<?php echo $id_maintenance; ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>
			 

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Data Rincian Maintenance</h3>
                  
                </div>
                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Maintenance *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $rows['id_maintenance']; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Alat</label>
                      <select name="id_alat" id="id_alat" class="form-control">
                        <option value="">-- Pilih Alat --</option>
                        <?php  
                        $sqli = mysqli_query($conn,"SELECT * FROM alat");
                         if (mysqli_num_rows($sqli) > 0) {
                           if ($sqli) {
                            $id_al = $rows['id_alat'];
                            $select1 = "";
                             while ($al = mysqli_fetch_array($sqli)) {
                               if ($al['id_alat'] == $id_al) {
                                 $select1 = "selected";
                               }else{
                                 $select1 = "";
                               }
                               echo "<option value='$al[id_alat]' $select1>$al[nama_alat] - $al[id_alat]</option>";
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
                            $id_ker = $rows['id_kerusakan'];
                            $select2 = "";
                             while ($ker = mysqli_fetch_array($sqli)) {
                               if ($ker['id_kerusakan'] == $id_ker) {
                                 $select2 = "selected";
                               }else{
                                 $select2 = "";
                               }
                               echo "<option value='$ker[id_kerusakan]' $select2>$ker[nama_kerusakan] - $ker[id_kerusakan]</option>";
                             }
                           }else echo mysqli_error($conn);
                         }else echo mysqli_error($conn);
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
                  echo ${$key} = $value;
                }

                if ($id_alat == "") {
                    echo "<script>alert('Alat harus dipilih!')</script>";
                }elseif($id_kerusakan == ""){
                    echo "<script>alert('Kerusakan Harus dipilih!')</script>";
                }else{
                    $query = mysqli_query($conn, "UPDATE alat_kerusakan SET id_alat='$id_alat',id_kerusakan='$id_kerusakan',solusi='$solusi' WHERE id_ka='$id_ka'");
                    if ($query) {
                      echo "<script>alert('Berhasil Ubah Data Rincian Maintenance')</script>";
                      echo "<script>window.location = 'index.php?page=10&&id_maintenance=$id_maintenance'</script>";
                    }else{
                      echo "<script>alert('Gagal Ubah Data Rincian Maintenance')</script>";
                      echo "<script>window.location = 'index.php?page=13&&id_maintenance=M0002&&id_ka=3'</script>";
                    }
                }
              }

              ?>

          