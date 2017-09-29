			   <h1>
            Ubah Data Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Maintenance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Ubah Data Maintanance</a></li>
          </ol>
      
<hr>

      <?php  
        $query_updt = mysqli_query($conn,"SELECT a.*, b.* FROM maintenance a, pegawai b WHERE id_maintenance='$id_maintenance' AND b.id_pegawai=a.id_pegawai");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);
      ?>
  
      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Ubah Data Pegawai</h2></center>
				
            <a href="index.php?page=8" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>
			 

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Data Pegawai</h3>
                  
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Maintenance *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $rows['id_maintenance']; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Pegawai</label>
                      <select name="id_pegawai" id="id_pegawai" class="form-control">
                        <option value="">-- Pilih Pegawai --</option>
                        <?php  
                        $sqli = mysqli_query($conn,"SELECT * FROM pegawai");
                         if (mysqli_num_rows($sqli) > 0) {
                           if ($sqli) {
                            $id_peg = $rows['id_pegawai'];
                            $select = "";
                             while ($peg = mysqli_fetch_array($sqli)) {
                               if ($peg['id_pegawai'] == $id_peg) {
                                 $select = "selected";
                               }else{
                                 $select = "";
                               }
                               echo "<option value='$peg[id_pegawai]' $select>$peg[nama_pegawai] - $peg[id_pegawai]</option>";
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
                  ${$key} = $value;
                }

                if($id_pegawai == ""){
                    echo "<script>alert('Pegawai Harus dipilih!')</script>";
                }else{
                    $query = mysqli_query($conn, "UPDATE maintenance SET id_pegawai='$id_pegawai' WHERE id_maintenance='$id_maintenance'");
                    if ($query) {
                      echo "<script>alert('Berhasil Ubah Data Maintenance')</script>";
                      echo "<script>window.location = 'index.php?page=8'</script>";
                    }else{
                      echo "<script>alert('Gagal Ubah Data Maintenance')</script>";
                      echo "<script>window.location = 'index.php?page=11&&id_maintenance=$id_maintenance'</script>";
                    }
                }
              }

              ?>

          