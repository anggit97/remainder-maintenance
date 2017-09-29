<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Pegawai</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-user"></i> Pegawai</a></li>
      </ol>
      
<hr>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Daftar Pegawai</h2></center>

<a href="index.php?page=6" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Tambah Pegawai</a><br><br>

<table id="barang" class="row-border" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
		<?php  
		$query = mysqli_query($conn,"SELECT * FROM pegawai");
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$no = 1;
				while ($rows = mysqli_fetch_array($query)) {
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rows['id_pegawai']; ?></td>
				<td><?php echo $rows['nama_pegawai']; ?></td>
				<td><?php echo $rows['alamat']; ?></td>
				<td><?php echo $rows['no_telp']; ?></td>
                <td>
                    <a class="btn btn-success" href="index.php?page=7&&id_pegawai=<?php echo $rows['id_pegawai']; ?>">Edit</a> 
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#confirm-delete_<?php echo $rows['id_pegawai']; ?>">Hapus</a>
                </td>
			</tr>

            <div class="modal fade" id="confirm-delete_<?php echo $rows['id_pegawai'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Hapus Data Pegawai
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin menghapus Data Pegawai?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger btn-ok" id="<?php echo $rows['id_pegawai'] ;?>" href="include/hapus_pegawai.php?id_pegawai=<?php echo $rows['id_pegawai']; ?>">Hapus</a>
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