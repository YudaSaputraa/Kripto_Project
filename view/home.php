<?php
session_start();

$admin_name = $_SESSION['session_username'];

if (!isset($_SESSION['session_username'])) {
    header("location:../index.php");
    exit();
}
include '../connection/connection.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>

<body>
    <section class="border">

        <div class="card-body cardbody-color p-lg-2">
            <h2>
                <center>Welcome! <?php echo $admin_name; ?></center>
            </h2>

        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="home.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_penduduk.php">Daftar Penduduk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="decrypt_all_data.php">Decript Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="decrypt.php">Decrypt</a>
                        </li>
                    </ul>
                    <a class="logout btn" type="button" href="../operation/logout.php">Logout</a>
                </div>
            </div>
        </nav>

    </section>
    <div class="bg-white" style="padding-bottom: 50px;">

        <div class="w-50 mx-auto border p-3 mt-5 bg-white">

            <div class="header container-fluid py-2">
                <h4> Tambah Data </h4>
            </div>
            <br>
            <form action="../operation/encrypt_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Penduduk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ttl" class="col-sm-2 col-form-label">Tempat/Tgl lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="ttl" name="ttl" placeholder="Tempat/Tanggal Lahir" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="gender">
                            <option selected>Jenis kelamin</option>
                            <option value="Laki-laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" cols="73" rows="2" placeholder="Alamat" required></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekrjaan" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Pekerjaan" class="col-sm-2 col-form-label">foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="gambar" required>
                    </div>
                </div>

                <div class="mx-auto mb-3 col-sm-8">
                    <h6>Super Enkripsi menggunakan AES-128-CTR & Reverse</h6>
                </div>
                <div class="mx-auto text-center col-sm-5"><button type="submit" class="tombol btn col-auto me-2" name="enkripsi">Enkripsi</button></div>
                <br>
            </form>
        </div>
    </div>
</body>