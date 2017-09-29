<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Maintenance</h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=0"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href=""><i class="fa fa-cogs"></i> Daftar Pengajuan Maintenance</a></li>
      </ol>

<hr>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Maintenance</h2></center>


<table id="barang" class="row-border" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>ID Maintenance</th>
                <th>Tanggal Pengajuan Maintenance</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Maintenance</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Maintenance</th>
                <th>Tanggal Maintenance</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Maintenance Selanjutnya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
		<?php
		$query = mysqli_query($conn,"SELECT a.*,b.* FROM maintenance a, admin b WHERE a.id_pegawai=b.nama_admin ORDER BY  id_maintenance DESC");

		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$no = 1;
                //$id = mysqli_fetch_array($query);
                // $sqla_k = mysqli_query($conn, "SELECT * FROM alat_kerusakan WHERE id_maintenance = '$id[id_maintenance]'");
                // if (mysqli_num_rows($sqla_k) > 0) {
                   while ($rows = mysqli_fetch_array($query)) {

?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rows['id_maintenance']; ?></td>
				<td><?php echo date('d F,Y',strtotime($rows['tgl_peng_maintenance'])); ?></td>
				<td><?php echo $rows['nama_admin']; ?></td>
                <td>
                <?php
                    if ($rows['tgl_maintenance'] == "") {
                        echo "Belum Diisi";
                    }else{
                        echo date('d F,Y',strtotime($rows['tgl_maintenance']));
                    }
                ?>
                </td>
                <th><?php echo $rows['status']; ?></th>
                <td>
                    <a style="margin: 3px;" class="btn btn-info col-sm-12" href="index.php?page=10&&id_maintenance=<?php echo $rows['id_maintenance']; ?>"><i class="fa fa-file"></i> Ubah Status</a>
                </td>
			</tr>

            <div class="modal fade" id="confirm-delete_<?php echo $rows['id_maintenance'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Hapus Data Maintenance
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin menghapus Data Maintenance?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger btn-ok" id="<?php echo $rows['id_maintenance'] ;?>" href="include/hapus_maintenance.php?id_maintenance=<?php echo $rows['id_maintenance']; ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
			$no++;
				}
            //}
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
