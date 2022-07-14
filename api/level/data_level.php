<?php 
require('../../config/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tbl_lvl");
$respons = [];
while($data = mysqli_fetch_array($query)){
    $a = [
        'id_lvl' => $data['id_lvl'],
        'lvl' => $data['lvl'],
    ];
    array_push($respons, $a);
}
echo json_encode($respons);