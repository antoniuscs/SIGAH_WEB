<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT * FROM jenis_kamars WHERE nama_jenis_kamar LIKE '%$search%' ORDER BY nama_jenis_kamar ASC";
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
        'harga_jenis_kamar'=>$row[8],));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}