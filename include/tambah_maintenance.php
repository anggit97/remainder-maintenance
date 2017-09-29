			<h1>
            Input Data Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Mainetanance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Input Data Maintenance</a></li>
          </ol>
      
<hr>

      <?php  
        $query="select * from alat order by id_alat desc limit 1";
        $baris=mysqli_query($conn,$query);
        if($baris){
          if(mysqli_num_rows($baris)>0){
            $auto=mysqli_fetch_array($baris);
            $kode=$auto['id_alat'];
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

            $kode2 ="A".$nol2.$nol;
            
        }
        else{
        echo mysqli_error();
        }

      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Tambah Alat</h2></center>
				
      <a href="index.php?page=2" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
			 <br><br>

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Tambah Alat</h3>
                  
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">Kode Alat *</label>
                      <input type="text" class="form-control" name="kd_barang" value="<?php echo $kode2; ?>" readonly="readonly" placeholder="Kode Alat">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama Alat</label>
                      <input type="text" class="form-control" name="nm_barang" id="nm_barang" placeholder="Nama Alat">
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

            
            if ($nm_barang == "") {
                echo "<script>alert('Nama Alat Harus diisi!')</script>";
              }else{
                $query = mysqli_query($conn, "INSERT INTO Alat VALUES('$kode2','$nm_barang')");
                if ($query) {
                  echo "<script>alert('Berhasil Tambah Alat')</script>";
                  echo "<script>window.location.href = 'index.php?page=2';</script>";
                }else{
                  echo "<script>alert('Gagal Tambah Alat')</script>";
                }
              }

          }

            ?>

          