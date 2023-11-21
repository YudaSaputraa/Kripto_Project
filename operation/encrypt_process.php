
<?php
include '../connection/connection.php';
if (isset($_POST['enkripsi'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $ttl = $_POST['ttl'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $tmp_file = $_FILES['gambar']['tmp_name'];


    //reverse chipper
    $nikRev = strrev($nik);
    $alamatRev = strrev($alamat);
    $gambarData = file_get_contents($tmp_file);

    if ($_FILES['gambar']['size'] > 0) {
        $file_name_parts = explode('.', $_FILES['gambar']['name']);
        $ext = strtolower(end($file_name_parts));
        $valid_array = array('jpg', 'jpeg', 'png', 'gif', 'bmp'); //eksrensi gambar yang didukung
        if (in_array($ext, $valid_array)) {
            $gambar_path = '../assets/' . $_FILES['gambar']['name'];
            try {
                $chipperMethod = "AES-128-CTR";
                $chipperMethodForImage = "AES-192-CTR";
                // $iv_length = openssl_cipher_iv_length($chipperMethod); //Initialization Vector sesuai metode
                // $iv_length_image = openssl_cipher_iv_length($chipperMethodForImage); //Initialization Vector sesuai metode
                $encryption_iv = '1234567891011121';
                $encryption_key = "kriptografi";
                $encryptionNik = openssl_encrypt($nikRev, $chipperMethod, $encryption_key, 0, $encryption_iv); //enkrip nik
                $encryptionAlamat = openssl_encrypt($alamatRev, $chipperMethod, $encryption_key, 0, $encryption_iv); //enkrip Alamat

                if (!file_exists('../assets/')) {
                    mkdir('../assets/', 0777, true);
                }
                move_uploaded_file($tmp_file, $gambar_path);
                $gambarData = file_get_contents($gambar_path); // Baca konten file gambar
                $encodedImage = base64_encode($gambarData); // Encode gambar ke dalam format base64
                $encryptionImage = openssl_encrypt($encodedImage, $chipperMethodForImage, $encryption_key, 0, $encryption_iv);
                $query = mysqli_query($connect, "INSERT INTO data_pendaftar VALUES ('', '$encryptionNik', '$nama', '$ttl', '$gender', '$encryptionAlamat', '$agama', '$pekerjaan', ' $encryptionImage' )");

                if (!$query) {
                    echo "Error: " . mysqli_error($connect);
                } else {
                    echo "Data berhasil disimpan ke dalam basis data!";
                }
            } catch (Exception $e) {
                echo "Gagal mengunggah dan mengenkripsi gambar: " . $e->getMessage();
            }
        } else {
            echo "Maaf... file yang Anda pilih bukan file gambar. Hanya file JPG, PNG, GIF, BMP atau PSD yang boleh diupload..!";
        }
    }
    header("location:../view/home.php");
}
?>