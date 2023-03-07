

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
   
        $floor_no=$DecodedData['floor_no'];
        $room_no=$DecodedData['room_no'];
        $no_of_persons_sharing_per_room=$DecodedData['no_of_persons_sharing_per_room'];
        $bed_no=$DecodedData['bed_no'];
        $amount=$DecodedData['amount'];
        $status=$DecodedData['status'];
        
    
   
   
   // $joining_date=$DecodedData['joining_date'];
       

// date_default_timezone_set('Asia/Kolkata');
// $date1 =  date("Y-m-d");
// $time1 = date("h:i:sa");

   

// $timestamp = strtotime($date);
 
// // Creating new date format from that timestamp
// $date = date("Y-m-d", $timestamp);
    
 




$sql = "update `adding-bed-details`
set floor_no='$floor_no',room_no='$room_no',
no_of_persons_sharing_per_room='$no_of_persons_sharing_per_room',
bed_no = '$bed_no', amount ='$amount'
,status ='status'

where id =$id ";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Bed in Room  Details Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>" Bed in Room  Details Not Updated");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>


