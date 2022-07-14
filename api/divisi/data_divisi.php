<?php 
require('../../config/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tbl_divisi");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $a = [
        'id_divisi' => $data['id_divisi'],
        'nama_divisi' => $data['nama_divisi'],
    ];
    array_push($respons, $a);
}
echo json_encode($respons);