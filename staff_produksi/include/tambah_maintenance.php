		<h1>
            Input Data Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Mainetanance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Input Data Maintenance</a></li>
          </ol>
<hr>

      <?php  
        $query="select * from maintenance order by id_maintenance desc limit 1";
        $baris=mysqli_query($conn,$query);
        if($baris){
          if(mysqli_num_rows($baris)>0){
            $auto=mysqli_fetch_array($baris);
            $kode=$auto['id_maintenance'];
            $baru=substr($kode,1,4);
              //$nilai=$baru+1;
              $nol=(int)$baru;
          } 
          else{
            $nol=0;
            }
          $nol=$nol+1;
          $nol2="";
          $nilai=4-strlen($nol);
          for ($i=1;$i<=$nilai;$i++){
            $nol2= $nol2."0";
            }

            $kode2 ="M".$nol2.$nol;
            
        }
        else{
        echo mysqli_error($conn);
        }

      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Input Data Maintenance</h2></center>
				
      <a href="index.php?page=2" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $kode2; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Pegawai</label>
                      <select name="id_pegawai" id="id_pegawai" class="form-control">
                        <option value="">-- Pilih Pegawai --</option>
                        <?php  
                        $sqli = mysqli_query($conn,"SELECT * FROM pegawai");
                         if (mysqli_num_rows($sqli) > 0) {
                           if ($sqli) {
                             while ($peg = mysqli_fetch_array($sqli)) {
                               echo "<option value='$peg[id_pegawai]'>$peg[nama_pegawai] - $peg[id_pegawai]</option>";
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

            
            if($id_pegawai == ""){
                echo "<script>alert('Pegawai Harus dipilih!')</script>";
            }else{
              $query = mysqli_query($conn, "INSERT INTO maintenance VALUES('$kode2','','$id_pegawai','','Belum diproses')");
              if ($query) {
                echo "<script>alert('Berhasil Input Data Maintenance')</script>";
                echo "<script>window.location.href = 'index.php?page=17';</script>";
              }else{
                echo mysqli_error($conn);
              }
            }

          }

            ?>

          