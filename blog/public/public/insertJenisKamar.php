<?php

if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $nama_jenis_kamar = $_POST['nama_jenis_kamar'];
   $gambar= $_POST['gambar'];
   $kode_jenis_kamar = $_POST['kode_jenis_kamar'];
   $detail_jenis_kamar = $_POST['detail_jenis_kamar'];
   $pilihan_tempat_tidur_1 = $_POST['pilihan_tempat_tidur_1'];
   $pilihan_tempat_tidur_2 = $_POST['pilihan_tempat_tidur_2'];
   $kapasitas = $_POST['kapasitas'];
   $harga_jenis_kamar = $_POST['harga_jenis_kamar'];

   require_once('dbConnect.php');
   //Cek nama jenis kamar sudah terdaftar apa belum
   
   $sql = "SELECT * FROM jenis_kamars WHERE nama_jenis_kamar ='$nama_jenis_kamar'";
   $check = mysqli_fetch_array(mysqli_query($con,$sql));
   if(isset($check)){
     $response["value"] = 0;
     $response["message"] = "Nama jenis kamar sudah terdaftar!";
     echo json_encode($response);
   } else {
     $sql = "INSERT INTO jenis_kamars (nama_jenis_kamar,gambar,kode_jenis_kamar,detail_jenis_kamar,pilihan_tempat_tidur_1,pilihan_tempat_tidur_2,kapasitas,harga_jenis_kamar) 
            VALUES('$nama_jenis_kamar',
                    '$gambar',
                    '$kode_jenis_kamar',
                    '$detail_jenis_kamar',
                    '$pilihan_tempat_tidur_1',
                    '$pilihan_tempat_tidur_2',
                    '$kapasitas',
                    '$harga_jenis_kamar')";
     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Kamar berhasil diinputkan!";
       echo json_encode($response);
     } else {
       $response["value"] = 0;
       $response["message"] = "Field ada yang belum terisi!";
       echo json_encode($response);
     }
   }
   // tutup database
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "Error silahkan coba kembali!";
  echo json_encode($response);
}