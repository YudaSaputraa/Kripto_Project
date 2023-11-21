<?php
include '../connection/connection.php';
if (isset($_POST['dekripsi'])) {
    $chipperText = $_POST['decrypt'];
    $plainText = '';


    $chipperMethod = "AES-128-CTR";
    // $iv_length = openssl_cipher_iv_length($chipperMethod);
    $encryption_iv = '1234567891011121';
    $encryption_key = "kriptografi";

    $query = "SELECT * FROM data_pendaftar";
    $sql = mysqli_query($connect, $query);
    while ($resultData = mysqli_fetch_assoc($sql)) {

        if ($chipperText == $resultData['nik']) {
            $plainText = openssl_decrypt($chipperText, $chipperMethod, $encryption_key, 0, $encryption_iv);
        } else if ($chipperText == $resultData['alamat']) {

            $plainText = openssl_decrypt($chipperText, $chipperMethod, $encryption_key, 0, $encryption_iv);
        }
    }
    $resultPlainText = strrev($plainText);
    echo 'Plain Text : ' . $resultPlainText;
    header("location:../view/decrypt.php?result=$resultPlainText");
}
