<style>
    .box{
        padding: 10px;
    }
</style>

<h1>Alat</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-magic"></i> Alat</a></li>
      </ol>

<hr>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Daftar Alat</h2></center>

<a href="index.php?page=3" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Tambah Alat</a><br><br>

<table id="alat" class="row-border" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>No</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Keterangan Alat</th>
                <!-- <th>Jenis Alat</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Keterangan Alat</th>
                <!-- <th>Jenis Alat</th> -->
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
		<?php
		$query = mysqli_query($conn,"SELECT * FROM alat");
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$no = 1;
				while ($rows = mysqli_fetch_array($query)) {
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rows['id_alat']; ?></td>
				<td><?php echo $rows['nama_alat']; ?></td>
        <td><?php echo $rows['keterangan']; ?></td>
        
                <td>
                    <a class="btn btn-success" href="index.php?page=4&&id_alat=<?php echo $rows['id_alat']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#confirm-delete_<?php echo $rows['id_alat']; ?>"><i class="fa fa-trash"></i> Hapus</a>
                </td>
			</tr>

            <div class="modal fade" id="confirm-delete_<?php echo $rows['id_alat'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Hapus Alat
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin menghapus alat ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger btn-ok" id="<?php echo $rows['id_alat'] ;?>" href="include/hapus.php?id_alat=<?php echo $rows['id_alat']; ?>">Hapus</a>
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
	    $('#alat').DataTable();
	} );

    $(".btn btn-danger").click(function(e) {
      var id = $(this).attr('id');
      var modal_id = "confirm-delete_"+id;
      $("#"+modal_id).modal('hide');
    });


</script>
