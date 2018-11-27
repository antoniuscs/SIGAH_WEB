<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT r.id_booking, c.nama_depan 'nama_customer', s.nama_depan 'nama_staf', l.nama_kota_kabupaten, 
  r.jumlah_dewasa, r.jumlah_anak, r.tanggal_reservasi, r.tanggal_check_in, r.tanggal_check_out, r.tanggal_pembayaran,
  r.status_reservasi, t.total_keseluruhan
  FROM reservasis r
  JOIN customers c ON r.kode_customer = c.id
  JOIN staff s ON r.kode_staff = s.id
  JOIN lokasis l ON r.kode_lokasi = l.id 
  JOIN transaksis t ON t.kode_booking = r.id
  ORDER BY r.id_booking ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(
        'id_booking'=>$row[0], 
        'nama_customer'=>$row[1], 
        'nama_staf'=>$row[2], 
        'nama_kota_kabupaten'=>$row[3],
        'jumlah_dewasa'=>$row[4],
        'jumlah_anak'=>$row[5],
        'tanggal_reservasi'=>$row[6], 
        'tanggal_check_in'=>$row[7],
        'tanggal_check_out'=>$row[8],
        'tanggal_pembayaran'=>$row[9],
        'status_reservasi'=>$row[10],
        'total_pembayaran'=>$row[11],  
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}