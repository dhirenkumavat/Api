<?php 
header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
        header("Access-Control-Allow-Headers: authorization, Content-Type");
include_once('connection.php');
 $postIds   = isset($_GET["id"]) ? $_GET["id"] : '';
	if(!empty($postIds)){
		$result = mysqli_query($con,"SELECT * FROM `emp` WHERE id=$postIds");
$row = mysqli_fetch_assoc($result);
    	$json = $row;    
    }
	else{
    	$json = array('status' => false, 'message' => 'Please enter post details...');
    }
 
 function setError($error){
	global $json;
	$json=array("status" => false, "msg" => $error);
}
    echo json_encode($json);

 
 ?>