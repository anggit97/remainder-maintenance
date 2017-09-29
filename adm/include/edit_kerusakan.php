			<h1>Edit Data Jenis Kerusakan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bolt"></i> Kerusakan</a></li>
        <li><a href="#"><i class="fa fa-pencil"></i> Edit Data Jenis Kerusakan</a></li>
      </ol>
      
<hr>


      <?php  
        $query=mysqli_query($conn,"select * from kerusakan where id_kerusakan='$id_kerusakan'");
        if ($query) {
          
            $row = mysqli_fetch_array($query);
          
        }else echo mysqli_error($conn);

      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Edit Data Jenis Kerusakan</h2></center>
				
            <a href="index.php?page=14" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>
			 

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Edit Data Customer</h3>
                
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Kerusakan</label>
                      <input type="text" class="form-control" readonly="readonly" name="id_customer" placeholder="ID Kerusakan" value="<?php echo $row['id_kerusakan']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama Customer</label>
                      <input type="text" class="form-control" name="nm_customer" placeholder="Nama Kerusakan" value="<?php echo $row['nama_kerusakan']; ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="sel1">Deskripsi Kerusakan</label>
                      <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Kerusakan"><?php echo $row['deskripsi']; ?></textarea>
                    </div>
                  
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-primary" name="simpan" id="simpan">Simpan <i class="fa fa-arrow-circle-right"></i></button>
                </div>
                </form>
            </div>


            <?php
              if (isset($_POST['simpan'])) {
                  foreach ($_POST as $key => $value) {
                    ${$key} = $value;
                  }

                  if ($nm_customer == "" || $deskripsi == ""){
                    echo "<script>alert('Tidak Boleh ada field yang kosong!')</script>";
                    echo "<script>window.location='index.php?page=16&&id_kerusakan=$id_kerusakan'</script>";
                  }else {
                    $query = mysqli_query($conn,"UPDATE kerusakan SET nama_kerusakan = '$nm_customer', deskripsi = '$deskripsi' WHERE id_kerusakan='$id_kerusakan'"); 
                    if ($query) {
                      echo "<script>alert('Berhasil Ubah Data Kerusakan')</script>";
                      echo "<script>window.location='index.php?page=14'</script>";   
                    }
                  }
              }  
            ?>


          