<?php  
require_once('dbConnect.php');
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
      // username and password sent from form 
      $user_email = $_POST['username_email'];
      $user_password = $_POST['password']; 
      $sql = "SELECT * FROM logins WHERE username_email = '$user_email' AND password = '$user_password';";
      $res = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($res);
      if(isset($row)){
      	$response["value"]=1;
      	$response["message"]='Login Success';
      	$result=array();
          array_push($result,
          array(
              'id'=>$row[0], 
              'username_email'=>$row[1], 
              'password'=>$row[2], 
              'status_peran'=>$row[3],));
        echo json_encode(array("value"=>1,"result"=>$result));
      }else{
      	$response["value"]=0;
      	$response["message"]='Login Fail';
      	echo json_encode($response);
      }
      mysqli_close($con);
  }else{
  	$response["value"]=0;
  	$response["message"]='Con fail';
  	echo json_encode($response);
  }
?>