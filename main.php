
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <title>Data Karyawan</title>

    <style>
        .table, th, td {
            width: 10%;

        }
    </style>
</head>

<body>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Tambah Mahasiswa</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- modal start -->
    <div class="container data-job mt-5">
        <!-- modal -->
        <!-- button memunculkan modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data
        </button>

        <!-- Modal tambah data-->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- membuat form dengan method post untuk memanggil file store.php -->
                    <form method="post" action="store.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Input Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- input nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" name="nama" required>
                            </div>
                            <!-- input nim -->
                            <div class="mb-3">
                                <label for="ktp" class="form-label">No.KTP</label>
                                <input type="text" class="form-control" id="ktp" placeholder="Masukkan Nomor KTP Anda" name="ktp" required>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">No.Telpon</label>
                                <input type="text" class="form-control" id="telp" placeholder="Masukkan Nomor KTP Anda" name="telp" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahunmasuk" class="form-label">Tahun Masuk</label>
                                <input type="date" class="form-control" id="tahunmasuk" placeholder="Masukkan Nomor KTP Anda" name="tahunmasuk" required>
                            </div>
                            <!-- input alamat -->
                    
                        </div>
                        <div class="modal-footer">
                            <!-- Button close modal -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Button tambah data  -->
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

    <!-- Table start  -->
    <div class="table-responsive" id ="table">
        <table class="table table-striped" id="tableMahasiswa">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. KTP</th>
                    <th scope="col">No. Telpon</th>
                    <th scope="col">tahun masuk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //memanggil config.php yang sudah dibuat
                include 'config.php';

                //membuat variable nomor mahasiswa yang akan di increment
                $no = 1;

                //melakukan query
                $job = mysqli_query($koneksi, "SELECT * FROM karyawan");

                //looping data mahasiswa
                while ($data = mysqli_fetch_array($job)) {
                ?>
                    <!-- menampilkan nomor baris $no++ -->
                    <tr>

                    <td>
                    <?php echo $no++; ?></td>
                      <td><?php echo $data['nama'] ?></td>
                      <td><?php echo $data['ktp'] ?></td>
                      <td><?php echo $data['telp'] ?></td>
                      <td><?php echo date('d M Y',strtotime($data['tahunmasuk']))?></td>
                        

                        <!-- untuk aksi data mahasiswa -->
                        <td>
                            <!-- aksi edit delete, btn-sm  -->
                            <a href="detail.php?id=<?php echo $data['id_karyawan']; ?>" class="btn btn-success btn-sm text-white">DETAIL</a>
                            <!-- link untuk masuk ke halaman edit -->
                            <a href="edit.php?id=<?php echo $data['id_karyawan']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                            <!-- link untuk delete -->
                            <a href="delete.php?id=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')">DELETE</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <style>
        .table{
            width: 100%; /* The width is 100%, when the viewport is 800px or smaller */
            padding:20px
        }
    </style>
    <!-- table end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableMahasiswa').DataTable();
        });
    </script>
</body>

</html>

