<?php
if (isset($_GET['id'])) {
    include '../connection/connection.php';
    $id = $_GET['id'];

    $sql = mysqli_query($connect, "DELETE FROM data_pendaftar WHERE id = $id");
    if ($sql) {
        header("location:../view/data_penduduk.php");
        die();
    } else {
        echo 'Message : Delete Failed!';
    }
}
