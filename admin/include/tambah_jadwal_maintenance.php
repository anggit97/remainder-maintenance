		<h1>
            Input Jadwal Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Mainetanance</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Input Jadwal Maintenance</a></li>
          </ol>
<hr>

      <?php
        $query="select * from jadwal order by id_jadwal desc limit 1";
        $baris=mysqli_query($conn,$query);
        if($baris){
          if(mysqli_num_rows($baris)>0){
            $auto=mysqli_fetch_array($baris);
            $kode=$auto['id_jadwal'];
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

            $kode2 ="J".$nol2.$nol;

        }
        else{
        echo mysqli_error($conn);
        }

      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Input Jadwal Maintenance</h2></center>

      <a href="index.php?page=17" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
			 <br><br>

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Form Input Jadwal Miantenance</h3>

                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Jadwal *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $kode2; ?>" readonly="readonly" placeholder="ID Maintenance">
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
              echo ${$key} = $value;
            }


            $tahun  = date("Y");

            if ($periode == "") {
                echo "<script>alert('Periode Harus diisi!')</script>";
            }elseif($hari == ""){
                echo "<script>alert('Hari Harus dipilih!')</script>";
            }elseif($lama == ""){
                echo "<script>alert('Lama Maintenance Harus diisi!')</script>";
            }elseif($alat == ""){
                echo "<script>alert('Alat Maintenance Harus diisi!')</script>";
            }else{
              $query = mysqli_query($conn, "INSERT INTO jadwal VALUES('$kode2','$periode','$hari','$lama','$alat','$tahun')");
              if ($query) {
                echo "<script>alert('Berhasil Input Jadwal Maintenance')</script>";
                echo "<script>window.location.href = 'index.php?page=17';</script>";
              }else{
                echo mysqli_error($conn);
              }
            }

          }

            ?>
