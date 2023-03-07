<?php

session_start(); 
if(!isset($_SESSION['LOG_IN'])){
   header("Location:loginapi.php");
}
else
{
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
}



include("config.php");
$result=false;

//$data = array();

     
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

    $property_name=$DecodedData['property_name'];
    $property_email = $DecodedData['property_email'];
    $property_phone= $DecodedData['property_phone'];

$pincode= $DecodedData['pincode']; 

    $password=$DecodedData['password'];

//$property_id = mysqli_real_escape_string($conn,$_POST['property_id']);
//$property_name=mysqli_real_escape_string($conn,$_POST['property_name']);

//$property_email=mysqli_real_escape_string($conn,$_POST['property_email']);
//$property_phone= mysqli_real_escape_string($conn,$_POST['property_phone']);

//$pincode= mysqli_real_escape_string($conn,$_POST['pincode']); 
//$password= mysqli_real_escape_string($conn,$_POST['password']); 
$id="";
$subscription="Free";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

// $result=mysqli_query($conn,"select id from pg_management where id=(select max(id) from pg_management)");
// 	if($row=mysqli_fetch_array($result))
// 	{
// 		$id=$row['id']+1;
// 	}


       
$sql = "insert into pg_management(id,property_name,property_email,property_phone,pincode,password,registered_date,subscription) values('$id','$property_name','$property_email','$property_phone','$pincode','$password','$date1','$subscription')";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Not Registered");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>





 
		