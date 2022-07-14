<?php 
require('../../config/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tbl_teknisi");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $getd= mysqli_query($koneksi,"SELECT COUNT(id_tiket) AS d FROM tbl_tiket WHERE teknisi='$data[id_teknisi]' AND status =3");
    $dd = mysqli_fetch_array($getd);
    $getop= mysqli_query($koneksi,"SELECT COUNT(id_tiket) AS op FROM tbl_tiket WHERE teknisi='$data[id_teknisi]' AND status =2");
    $dop = mysqli_fetch_array($getop);
    $a = [
        'nama_teknisi' => $data['nama_teknisi'],
        'done' => $dd['d'],
        'proses' => $dop['op']
    ];
    array_push($respons, $a);
}
echo json_encode($respons);