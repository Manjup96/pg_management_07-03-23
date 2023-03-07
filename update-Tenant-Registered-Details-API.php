

       


<?php

include("config.php");
//$result=false;

//$data = array();
        
        
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    $id=$DecodedData['id'];
    $tenant_name=$DecodedData['tenant_name'];
    $tenant_email=$DecodedData['tenant_email'];
    $tenant_mobile= $DecodedData['tenant_mobile'];
  
    $tenant_aadhar_number= $DecodedData['tenant_aadhar_number']; 
    $comments=$DecodedData['comments'];
    $joining_date=$DecodedData['joining_date'];  
    
    
  //  $joining_date_converted = date("d-m-Y", strtotime($joining_date)); 
    
// date_default_timezone_set('Asia/Kolkata');
// $date1 =  date("Y-m-d");
// $time1 = date("h:i:sa");

   
   
   
$sql = "UPDATE `tenant_registration_without_image` SET `tenant_name`='$tenant_name',
`tenant_email`='$tenant_email',`tenant_mobile`='$tenant_mobile',
`tenant_aadhar_number`='$tenant_aadhar_number',`comments`='$comments',
`joining_date`='$joining_date'
where id ='$id' ";


if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Registred Deatils Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Registred Deatils  Not Updated ");
  
 // echo $sql;
}

// echo $sql;
$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>





 
