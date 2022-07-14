<?php
require('../../config/koneksi.php');
$id = $_POST['id_teknisi'];
$nama = $_POST['nama_teknisi'];
$gender = $_POST['gender'];
$vendor = $_POST['vendor'];
$no_telpon = $_POST['no_telpon'];
header('Content-Type: text/xml');
$query = mysqli_query($koneksi, "UPDATE tbl_teknisi SET nama_teknisi = '$nama',  gender = '$gender', vendor = '$vendor', no_telpon = '$no_telpon' WHERE id_teknisi = '$id'");
if ($query) {
    
    $respons = [
        'success' => 1,
        'message' => "berhasil update"
    ];
    echo json_encode($respons);
} else {
    $respons = [
        'success' => 0,
        'message' => "gagal simpan"
    ];
    echo json_encode($respons);
}