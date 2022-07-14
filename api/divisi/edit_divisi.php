<?php
require('../../config/koneksi.php');
$id = $_POST['id_divisi'];
$divisi = $_POST['nama_divisi'];
header('Content-Type: text/xml');
$query = mysqli_query($koneksi, "UPDATE tbl_divisi SET nama_divisi = '$divisi' WHERE id_divisi = '$id'");
if ($query) {
    $respons = [
        'success' => 1,
        'message' => "berhasil update"
    ];
    echo json_encode($respons);
} else {
    $respons = [
        'success' => 0,
        'message' => "gagal update"
    ];
    echo json_encode($respons);
}