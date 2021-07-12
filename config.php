<?php 
  $server = "localhost";
  $user = "ucp2pkw_indrasetyow_077"; // GANTI
  $pass = "05112000November"; // GANTI
  $db = "ucp2pkw_job_077"; // GANTI

  $koneksi =  mysqli_connect($server,$user,$pass,$db);

  if(mysqli_connect_errno()){
    echo "KONEKSI GAGAL!\n Kesalahan : ".mysqli_connect_error();
  }
?>