<?php
require('../../config/koneksi.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
header('Content-Type: text/xml');
$query = mysqli_query($koneksi, "SELECT * FROM tbl_user JOIN tbl_karyawan ON tbl_user.id_user = tbl_karyawan.id_karyawan WHERE username ='$username' AND password = '$password'");
$row = mysqli_fetch_array($query);
$count = mysqli_num_rows($query);
if ($count > 0) {
    $respons = [];
    $respons = [
        'id_karyawan' => $row['id_karyawan'],
        'username' => $row['username'],
        'nama' => $row['nama'],
        'level' => $row['level'],
        'success' => 1,
        'message' => 'login berhasil'
    ];
    echo json_encode($respons);
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user JOIN tbl_teknisi ON tbl_user.id_user = tbl_teknisi.id_teknisi WHERE username ='$username' AND password = '$password'");
    $row = mysqli_fetch_array($query);
    $count = mysqli_num_rows($query);
    if($count == 1){
        $respons = [];
        $respons = [
            'id_karyawan' => $row['id_teknisi'],
            'username' => $row['username'],
            'nama' => $row['nama_teknisi'],
            'level' => $row['level'],
            'success' => 1,
            'message' => 'login berhasil'
        ];
    echo json_encode($respons);
    }else{
        $respons = [
            'success' => 0,
            'message' => 'user tidak ada ' . $count
        ];
        echo json_encode($respons);
    }
}