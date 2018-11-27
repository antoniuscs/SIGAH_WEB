<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT * FROM fasilitas
   WHERE nama_fasilitas LIKE '%$search%' ORDER BY nama_fasilitas ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(        
        'nama_fasilitas'=>$row[1], 
        'harga_fasilitas'=>$row[2],
    ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}