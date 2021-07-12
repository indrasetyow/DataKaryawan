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
            <a class="navbar-brand fw-bold" href="#">Data Karyawan PT SAWIT BAHAGIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Tambah Data Karyawan</a>
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
    //melakukan quey untuk mendapatkan data karyawan berdasarkan $id
    $karyawan = mysqli_query($koneksi, "select * from karyawan where id_karyawan='$id'");
    
    while ($data = mysqli_fetch_assoc($karyawan)) {
    ?>
        <div class="container mt-5">
            <p><a href="main.php">Home</a>/ Edit Karyawan / <?php echo $data['nama'] ?></p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Edit Profil Karyawan</p>
                </div>
                <div class="card-body fw-bold">
                    <!-- membuat form dengan method post untuk memanggil file update.php -->
                    <form method="post" action="update.php">
                        <!-- input yang disembunyikan (hidden) untuk menyimpan id karyawan -->
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>">
                        </div>
                        <!-- input Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda" name="nama" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ktp" class="form-label">No KTP</label>
                            <input type="text" class="form-control" id="ktp" placeholder="Masukkan No KTP Anda" name="ktp" value="<?php echo $data['ktp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="telp" placeholder="Masukkan No Telp Anda" name="telp" value="<?php echo $data['telp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahunmasuk" class="form-label">Tahun Masuk</label>
                            <input type="date" class="form-control" id="tahunmasuk" placeholder="Masukkan Tahun Masuk Anda" name="tahunmasuk" value="<?php echo $data['tahunmasuk']; ?>">
                        </div>
                        <!-- Button update data  -->
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- edit end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>