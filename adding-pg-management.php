<?php

include("config.php");
$result=false;

$data = array();


$property_name=mysqli_real_escape_string($conn,$_POST['property_name']);

   $property_email=mysqli_real_escape_string($conn,$_POST['property_email']);
   
   $property_phone=mysqli_real_escape_string($conn,$_POST['property_phone']);
   $pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
   $password=mysqli_real_escape_string($conn,$_POST['password']);
  // $enquiry=mysqli_real_escape_string($conn,$_POST['enquiry']); 
    //$enquiry_source=mysqli_real_escape_string($conn,$_POST['enquiry_source']); 
  

 date_default_timezone_set('Asia/Kolkata');
$date1 =  date("d-m-Y");
$time1 = date("h:i:sa");



	$result=mysqli_query($conn,"select id from pg_management where id=(select max(id) from pg_management)");
	if($row=mysqli_fetch_array($result))
	{
		$id=$row['id']+1;
	}


	
  
$sql="INSERT INTO pg_management(id,property_name,property_email,property_phone,pincode,password,date1,time1,) VALUES ('$id','$property_name','$property_email','$property_phone','$pincode','$password','$date1','$time1')";


 
		if ($conn->query($sql) === TRUE) 
		  {
			 $data['response'] = array("success" => "1", "msg" => "Inserted Successfully");
		} 
		  else 
		  {
            $data['response'] = array("success" => "0", "msg" => "Not Inserted");
            echo $sql;
          }


echo json_encode($data);
?>