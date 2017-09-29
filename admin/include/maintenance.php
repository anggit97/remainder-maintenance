<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Maintenance</h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=0"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href=""><i class="fa fa-cogs"></i> Maintenance</a></li>
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
		$query = mysqli_query($conn,"SELECT a.*,b.* FROM maintenance a, admin b WHERE a.id_pegawai=b.nama_admin AND (a.status = 'diproses' OR a.status='servis')  and b.role='Staff Produksi' ORDER BY  id_maintenance DESC");
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$no = 1;
				while ($rows = mysqli_fetch_array($query)) {
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rows['id_maintenance']; ?></td>
				<td><?php

                    if ($rows['tgl_peng_maintenance'] == "") {
                        echo "<center>-</center>";
                    }else{
                        echo date('d F,Y',strtotime($rows['tgl_peng_maintenance']));
                    }

                ?></td>
				<td><?php echo $rows['nama_admin']; ?></td>
                <td><?php

                     if ($rows['tgl_maintenance'] == "") {
                        echo "<center>-</center>";
                    }else{
                        echo date('d F,Y',strtotime($rows['tgl_maintenance']));
                    }


                ?></td>
                <th><?php echo $rows['status']; ?></th>
                <td>
                    <a style="margin: 3px;" class="btn btn-info col-sm-12" href="index.php?page=22&&id_maintenance=<?php echo $rows['id_maintenance']; ?>"><i class="fa fa-pencil"></i> Ubah Status</a>
                </td>
			</tr>


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



</script>
