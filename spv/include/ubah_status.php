			   <h1>
            Ubah Status Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-magic"></i> Pengajuan Maintenance</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Ubah Status Maintanance</a></li>
          </ol>

<hr>

      <?php
        $query_updt = mysqli_query($conn,"SELECT a.*, b.* FROM maintenance a, admin b WHERE id_maintenance='$id_maintenance' AND b.username=a.id_pegawai");
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
                  <h3 class="box-title">Ubah Data Pegawai</h3>

                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Maintenance *</label>
                      <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $rows['id_maintenance']; ?>" readonly="readonly" placeholder="ID Maintenance">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Tanggal Pengajuan Maintenance</label>
                      <input type="date" class="form-control" name="tgl_maintenance" id="tgl_maintenance" value="<?php echo $rows['tgl_peng_maintenance']; ?>" placeholder="Tanggal Maintenance" readonly="readonly">
                    </div>

                    <div class="form-group">
                      <label for="sel1">Pegawai</label>
                      <input type="text" name="id_pegawai" value="<?php echo $rows['nama_admin']; ?>" class="form-control" readonly="readonly">
                    </div>
                     <div class="form-group">
                      <label for="sel1">Tanggal Maintenance</label>
                      <input type="date" class="form-control" name="tgl_maintenance_sel" id="tgl_maintenance_sel" placeholder="Tanggal Maintenance Selanjutnya" value="<?php echo $rows['tgl_maintenance']?>" readonly="readonly">
                    </div>
                </div>
                <div class="box-footer clearfix">
                  <a class="pull-right btn btn-info col-sm-12" href="#" name="simpan" data-toggle="modal" data-target="#confirm-status" ><i class="fa fa-pencil"></i> Klik untuk Ubah Status </a>
                </div>
                </form>
              </div>



<div class="modal fade" id="confirm-status" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Ubah Status Maintenance
            </div>
            <div class="modal-body">
                Apakah anda yakin mengubah Status Maintenance menjadi Proses?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a class="btn btn-info btn-ok" id="<?php echo $rows['id_maintenance'] ;?>" href="include/proses_ubah_status.php?id_maintenance=<?php echo $rows['id_maintenance']; ?>">Proses Maintenance</a>
            </div>
        </div>
    </div>
</div>
