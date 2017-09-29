<!-- Content Header (Page header) -->

          <h1>
            Laporan Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php?page=2"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php?page=3"><i class="fa fa-item"></i>Laporan Maintenance</a></li>
          </ol>


      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2 style="margin-right: 90px;">Laporan Maintenance</h2></center>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-print"></i> Laporan Maintenance</h3>
        </div>
        <div class="box-body">
          <form action="include/cetak_laporan_po.php" method="get">
              <center><label for="" style="font-size: 20px;margin-right: 90px;">Periode</label></center>
              <div class="col-sm-12 col-md-3 col-md-offset-2">
                <input type="date" name="dr_tgl" id="dr_tgl2" class="form-control">
              </div>
              <div class="col-sm-12 col-md-1">
               <center>S.D</center>
              </div>
              <div class="col-sm-12 col-md-3">
                <input type="date" name="smp_tgl" id="smp_tgl2" class="form-control">
              </div>

              <center><button class="btn btn-warning" id="btn" name="cetak" style="margin-top: 20px;width: 40%;margin-right: 90px;"><i class="fa fa-print"></i> Cetak Laporan Maintenance</button></center>

            </div>
          </form>
        </div>
      </div>

      <script type="text/javascript">
      $(document).ready(function() {

        $('#btn').click(function(e){
          e.preventDefault();
          var dr_tgl2 = $('#dr_tgl2').val();
          var smp_tgl2 = $('#smp_tgl2').val();
          if (new Date(dr_tgl2) > new Date(smp_tgl2)) {
            alert("'Dari tanggal' harus lebih kecil dari 'Sampai Tanggal'!");
          }else if(dr_tgl2 == "" || smp_tgl2 == ""){
            alert('Tidak Boleh Kosong');
          }else{
            window.location = "include/cetak_laporan_maintenance.php?dr_tgl="+dr_tgl2+"&&smp_tgl="+smp_tgl2;
          }
        });


      });
      </script>
