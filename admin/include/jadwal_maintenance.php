<style>
    .box{
        padding: 10px;
    }
</style>
<h1>Jadwal Maintenance</h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=0"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href=""><i class="fa fa-calendar"></i> Jadwal Maintenance</a></li>
      </ol>

<hr>


<h5><b><?php echo date("l, M Y"); ?></b></h5>
<div class="box box-info">
<center><h2>Jadwal Maintenance</h2></center>

<a href="index.php?page=18" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Input Jadwal Maintenance</a><br><br>

<table id="barang" class="row-border" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Periode</th>
                <th>Hari</th>
                <th>Lama Perawatan</th>
                <th>Id Alat</th>
                <th>Nama Alat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Periode</th>
                <th>Hari</th>
                <th>Lama Perawatan</th>
                <th>Id Alat</th>
                <th>Nama Alat</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
        $query = mysqli_query($conn,"SELECT a.*,b.* FROM jadwal a, alat b WHERE a.id_alat=b.id_alat ORDER BY  id_jadwal DESC");
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                $no = 1;
                while ($rows = mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $rows['id_jadwal']; ?></td>
                <td><?php echo "Per ".$rows['periode']." bulan"; ?></td>
                <td><?php echo $rows['hari']; ?></td>
                <td><?php echo $rows['waktu_perawatan']." Jam"; ?></td>
                <td><?php echo $rows['id_alat']; ?></td>
                <td><?php echo $rows['nama_alat']; ?></td>
                <td>
                    <a style="margin: 3px;" class="btn btn-success col-sm-12" href="index.php?page=25&&id_jadwal=<?php echo $rows['id_jadwal']; ?>"><i class="fa fa-pencil"></i> Edit</a> 
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
