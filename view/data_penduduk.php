<?php
session_start();

$admin_name = $_SESSION['session_username'];

if (!isset($_SESSION['session_username'])) {
    header("location:../index.php");
    exit();
}

$no = 1;
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
    <title>Data</title>
</head>
<style>
    th td {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
</style>

<body>
    <div class="card-body cardbody-color p-lg-2">
        <h2>
            <center>DATA PENDUDUK</center>
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
                        <a class="nav-link active" href="data_penduduk.php">Daftar Penduduk</a>
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
    <div class="container">
        <h3>Encryption Data : </h3>
        <table class="table" style="border: 2px solid black;">
            <br>
            <thead class="table-blue">
                <th>
                    <center>No</center>
                </th>
                <th>
                    <center>NIK</center>
                </th>
                <th>
                    <center>Nama<center>
                </th>
                <th>
                    <center>TTL<center>
                </th>
                <th>
                    <center>Jenis Kelamin<center>
                </th>
                <th>
                    <center>Alamat<center>
                </th>
                <th>
                    <center>Agama<center>
                </th>
                <th>
                    <center>Pekerjaan<center>
                </th>
                <th>
                    <center>Gambar</center>

                </th>
                <th>
                    <center>Action</center>

                </th>
            </thead>
            <?php
            $query = mysqli_query($connect, "SELECT * FROM data_pendaftar");
            while ($data = mysqli_fetch_array($query)) {
                $decoded_image = base64_decode($data['gambar']);
            ?>
                <tbody>
                    <tr>
                        <td>
                            <center><?php echo $no ?>.</center>
                        </td>
                        <td><?php echo "$data[nik]" ?></td>
                        <td>
                            <center><?php echo "$data[nama]" ?><center>
                        </td>
                        <td>
                            <center><?php echo "$data[ttl]" ?><center>
                        </td>
                        <td>
                            <center><?php echo "$data[jenis_kelamin]" ?><center>
                        </td>
                        <td>
                            <center><?php echo "$data[alamat]" ?><center>
                        </td>
                        <td>
                            <center><?php echo "$data[agama]" ?><center>
                        </td>
                        <td>
                            <center><?php echo "$data[pekerjaan]" ?><center>
                        </td>
                        <td style=" text-align: left; padding: 8px;max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <center>
                                <?php echo "$data[gambar]" ?>
                                <!-- <img style="width: 100px;" border="0" src="data:image/jpeg;base64,<?php echo base64_encode($decoded_image) ?>" class="img-thumbnail img-responsive"> -->

                            </center>

                        </td>
                        <td>
                            <a href="../operation/delete.php?id=<?= $data['id'] ?>"> <input type="submit" class="btn btn-danger" value="Delete"></a>

                        </td>
                        <?php
                        $no++;
                        ?>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

</body>