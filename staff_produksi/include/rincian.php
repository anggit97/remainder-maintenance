<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Pengajuan Maintenance</h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=0"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=8"><i class="fa fa-cogs"></i> Maintenance</a></li>
        <li><a href=""><i class="fa fa-file"></i> Rincian Maintenance</a></li>
      </ol>

<hr>

  <?php

        date_default_timezone_set("Asia/Jakarta");
        date_default_timezone_get();

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

 <?php  echo date('m/d/Y'); ?>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Maintenance</h2></center>

    <form action="#" method="post">
      <div class="box-body">
          <div class="form-group">
            <label for="sel1">ID Maintenance *</label>
            <input type="text" class="form-control" name="id_mainetanance" placeholder="ID Maintenance" value="<?php echo $kode2; ?>" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="sel1">Tanggal Pengajuan Maintenance</label>
            <input type="date" class="form-control" name="tgl_pengajuan_maintenance" id="tgl_pengajuan_maintenance"  placeholder="Tanggal Maintenance" readonly="readonly" value="<?php echo date('Y-m-d'); ?>">
          </div>
          <div class="form-group">
            <label for="sel2">Pegawai</label>
            <input type="text" class="form-control" value="<?php echo $data['nama_admin']; ?>" readonly="readonly">
            <input type="hidden" name="id_pegawai" value="<?php echo $data['username']; ?>">
          </div>
          <div class="form-group">
            <label for="sel1">Tanggal Maintenance</label>
            <input type="date" class="form-control" name="tgl_maintenance" id="tgl_maintenance" placeholder="Tanggal Maintenance Selanjutnya" value="<?php echo $rows['tgl_maintenance_selanjutnya']?>" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="sel1">Jadwal Maintenance</label>
            <select name="id_jadwal" id="id_jadwal" class="form-control" required>
              <option value="">-- Pilih Periode Jadwal Maintenance --</option>
              <?php
              $sqli = mysqli_query($conn,"SELECT * FROM jadwal");
               if (mysqli_num_rows($sqli) > 0) {
                 if ($sqli) {
                   while ($jad = mysqli_fetch_array($sqli)) {
                     echo "<option value='$jad[id_jadwal]'>$jad[periode]</option>";
                   }
                 }else echo mysqli_error($conn);
               }else echo mysqli_error($conn);
              ?>
            </select>
          </div>
      </div>

      <hr>
      <center><h2>Input Data Maintenance</h2></center>

      <div class="form-maint">
        <div class="box box-info">
            <div class="xx">
              <div class="yy">
                <div class="box-body">
                  <div class="form-group">
                    <label for="sel1">Alat</label>
                    <select name="id_alat_0" id="id_alat" class="form-control" required>
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
                    <select name="id_kerusakan_0" id="id_kerusakan" class="form-control" required>
                      <option value="">-- Pilih Kerusakan --</option>
                      <?php
                      $sqli = mysqli_query($conn,"SELECT * FROM kerusakan");
                       if (mysqli_num_rows($sqli) > 0) {
                         if ($sqli) {
                           while ($peg = mysqli_fetch_array($sqli)) {
                             echo "<option value='$peg[id_kerusakan]'>$peg[nama_kerusakan] - ID ($peg[id_kerusakan])</option>";
                           }
                         }else echo mysqli_error($conn);
                       }else echo mysqli_error($conn);
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sel1">Keterangan Kerusakan</label>
                    <textarea name="keterangan_0" id="keterangan" class="form-control" placeholder="Keterangan Kerusakan" cols="30" rows="10" required></textarea>
                  </div>
                  
                  <input type="hidden" value="0" id="count" name="count">
                </div>
              </div>
            </div>
        </div>
      </div>

      <a id="tambah" class="btn btn-success col-sm-12 col-md-3" style="margin:5px;"><i class="fa fa-plus"></i> Tambahkan Form Data Maintenance</a>
      <a id="kurang" class="btn btn-danger col-sm-12 col-md-3" style="margin:5px;"><i class="fa fa-minus"></i> Kurangi Form Data Maintenance</a>
      <button type="submit" name="submit" class="btn btn-info col-sm-12 col-md-3" style="margin:5px;"><i class="fa fa-save"></i> Simpan Pengajuan</button>
    </form>


</div>

<hr>


<?php

if (isset($_POST['submit'])) {
  foreach ($_POST as $key => $value) {
    ${$key} = $value;
  }

  if ($id_jadwal == "") {
    echo "<script>alert('Jadwal Maintenance Tidak Boleh Kosong!')</script>";
  }
  
  $sql = mysqli_query($conn,"INSERT INTO maintenance VALUES('$kode2','$tgl_pengajuan_maintenance','$id_pegawai','$tgl_maintenance','Belum Diproses','$id_jadwal')");

  $val = 0;
  for ($i=0; $i <= $count; $i++) {

    $x =  ${'id_alat_' . $i};
    $y =  ${'id_kerusakan_' . $i};
    $z =  ${'keterangan_' . $i};
    
    $sql2 = mysqli_query($conn,"INSERT INTO alat_kerusakan VALUES(null,'$kode2','$x','$y','$z')");
    if ($sql2) {
      $val++;
    }else{
      echo mysqli_error($conn);
    }
  }

  echo "<script>alert('Berhasil Lakukan Pengajuan Maintenance!')</script>";
}

?>

<script>
	$(document).ready(function(e) {

      $('#kurang').hide();
      var count = 0;

	    $('#barang').DataTable();


      $('#tambah').click(function() {
        /* Act on the event */

        count++;

        $.get("include/page.php", function(data){
            $('.yy').append(data);
        });

        $('#kurang').show();

      });

      function HandleDOM_Change () {
      // YOUR CODE HERE.
      $('.yy').find('.box-body').eq(count).find('#id_alat').attr('name', 'id_alat_'+count);
      $('.yy').find('.box-body').eq(count).find('#id_kerusakan').attr('name', 'id_kerusakan_'+count);
      $('.yy').find('.box-body').eq(count).find('#keterangan').attr('name', 'keterangan_'+count);
      $('#count').val(count);
      }

      //--- Narrow the container down AMAP.
      fireOnDomChange ('.yy', HandleDOM_Change, 100);

      function fireOnDomChange (selector, actionFunction, delay)
      {
          $(selector).bind ('DOMSubtreeModified', fireOnDelay);

          function fireOnDelay () {
              if (typeof this.Timer == "number") {
                  clearTimeout (this.Timer);
              }
              this.Timer  = setTimeout (  function() { fireActionFunction (); },
                                          delay ? delay : 333
                                       );
          }

          function fireActionFunction () {
              $(selector).unbind ('DOMSubtreeModified', fireOnDelay);
              actionFunction ();
              $(selector).bind ('DOMSubtreeModified', fireOnDelay);
          }
      }


      $('#kurang').click(function() {
        /* Act on the event */

        count--;

        if (count == 0){
          $('#kurang').hide();
        }

        $(".yy .box-body").last().remove();
      });

	} );


    $(".btn btn-danger").click(function(e) {
      var id = $(this).attr('id');
      var modal_id = "confirm-delete_"+id;
      $("#"+modal_id).modal('hide');
    });
</script>
