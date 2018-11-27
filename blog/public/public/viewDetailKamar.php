<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

    $id = $_POST['id_booking'];

  $sql = "SELECT r.id_booking 'id_booking', 
  k.kode_kamar 'kode_kamar', dk.jumlah_kamar 'jumlah_kamar', k.harga_kamar 'harga_kamar'
  FROM detail_reservasi_kamars dk
  JOIN reservasis r ON dk.kode_booking = r.id
  JOIN kamars k ON dk.kode_kamar = k.id
  WHERE r.id_booking = '$id'
  ORDER BY r.id_booking ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(
        'id_booking'=>$row[0], 
        'kode_kamar'=>$row[1], 
        'jumlah_kamar'=>$row[2],
        'harga_kamar'=>$row[3],
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}