<?php 
require('../../config/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tbl_teknisi JOIN tbl_gender ON tbl_teknisi.gender = tbl_gender.id_gender");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $a = [
        'id_teknisi' => $data['id_teknisi'],
        'nama_teknisi' => $data['nama_teknisi'],
        'gender' => $data['jenis_gender'],
        'vendor' => $data['vendor'],
        'no_telpon' => $data['no_telpon'],
    ];
    array_push($respons, $a);
}
echo json_encode($respons);