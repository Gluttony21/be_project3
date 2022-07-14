<?php 
require('../../config/koneksi.php');
$id_karyawan = $_GET['id_karyawan'];
$query = mysqli_query($koneksi,"SELECT * FROM tbl_tiket JOIN tbl_karyawan ON tbl_tiket.user = tbl_karyawan.id_karyawan JOIN tbl_divisi ON tbl_karyawan.divisi = tbl_divisi.id_divisi JOIN tbl_status ON tbl_tiket.status = tbl_status.id_sts WHERE status !=3 AND user = '$id_karyawan'");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $getT= mysqli_query($koneksi,"SELECT * FROM tbl_teknisi WHERE id_teknisi='$data[teknisi]'");
    $dt = mysqli_fetch_array($getT);
    $a = [
        'id_tiket' => $data['id_tiket'],
        'user' => $data['nama'],
        'divisi' => $data['nama_divisi'],
        'keluhan' => $data['keluhan'],
        'foto' => $data['foto'],
        'tgl_buat' => $data['tgl_buat'],
        'tgl_selesai' => $data['tgl_selesai'],
        'teknisi' => $dt['nama_teknisi'],
        'solusi' => $data['solusi'],
        'status' => $data['nama_sts']
    ];
    array_push($respons, $a);
}
echo json_encode($respons);