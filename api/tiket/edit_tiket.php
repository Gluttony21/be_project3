<?php
require('../../config/koneksi.php');
header('Content-Type: text/xml');
$id = $_POST['id_tiket'];
$status = '3';
$tgls = $_POST['tgl_selesai'];
$solusi = $_POST['solusi'];
$query = mysqli_query($koneksi, "UPDATE tbl_tiket SET status = '$status', tgl_selesai = '$tgls', solusi = '$solusi' WHERE id_tiket = '$id'");
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