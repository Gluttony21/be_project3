<?php
require('../../config/koneksi.php');
date_default_timezone_set('asia/jakarta');
$id_karyawan = $_POST['id_karyawan'];
$keluhan = $_POST['keluhan'];
$type =  array('png','jpg','jpeg');
$image = $_FILES['image']['name'];
$x = explode('.', $image);
$typ =strtolower(end($x));
$size = $_FILES['image']['size'];
$name_img = md5(rand()) . '.' . $typ;
$Path = "../../images/" . $name_img;
header('Content-Type: text/xml');
if(in_array($typ, $type) === true){
    if($size <= 5000000){
        move_uploaded_file($_FILES['image']['tmp_name'], $Path);
        $tgl_buat = date('Y-m-d');
        $sts = 1;
        $qcode = mysqli_query($koneksi, "SELECT MAX(id_tiket) AS max_code FROM tbl_tiket");
        $d = mysqli_fetch_array($qcode);
        $a = $d['max_code'];
        $urut = (int)substr($a, 6, 3);
        $urut++;
        $my= date('ym');
        $id = "TI". $my . sprintf("%03s", $urut);
        if($qcode){
            $query = mysqli_query($koneksi, "INSERT INTO tbl_tiket(id_tiket,user,keluhan,foto,tgl_buat,status) VALUES('$id','$id_karyawan','$keluhan','$name_img','$tgl_buat','$sts')");
            if ($query) {
                $respons = [
                    'success' => 1,
                    'message' => "tiket berhasil dibuat"
                ];
                echo json_encode($respons);
            }
        }
    }else{
        $respons = [
            'success' => 0,
            'message' => "size terlalu besar"
        ];
        echo json_encode($respons);
    }
}else{
    $respons = [
        'success' => 0,
        'message' => "type tidak sesuai"
    ];
    echo json_encode($respons);
}