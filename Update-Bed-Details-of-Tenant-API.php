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
    
    	$pg_manager_email=$DecodedData['pg_manager_email'];
    	$pg_manager_mobile_no=$DecodedData['pg_manager_mobile_no'];
    	$tenant_email=$DecodedData['tenant_email'];
    	$tenant_mobile_no=$DecodedData['tenant_mobile_no'];
    		
    			
    $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
    $no_of_persons_sharing_per_room=$DecodedData['no_of_persons_sharing_per_room'];
    $bed_no=$DecodedData['bed_no'];
    $amount=$DecodedData['amount'];
    
    
    $paid_amount=$DecodedData['paid_amount'];
    $due=$DecodedData['due'];
       $id=$DecodedData['id'];


    

// $joining_date=$DecodedData['joining_date'];
    
    
    
// $timestamp = strtotime($joining_date);
 
// // Creating new date format from that timestamp
// $joining_date = date("Y-m-d", $timestamp);


     
    

$sql =" UPDATE `adding-bed-details1` SET `tenant_email`='$tenant_email',`tenant_mobile_no`='$tenant_mobile_no',`floor_no`='$floor_no',`room_no`='$room_no',`no_of_persons_sharing_per_room`='$no_of_persons_sharing_per_room',`bed_no`='$bed_no',`amount`='$amount',`paid_amount`='$paid_amount',`due`='$due'

where id =$id ";

if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Bed Deatils Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Bed Deatils  Not Updated ");
  
 // echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>