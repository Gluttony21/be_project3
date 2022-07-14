<?php
require('../../config/koneksi.php');
$id = $_POST['id_karyawan'];
header('Content-Type: text/html');
$query = mysqli_query($koneksi, "DELETE FROM tbl_karyawan WHERE id_karyawan = '$id'");
if ($query) {
    $udel = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user = '$id'");
    if($udel){
        $respons = [
            'success' => 1,
            'message' => "berhasil delete"
        ];
        echo json_encode($respons);
    }
} else {
    $respons = [
        'success' => 0,
        'message' => "gagal delete"
    ];
    echo json_encode($respons);
}