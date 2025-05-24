<?php
include ('desa02/config/koneksi.php');
      $sql =mysqli_query($connect, "SELECT * FROM penduduk");
      $query =mysqli_num_rows($sql);?>
      <p>Jumlah Hidup : <b> <?php echo $query; ?></b></p>
    
<?php 