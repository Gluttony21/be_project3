<?php
require('../../config/koneksi.php');
$id = $_POST['id_tiket'];
$teknisi = $_POST['id_teknisi'];
$status = 2;
header('Content-Type: text/html');
$query = mysqli_query($koneksi, "UPDATE tbl_tiket SET teknisi = '$teknisi',status = '$status' WHERE id_tiket = '$id'");
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