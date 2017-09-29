			<h1>Tambah Data Jenis Kerusakan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bolt"></i> Kerusakan</a></li>
        <li><a href="#"><i class="fa fa-plus"></i> Tambah Data Jenis Kerusakan</a></li>
      </ol>
      
<hr>

      <?php  
        $query="select * from kerusakan order by id_kerusakan desc limit 1";
        $baris=mysqli_query($conn,$query);
        if($baris){
          if(mysqli_num_rows($baris)>0){
            $auto=mysqli_fetch_array($baris);
            $kode=$auto['id_kerusakan'];
            $baru=substr($kode,1,4);
              //$nilai=$baru+1;
              $nol=(int)$baru;
          } 
          else{
            $nol=0;
            }
          $nol=$nol+1;
          $nol2="";
          $nilai=4-strlen($nol);
          for ($i=1;$i<=$nilai;$i++){
            $nol2= $nol2."0";
            }

            $kode2 ="K".$nol2.$nol;
            
        }
        else{
        echo mysqli_error();
        }

        
      ?>

      <h5><b><?php echo date("l, M Y"); ?></b></h5>
			<center><h2>Tambah Data Jenis Kerusakan</h2></center>
				
            <a href="index.php?page=14" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <br><br>
			 

              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-add"></i>
                  <h3 class="box-title">Tambah Data Jenis Kerusakan</h3>
                
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="sel1">ID Kerusakan</label>
                      <input type="text" class="form-control" readonly="readonly" name="id_customer" placeholder="ID Customer" value="<?php echo $kode2; ?>">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Nama Kerusakan</label>
                      <input type="text" class="form-control" name="nm_customer" placeholder="Nama Kerusakan">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Deskripsi Kerusakan</label>
                      <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Kerusakan" cols="30" rows="10"></textarea>
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

                  if ($nm_customer == "") {
                    echo "<script>alert('Nama Kerusakan tidak Boleh kosong')</script>";
                  }elseif ($deskripsi == "") {
                    echo "<script>alert('Deskripsi Kerusakan tidak Boleh kosong')</script>";
                  }else{
                    $query = mysqli_query($conn,"INSERT INTO kerusakan VALUES('$id_customer','$nm_customer','$deskripsi')"); 
                    if ($query) {
                      echo "<script>alert('Berhasil Tambah Data Kerusakan')</script>";
                      echo "<script>window.location='index.php?page=14'</script>";
                    }else echo mysqli_error($conn);
                  }
                  
              }  
            ?>


          