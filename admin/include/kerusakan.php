<style>
    .box{
        padding: 10px;
    }
</style>

<h1>Kerusakan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bolt"></i> Kerusakan</a></li>
      </ol>
      
<hr>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Daftar Jenis Kerusakan</h2></center>

<a href="index.php?page=15" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Tambah Data Jenis Kerusakan</a><br><br>

<table id="barang" class="row-border" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>ID Kerusakan</th>
                <th>Nama Kerusakan</th>
                <th>Deskripsi Kerusakan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Kerusakan</th>
                <th>Nama Kerusakan</th>
                <th>Deskripsi Kerusakan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
		<?php  
		$query = mysqli_query($conn,"SELECT * FROM kerusakan");
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$no = 1;
				while ($rows = mysqli_fetch_array($query)) {
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rows['id_kerusakan']; ?></td>
				<td><?php echo $rows['nama_kerusakan']; ?></td>
				<td><?php echo $rows['deskripsi']; ?></td>
                <td>
                    <a class="btn btn-success" href="index.php?page=16&&id_kerusakan=<?php echo $rows['id_kerusakan']; ?>">Edit</a> 
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#confirm-delete_<?php echo $rows['id_kerusakan']; ?>">Hapus</a>
                </td>
			</tr>

            <div class="modal fade" id="confirm-delete_<?php echo $rows['id_kerusakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Hapus Data Kerusakan
                        </div>
                        <div class="modal-body">
                            Apankah anda yakin menghapus data kerusakan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger btn-ok" id="<?php echo $rows['id_kerusakan']; ?>" href="include/hapus_kerusakan.php?id_kerusakan=<?php echo $rows['id_kerusakan']; ?>">Hapus</a>
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