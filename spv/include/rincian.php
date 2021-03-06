<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Rincian Maintenance</h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=0"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=8"><i class="fa fa-cogs"></i> Maintenance</a></li>
        <li><a href=""><i class="fa fa-file"></i> Rincian Maintenance</a></li>
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
 
    <a href="index.php?page=8" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    <br><br>
            

<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Maintenance</h2></center>
    
    <div class="box-body">
      <form action="#" method="post">
        <div class="form-group">
          <label for="sel1">ID Maintenance *</label>
          <input type="text" class="form-control" name="id_mainetanance" value="<?php echo $rows['id_maintenance']; ?>" readonly="readonly" placeholder="ID Maintenance">
        </div>
        <div class="form-group">
          <label for="sel1">Tanggal Maintenance</label>
          <input type="date" class="form-control" name="tgl_maintenance" id="tgl_maintenance" value="<?php echo $rows['tgl_maintenance']; ?>" placeholder="Tanggal Maintenance" readonly="readonly">
        </div>
        <div class="form-group">
          <label for="sel1">Pegawai</label>
          <select name="id_pegawai" id="id_pegawai" class="form-control" disabled>
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
         <div class="form-group">
          <label for="sel1">Tanggal Maintenance Selanjutnya</label>
          <input type="date" class="form-control" name="tgl_maintenance_sel" id="tgl_maintenance_sel" placeholder="Tanggal Maintenance Selanjutnya" value="<?php echo $rows['tgl_maintenance_selanjutnya']?>" readonly="readonly">
        </div>
    </div>
    </form>
</div>

<hr>

    
<div class="box box-info">
    <center><h2>Rincian Data Maintenance</h2></center>
        
    <a href="index.php?page=12&&id_maintenance=<?php echo $id_maintenance; ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Input Rincian Data Maintenance</a><br><br>

    <table id="barang" class="row-border" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Alat</th>
                    <th>Nama Alat</th>
                    <th>ID Keruskan</th>
                    <th>Nama Kerusakan</th>
                    <th>Solusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID Alat</th>
                    <th>Nama Alat</th>
                    <th>ID Keruskan</th>
                    <th>Nama Kerusakan</th>
                    <th>Solusi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
            <?php  
            $query = mysqli_query($conn,"SELECT a.*,b.*, c.* FROM alat a, Kerusakan b, alat_kerusakan c WHERE a.id_alat=c.id_alat AND b.id_kerusakan=c.id_kerusakan AND c.id_maintenance='$id_maintenance' ORDER BY  c.id_maintenance DESC");
            if ($query) {
                if (mysqli_num_rows($query)>0) {
                    $no = 1;
                    while ($rows = mysqli_fetch_array($query)) {
    ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $rows['id_alat']; ?></td>
                    <td><?php echo $rows['nama_alat']; ?></td>
                    <td><?php echo $rows['id_kerusakan']; ?></td>
                    <td><?php echo $rows['nama_kerusakan']; ?></td>
                    <td><?php echo $rows['solusi']; ?></td>
                    <td>
                        <a style="margin: 3px;" class="btn btn-success col-sm-12" href="index.php?page=13&&id_maintenance=<?php echo $rows['id_maintenance']; ?>&&id_ka=<?php echo $rows['id_ka']; ?>"><i class="fa fa-pencil"></i> Edit</a> 
                        <a style="margin: 3px;" class="btn btn-danger col-sm-12" href="#" data-toggle="modal" data-target="#confirm-delete_<?php echo $rows['id_ka']; ?>"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>

                <div class="modal fade" id="confirm-delete_<?php echo $rows['id_ka'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                Hapus Data Rincian Maintenance
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin menghapus Data Rincian Maintenance?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <a class="btn btn-danger btn-ok" id="<?php echo $rows['id_ka'] ;?>" href="include/hapus_rincian.php?id_ka=<?php echo $rows['id_ka']; ?>&&id_maintenance=<?php echo $rows['id_maintenance']; ?>">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
                $no++;
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>


<script>
	$(document).ready(function() {
	    $('#barang').DataTable();
	} );

    
    $(".btn btn-danger").click(function(e) {
      var id = $(this).attr('id');
      var modal_id = "confirm-delete_"+id;
      $("#"+modal_id).modal('hide');
    });
</script>