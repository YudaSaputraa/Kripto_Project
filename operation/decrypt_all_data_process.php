<?php
include '../connection/connection.php';
$plainTextNik = '';
$plainTextAlamat = '';

$chipperMethod = "AES-128-CTR";
$chipperMethodForImage = "AES-192-CTR";
// $iv_length = openssl_cipher_iv_length($chipperMethod);
$encryption_iv = '1234567891011121';
$encryption_key = "kriptografi";

$query = "SELECT * FROM data_pendaftar";
$sql = mysqli_query($connect, $query);
while ($resultData = mysqli_fetch_assoc($sql)) {

    if ($resultData['nik'] && $resultData['alamat']) {
        $plainTextNik = openssl_decrypt($resultData['nik'], $chipperMethod, $encryption_key, 0, $encryption_iv);

        $plainTextAlamat = openssl_decrypt($resultData['alamat'], $chipperMethod, $encryption_key, 0, $encryption_iv);
    }
    $resultPlainTextNik = strrev($plainTextNik);
    $resultPlainTextAlamat = strrev($plainTextAlamat);
}

echo 'Plain Text : ' . $resultPlainText;
header("location:../view/decrypt_all_data.php?resultNik=$resultPlainTextNik&resultAlamat=$resultPlainTextAlamat");
