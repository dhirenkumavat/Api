<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
        header("Access-Control-Allow-Headers: authorization, Content-Type");
include_once('connection.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
 
 $content = trim(file_get_contents("php://input"));
    $request = json_decode($content,true);	
     if(empty($request['id'])|| empty($request['firstName'])){
		setError("empty param !!!");
	}else{
 $id = $request['id'];
                $firstName = $request['firstName'];
         	    $lastName= $request['lastName'];
                 $mobile =  $request['mobile'];
                 $email =   $request['email'];
                 $username =  $request['username'];
	    	     $password =  $request['password'];
		         $address =  $request['address'];
		         $age =  $request['age'];
		          $salary =  $request['salary'];
		      

$strQuerynot = mysqli_query($con,"UPDATE `emp` SET `firstName`='$firstName',`lastName`='$lastName',`mobile`='$mobile',`email`='$email',`username`='$username',`password`='$password',`address`='$address',`age`='$age',`salary`='$salary' WHERE id='$id' ");
     if ($strQuerynot) {
$json=array("status" => true, "msg" =>"New User Update Successfully");
   	   }else{
        setError("User creation failed");
        
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