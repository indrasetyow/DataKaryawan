<?php
//include koneksi databse
include './config.php';

//menerima data yang dikirim dari form
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$tahunmasuk = date ('Y-m-d', strtotime ($_POST['tahunmasuk']));



//menginput data ke database
mysqli_query($koneksi, "Insert into karyawan (nama, ktp, telp,tahunmasuk) values ('$nama', '$ktp', $telp, '$tahunmasuk')");
include 'main.php';


