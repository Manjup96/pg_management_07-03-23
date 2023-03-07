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
    
    	$Id=$DecodedData['Id'];
    	$Name=$DecodedData['Name'];
    	$Mobile_Number=$DecodedData['Mobile_Number'];
    	$Email=$DecodedData['Email'];
    		
    			
    $enquiry_date=$DecodedData['enquiry_date'];
    $Remarks=$DecodedData['Remarks'];
    $Reference=$DecodedData['Reference'];
   
   
   // $joining_date=$DecodedData['joining_date'];
       

date_default_timezone_set('Asia/Kolkata');
$date1 =  date("Y-m-d");
$time1 = date("h:i:sa");

   

$sql = "update `tbl_enquiry`
set Name='$Name',Mobile_Number='$Mobile_Number',Email='$Email',enquiry_date = '$enquiry_date', Remarks ='$Remarks',Reference ='$Reference'

where Id =$Id ";

if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Enquiry Deatils Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Enquiry Deatils  Not Updated ");
  
 // echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>





 
