<?php
        header("Access-Control-Allow-Origin: *");
     header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
    header("Access-Control-Allow-Headers: authorization, Content-Type");
include_once('connection.php');
$token=null;
// $header=apache_request_headers();
if($_SERVER['REQUEST_METHOD']=="POST"){

 $content = trim(file_get_contents("php://input"));
    $request = json_decode($content,true);	
     if(empty($request['username'])|| empty($request['password'])){
		setError("empty param !!!");
	}else{
$username =  $request['username'];
$password =  $request['password'];
		        
if ($username=='admin' && $password=='123456'){
    

$json=array("status" => true,"message" =>"User Login Successfully",
'token'=>'Bearer-jsdfnk223','email'=>$username,'expireAt'=>$password);
}else{
   setError("login failed for user");
   }
}
 }else{
    setError("Method must be POST.");
  }
 function setError($error){
    global $json;
    $json=array("status" => false, "msg" => $error);
}
echo json_encode($json);
?>