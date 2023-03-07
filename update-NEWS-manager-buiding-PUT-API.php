
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
    
$created_at=$DecodedData['created_at'];
    

$news_type=$DecodedData['news_type'];
$news_description=$DecodedData['news_description'];

$timestamp = strtotime($created_at);

// Creating new date format from that timestamp
$created_at = date("Y-m-d", $timestamp);



$sql = "update `news`
set created_at='$created_at',news_type='$news_type',news_description = '$news_description'

where id =$id ";


if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"News Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"News Not Updated");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>

