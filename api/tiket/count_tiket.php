<?php
require('../../config/koneksi.php');
$id = $_GET['id_teknisi'];
$q1 = mysqli_query($koneksi,"SELECT COUNT(id_tiket) AS op FROM tbl_tiket WHERE teknisi = '$id' AND status =2");
$d1 = mysqli_fetch_array($q1);
$q2 = mysqli_query($koneksi,"SELECT COUNT(id_tiket) AS d FROM tbl_tiket WHERE teknisi = '$id' AND status =3");
$d2 = mysqli_fetch_array($q2);
$respons = [];
$a = [
    'op' => $d1['op'],
    'sls' => $d2['d']
];
array_push($respons, $a);
echo json_encode($respons);