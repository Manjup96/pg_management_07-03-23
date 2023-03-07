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
    
    $building_name=$DecodedData['building_name'];
    	$manager_email=$DecodedData['manager_email'];
    	$manager_mobile=$DecodedData['manager_mobile'];
    	$tenant_email=$DecodedData['tenant_email'];
    	$tenant_mobile=$DecodedData['tenant_mobile'];
    		
    		$tenant_name=$DecodedData['tenant_name'];
    		
    $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
   // $no_of_persons_sharing_per_room=$DecodedData['no_of_persons_sharing_per_room'];
    $bed_no=$DecodedData['bed_no'];
    $amount=$DecodedData['amount'];
    $Available=$DecodedData['Available'];
    
    $paid_amount=$DecodedData['paid_amount'];
    $due=$DecodedData['due'];
   // $joining_date=$DecodedData['joining_date'];
       

date_default_timezone_set('Asia/Kolkata');
$date1 =  date("Y-m-d");
$time1 = date("h:i:sa");

    
$id="";
$joining_date="";
    
//$sql = "insert into adding-bed-details1 (email,mobile_no,floor_no,room_no,no_of_persons_sharing_per_room,bed_no,amount,status) values ('$email','$mobile_no','$floor_no','$room_no','$no_of_persons_sharing_per_room','$bed_no','$amount','$status')";

$sql = "update `adding-bed-details1`
set Available='$Available', tenant_name='$tenant_name' ,tenant_email='$tenant_email' ,tenant_mobile='$tenant_mobile',joining_date='$date1',
paid_amount='$paid_amount',due='$due',building_name='$building_name',manager_email ='$manager_email', manager_mobile='$manager_mobile'
    	
where floor_no = '$floor_no' and room_no ='$room_no' and bed_no ='$bed_no' ";

    
    	

//echo $sql;
//'$date1',  joining_date,
if ($conn->query($sql) === TRUE) 
{
   if($Available="no"||$Available="No")
   {
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Succeesfully Assigned Bed to Tenant");
   }
   else
   {
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Bed Assigned to another Tenant");
   }
   
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Bed Deatils Not Added");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>
