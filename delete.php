<?php
include 'config.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from karyawan where id_karyawan='$id'");

header("location:main.php");