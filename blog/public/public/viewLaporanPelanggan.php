<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
    $sql ="SELECT MONTHNAME(created_at) 'bulan', COUNT(id) 'jumlah'
    from customers
    where year(created_at)='2018'
    group by month(created_at)";
    $res = mysqli_query($con,$sql);
    $result = array();
    while($row = mysqli_fetch_array($res)){
    array_push($result, array(
        'bulan'=>$row[0], 
        'jumlah'=>$row[1],
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}