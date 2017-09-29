			   <h1>
            Ubah Status Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Pengajuan Maintenance</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Ubah Status Maintanance</a></li>
          </ol>

<hr>

      <?php
        $query_updt = mysqli_query($conn,"SELECT a.*, b.* FROM maintenance a, admin b WHERE id_maintenance='$id_maintenance' AND b.nama_admin=a.id_pegawai");
        if ($query_updt) {
          if (mysqli_num_rows($query_updt)>0) {
            $rows = mysqli_fetch_array($query_updt);
          } else echo mysqli_error($conn);
        }else echo mysqli_error($conn);
      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Ubah Status Maintenance</h2></center>

            <a href="index.php?page=8" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>


              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Ubah Status Maintenance</h3>

                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Maintenance *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $rows['id_maintenance']; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Tanggal Pengajuan Maintenance</label>
                      <input type="date" class="form-control" name="tgl_peng_maintenance" id="tgl_peng_maintenance" value="<?php echo $rows['tgl_peng_maintenance']; ?>" placeholder="Tanggal Maintenance" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Pegawai</label>
                      <input type="text" name="id_pegawai" value="<?php echo $rows['nama_admin']; ?>" class="form-control" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Tanggal Maintenance</label>
                      <input type="date" class="form-control" name="tgl_maintenance" id="tgl_maintenance" placeholder="Tanggal Maintenance Selanjutnya" value="<?php echo $rows['tgl_maintenance']?>" required>
                    </div>
                </div>
                <div class="box-footer clearfix">
                  <button type="submit" class="pull-right btn btn-info col-sm-12"  name="simpan"><i class="fa fa-pencil"></i> Klik untuk Ubah Status </a>
                </div>
                </form>
              </div>




<?php

if (isset($_POST['simpan'])) {
  foreach ($_POST as $key => $value) {
    ${$key} = $value;
  }

  if ($tgl_maintenance < $tgl_peng_maintenance) {
    echo "alert('Tanggal Maintenance Tidak Boleh Lebih Kecil Dari Tanggal Pengajuan Maintenance!')";
  }

  $sql = mysqli_query($conn, "UPDATE maintenance SET status='servis',tgl_maintenance='$tgl_maintenance' WHERE id_maintenance='$id_maintenance'");
  if ($sql) {
    echo "<script>alert('Berhasil Ubah Status Maintenance menjadi Servis')</script>";
    echo "<script>window.location = 'index.php?page=8'</script>";
  }echo mysqli_error($conn);
}

?>
