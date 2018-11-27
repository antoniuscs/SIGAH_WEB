<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

    $id = $_POST['id_booking'];

  $sql = "SELECT r.id_booking 'id_booking', 
  f.nama_fasilitas 'nama_fasilitas', df.jumlah_fasilitas 'jumlah_fasilitas', df.tanggal_fasilitas 'tanggal_fasilitas'
  FROM detail_reservasi_fasilitas df
  JOIN reservasis r ON df.kode_booking = r.id
  JOIN fasilitas f ON df.kode_fasilitas = f.id
  WHERE r.id_booking = '$id'
  ORDER BY r.id_booking ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(
        'id_booking'=>$row[0], 
        'nama_fasilitas'=>$row[1], 
        'jumlah_fasilitas'=>$row[2],
        'tanggal_fasilitas'=>$row[3],  
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}