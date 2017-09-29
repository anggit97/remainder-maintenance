<?php  
include '../../koneksi/conn.php';
?>

<div class="box-body">
  <div class="form-group">
    <label for="sel1">Alat</label>
    <select name="id_alat_1" id="id_alat" class="form-control" required>
      <option value="">-- Pilih Alat --</option>
      <?php  
      $sqli = mysqli_query($conn,"SELECT * FROM alat");
       if (mysqli_num_rows($sqli) > 0) {
         if ($sqli) {
           while ($peg = mysqli_fetch_array($sqli)) {
             echo "<option value='$peg[id_alat]'>$peg[nama_alat] - $peg[id_alat]</option>";
           }
         }else echo mysqli_error($conn);
       }else echo mysqli_error($conn);
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="sel1">Kerusakan</label>
    <select name="id_kerusakan_1" id="id_kerusakan" class="form-control" required>
      <option value="">-- Pilih Kerusakan --</option>
      <?php  
      $sqli = mysqli_query($conn,"SELECT * FROM kerusakan");
       if (mysqli_num_rows($sqli) > 0) {
         if ($sqli) {
           while ($peg = mysqli_fetch_array($sqli)) {
             echo "<option value='$peg[id_kerusakan]'>$peg[nama_kerusakan] - $peg[id_kerusakan]</option>";
           }
         }else echo mysqli_error($conn);
       }else echo mysqli_error($conn);
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="sel1">Keterangan Kerusakan</label>
    <textarea name="keterangan_1" id="keterangan" class="form-control" placeholder="Keterangan Kerusakan" cols="30" rows="10" required></textarea>
  </div>
</div>