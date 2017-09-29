<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Data Pengajuan Maintenance</h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=0"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href=""><i class="fa fa-files-o"></i> Data Pengajuan Maintenance</a></li>
      </ol>
      
<hr>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Data Pengajuan Maintenance</h2></center>


<table id="barang" class="row-border" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>ID Maintenance</th>
                <th>Tanggal Maintenance</th>
                <th>Kode Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Maintenance Selanjutnya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Maintenance</th>
                <th>Tanggal Maintenance</th>
                <th>Kode Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Maintenance Selanjutnya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
		<?php  
		$query = mysqli_query($conn,"SELECT a.*,b.* FROM maintenance a, pegawai b WHERE a.id_pegawai=b.id_pegawai ORDER BY  id_maintenance DESC");
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$no = 1;
				while ($rows = mysqli_fetch_array($query)) {
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rows['id_maintenance']; ?></td>
				<td><?php 
                    
                    if ($rows['tgl_maintenance'] == "") {
                        echo "<center>-</center>";
                    }else{
                        echo date('d F,Y',strtotime($rows['tgl_maintenance'])); 
                    }
    
                ?></td>
				<td><?php echo $rows['id_pegawai']; ?></td>
				<td><?php echo $rows['nama_pegawai']; ?></td>
                <td><?php 

                     if ($rows['tgl_maintenance'] == "") {
                        echo "<center>-</center>";
                    }else{
                        echo date('d F,Y',strtotime($rows['tgl_maintenance_selanjutnya'])); 
                    }
               

                ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td>
                    <a style="margin: 3px;" class="btn btn-info col-sm-12" href="index.php?page=10&&id_maintenance=<?php echo $rows['id_maintenance']; ?>"><i class="fa fa-file"></i> Pengajuan Maintenance</a>
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