<?php
header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
        header("Access-Control-Allow-Headers: authorization, Content-Type");
include_once('connection.php');
$json;
 $strQuery=mysqli_query($con,"SELECT * FROM `emp`");
if (mysqli_num_rows($strQuery)>0){ 
    while($row = mysqli_fetch_array($strQuery)){
        
$empdata[]= array("id"=>$row['id'],"firstName"=>$row['firstName'],"lastName"=>$row['lastName'],"mobile"=>$row['mobile'],"email"=>$row['email'],"username"=>$row['username'],"password"=>$row['password'],"address"=>$row['address'],"age"=>$row['age'],"salary"=>$row['salary']);
$json = array("status" => true, "msg" => "success","Data"=>$empdata);
 }     
 }else{
    setError("User Not Found .");
    }
function setError($error){
    global $json;
    $json=array("status" => false, "msg" => $error);
}

echo json_encode($json);
?>