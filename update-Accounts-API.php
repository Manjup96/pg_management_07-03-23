


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
     $date=$DecodedData['date'];
    $type=$DecodedData['type'];
    $tenant_mobile=$DecodedData['tenant_mobile'];
    $expenditure_amount=$DecodedData['expenditure_amount'];
    $income_amount=$DecodedData['income_amount'];
    $balance=$DecodedData['balance'];
    $comments=$DecodedData['comments'];
    $month=$DecodedData['month'];
    $year=$DecodedData['year'];
   
   
   // $joining_date=$DecodedData['joining_date'];
       

date_default_timezone_set('Asia/Kolkata');
$date1 =  date("Y-m-d");
$time1 = date("h:i:sa");

   

$timestamp = strtotime($date);
 
// Creating new date format from that timestamp
$date = date("Y-m-d", $timestamp);
    
 




$sql = "update `accounts`
set date='$date',type='$type',tenant_mobile='$tenant_mobile',month = '$month', year ='$year',expenditure_amount ='expenditure_amount',income_amount='$income_amount',balance='$balance',comments='$comments'

where id =$id ";


if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Accounts Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Accounts Not Updated");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>


