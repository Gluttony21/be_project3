<?php
require('../../config/koneksi.php');
$id = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$divsi = $_POST['divisi'];
$telp = $_POST['no_telpon'];
$username = $_POST['username'];
$lvl = $_POST['level'];
header('Content-Type: text/xml');
$query = mysqli_query($koneksi, "UPDATE tbl_karyawan SET nama = '$nama',  gender = '$gender', divisi = '$divsi', no_telpon = '$telp' WHERE id_karyawan = '$id'");
if ($query) {
    $quser = mysqli_query($koneksi, "UPDATE tbl_user SET username = '$username', level = '$lvl' WHERE id_user = '$id'");
    if($query){
        $respons = [
            'success' => 1,
            'message' => "update berhasil"
        ];
        echo json_encode($respons);
    }
} else {
    $respons = [
        'success' => 0,
        'message' => "gagal"
    ];
    echo json_encode($respons);
}