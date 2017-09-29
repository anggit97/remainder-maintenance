    <h1>
            Tambah Pegawai
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Pegawai</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Tambah Pegawai</a></li>
          </ol>
      
<hr>


      <?php  
        $query="select * from pegawai order by id_pegawai desc limit 1";
        $baris=mysqli_query($conn,$query);
        if($baris){
          if(mysqli_num_rows($baris)>0){
            $auto=mysqli_fetch_array($baris);
            $kode=$auto['id_pegawai'];
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

            $kode2 ="P".$nol2.$nol;
            
        }
        else{
        echo mysqli_error();
        }

      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Tambah Pegawai</h2></center>
				

			      <a href="index.php?page=5" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Tambah Pegawai</h3>
                
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Pegawai *</label>
                      <input type="text" class="form-control" name="id_pegawai" readonly="readonly" value="<?php echo $kode2; ?>" placeholder="ID Pegawai">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama</label>
                      <input type="text" class="form-control" name="nm_pegawai" id="nm_pegawai" placeholder="Nama Pegawai">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Alamat</label>
                      <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="sel1">No Telp</label>
                      <input type="tel" class="form-control" name="telp" placeholder="No Telp">
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

                if ($nm_pegawai == "") {
                  echo "<script>alert('Nama Pegawai Tidak Boleh Kosong!')</script>";
                }elseif ($alamat == "") {
                  echo "<script>alert('Alamat Tidak Boleh Kosong!')</script>";
                }elseif ($telp == "") {
                  echo "<script>alert('No Telp Pegawai Tidak Boleh Kosong!')</script>";
                }else{
                  $query = mysqli_query($conn, "INSERT INTO pegawai VALUES('$id_pegawai','$nm_pegawai','$alamat','$telp')");
                  if ($query) {
                    echo "<script>alert('Berhasil Tambah Karyawan')</script>";
                    echo "<script>window.location.href = 'index.php?page=5';</script>";
                  }else{
                    echo "<script>alert('Gagal Tambah Karyawan')</script>";
                    header("Refresh:0");
                  }
                }

              }

              ?>

          