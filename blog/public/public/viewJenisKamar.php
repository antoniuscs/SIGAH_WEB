<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT j.id,j.nama_jenis_kamar,j.gambar,j.kode_jenis_kamar,j.detail_jenis_kamar,t1.nama_tempat_tidur,t2.nama_tempat_tidur,j.kapasitas,j.harga_jenis_kamar
  from jenis_kamars j 
  JOIN tempat_tidurs t1 on j.pilihan_tempat_tidur_1=t1.id 
  JOIN tempat_tidurs t2 ON j.pilihan_tempat_tidur_2=t2.id 
  ORDER BY nama_jenis_kamar ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(
        'nama_jenis_kamar'=>$row[1], 
        'gambar'=>$row[2], 
        'kode_jenis_kamar'=>$row[3], 
        'detail_jenis_kamar'=>$row[4],
        'pilihan_tempat_tidur_1'=>$row[5],
        'pilihan_tempat_tidur_2'=>$row[6],
        'kapasitas'=>$row[7],
        'harga_jenis_kamar'=>$row[8],    
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}