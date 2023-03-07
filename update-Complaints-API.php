
 

 
		


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
       // $tenant_mobile= $DecodedData['tenant_mobile']; 
        $complaint_type=$DecodedData['complaint_type'];
        $complaint_description=$DecodedData['complaint_description'];
       // $created_date= $DecodedData['created_date']; 
      
       
        //$resolve_date= $DecodedData['resolve_date']; 
        //$joining_date=$DecodedData['joining_date'];
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
//$tenant_image = $DecodedData['tenant_image'];

  //$comments=$DecodedData['comments']; 
  
// $joining_date="";  
//$joining_date="SELECT DATE_FORMAT($joining_date, "%M %d %Y")";



date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

// $timestamp = strtotime($created_date);
 
// // Creating new date format from that timestamp
// $created_date = date("Y-m-d H:i:s", $timestamp);


// $timestamp = strtotime($resolve_date);
 
// // Creating new date format from that timestamp
// $resolve_date = date("Y-m-d ", $timestamp);

// $sql = "update `complaints`
// set tenant_mobile='$tenant_mobile',complaint_type ='$complaint_type', complaint_description ='$complaint_description',created_date ='$created_date',resolve_date='$resolve_date',comments='$comments'

// where id =$id ";


$sql = "update `complaints`
set complaint_type ='$complaint_type', complaint_description ='$complaint_description' where id =$id ";

if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Complaints Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Complaints Not Updated");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>


