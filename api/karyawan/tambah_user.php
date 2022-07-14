<?php
require('../../config/koneksi.php');
date_default_timezone_set('asia/jakarta');
$nama = $_POST['nama_karyawan'];
$gender = $_POST['gender'];
$divsi = $_POST['divisi'];
$telp = $_POST['no_telpon'];
$username = $_POST['username'];
$pass = md5($_POST['password']);
$lvl = $_POST['level'];
header('Content-Type: text/xml');
$qcode = mysqli_query($koneksi, "SELECT MAX(id_karyawan) AS max_code FROM tbl_karyawan");
$d = mysqli_fetch_array($qcode);
$a = $d['max_code'];
$urut = (int)substr($a, 4, 3);
$urut++;
$my= date('ym');
$id = $my . sprintf("%03s", $urut);
if($qcode){
    $query = mysqli_query($koneksi, "INSERT INTO tbl_karyawan(id_karyawan,nama,gender,divisi,no_telpon) VALUES('$id','$nama','$gender','$divsi','$telp')");
    if ($query) {
        $quser = mysqli_query($koneksi, "INSERT INTO tbl_user(id_user,username,password,level) VALUES('$id','$username','$pass','$lvl')");
        if($query){
            $respons = [
                'success' => 1,
                'message' => "user berhasil ditambahkan"
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
}