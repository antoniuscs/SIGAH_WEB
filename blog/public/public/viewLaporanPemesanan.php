<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
    $tahun = $_POST['tahun'];
    $sql ="SELECT CONCAT(customers.nama_depan,' ',customers.nama_belakang) 'nama_customer',
    COUNT(reservasis.kode_customer) 'jumlah', 
    SUM(transaksis.total_keseluruhan) 'total'
    FROM reservasis join transaksis 
    on reservasis.id=transaksis.kode_booking 
    join customers on customers.id=reservasis.kode_customer
    where DATE_FORMAT(reservasis.created_at,'%Y')='$tahun'
    group by reservasis.kode_customer";
    $res = mysqli_query($con,$sql);
    $result = array();
    while($row = mysqli_fetch_array($res)){
    array_push($result, array(
        'nama_customer'=>$row[0], 
        'jumlah'=>$row[1], 
        'total'=>$row[2],   
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}