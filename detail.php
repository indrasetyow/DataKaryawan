<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> -->

    <title>Data Karyawan</title>
</head>

<body>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="main.php">Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Tambah Karyawan</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

        <!-- detail start -->
        <?php
    //memanggil file config.php
    include 'config.php';
    //menangkap id yang di kirimkan melalui button detail
    $id = $_GET['id'];
    //melakukan quey untuk mendapatkan data mahasiswa berdasarkan $id
    $mahasiswa = mysqli_query($koneksi, "select * from karyawan where id_karyawan='$id'");
    while ($data = mysqli_fetch_assoc($mahasiswa)) {
        $tahun_masuk = $data['tahunmasuk'];
                        $lama = new DateTime($tahun_masuk);
                        $sekarang = new DateTime();
                        $masa_kerja = $sekarang->diff($lama);
    ?>
        <div class="container mt-5">
            <p><a href="main.php">Home</a>/ Detail Karyawan / <?php echo $data['nama'] ?></p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Profil Karyawan</p>
                </div>
                <div class="card-body fw-bold">
                    <p>Nama : <?php echo $data['nama'] ?></p>
                    <p>No. KTP : <?php echo $data['ktp'] ?></p>
                    <p>No. Telp : <?php echo $data['telp'] ?></p>
                    <p>Tahun Masuk : <?php echo $data['tahunmasuk'] ?></p>
                    <p>Masa Kerja : <?php echo $masa_kerja->y . "&nbsp" . "Tahun" ?></p>
                    <a href="print.php?id=<?php echo $data['id_karyawan']; ?>" class="btn btn-primary btn-sm text-white">CETAK</a>                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- detail end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>