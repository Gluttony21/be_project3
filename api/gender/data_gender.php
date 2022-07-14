<?php 
require('../../config/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tbl_gender");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $a = [
        'id_gender' => $data['id_gender'],
        'jenis_gender' => $data['jenis_gender'],
    ];
    array_push($respons, $a);
}
echo json_encode($respons);