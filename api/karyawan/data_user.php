<?php 
require('../../config/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan JOIN tbl_gender ON tbl_karyawan.gender = tbl_gender.id_gender JOIN tbl_divisi ON tbl_karyawan.divisi = tbl_divisi.id_divisi JOIN tbl_user ON tbl_user.id_user = tbl_karyawan.id_karyawan JOIN tbl_lvl ON tbl_user.level = tbl_lvl.id_lvl");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $a = [
        'id_karyawan' => $data['id_karyawan'],
        'nama' => $data['nama'],
        'gender' => $data['jenis_gender'],
        'divisi' => $data['nama_divisi'],
        'notelpon' => $data['no_telpon'],
        'username' => $data['username'],
        'level' => $data['lvl']
    ];
    array_push($respons, $a);
}
echo json_encode($respons);