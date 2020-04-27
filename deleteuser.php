<?php 
header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
include_once('connection.php');
 $postIds   = isset($_GET["id"]) ? $_GET["id"] : '';
	if(!empty($postIds)){
		$result = mysqli_query($con,"DELETE FROM emp WHERE id=$postIds");
		if($result){
		    $resultData = array('status' => true, 'message' => 'User Deleted Successfully...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Can\'t able to delete a post details...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Please enter post details...');
    }
 
    echo json_encode($resultData);

 
 ?>