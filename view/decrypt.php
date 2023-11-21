<?php
session_start();

$admin_name = $_SESSION['session_username'];

if (!isset($_SESSION['session_username'])) {
    header("location:../index.php");
    exit();
}
include '../connection/connection.php';
include '../operation/decrypt_process.php';

if (!isset($_GET['result'])) {
    echo '';
    $showResult = '';
} else {
    $showResult = $_GET['result'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Translator</title>
</head>

<body>
    <section class="border">

        <div class="card-body cardbody-color p-lg-2">
            <h2>
                <center>Decryption</center>
            </h2>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_penduduk.php">Daftar Penduduk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="decrypt_all_data.php">Decript Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="decrypt.php">Decrypt</a>
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
                <h4> Decrypt </h4>
            </div>
            <br>
            <form action="../operation/decrypt_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="decrypt" class="col-sm-2 col-form-label">Chipper Text</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="decrypt" name="decrypt" placeholder="Type here.." required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="result" class="col-sm-2 col-form-label">PlainText</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="resultDecrypt" name="resultDecrypt" placeholder="Result here.." value="<?= $showResult ?>" disabled>
                    </div>
                </div>

                <div class="mx-auto text-center col-sm-5"><button type="submit" class="tombol btn col-auto me-2" name="dekripsi">Dekripsi</button></div>
                <br>
            </form>
        </div>
    </div>
</body>