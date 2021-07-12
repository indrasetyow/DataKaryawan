
<?php
//include con database
include './config.php';

//mengambil data yang di kirim dari form
$id = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$tahunmasuk = $_POST['tahunmasuk'];


//update data ke database
mysqli_query($koneksi, "update karyawan set nama='$nama', ktp = '$ktp', telp = '$telp', tahunmasuk = '$tahunmasuk' where id_karyawan = '$id'");
//return ke halaman awal
include 'main.php';

