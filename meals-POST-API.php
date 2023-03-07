<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

include("config.php");
$result=false;

//$data = array();


    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
      
 $manager_email= $DecodedData['manager_email'];
$building_name= $DecodedData['building_name'];


    
    $date=$DecodedData['date'];
    $comments=$DecodedData['comments'];
    $tenant_mobile=$DecodedData['tenant_mobile'];

    $breakfast=$DecodedData['breakfast'];
    $lunch=$DecodedData['lunch'];
    $dinner=$DecodedData['dinner'];
   // $balance=$DecodedData['balance'];
   
    $id="";
    
 date_default_timezone_set('Asia/Kolkata');
//$date1 =  date("d-m-Y");



$timestamp = strtotime($date);
 
// Creating new date format from that timestamp
$date = date("Y-m-d", $timestamp);
    
   
if(empty($breakfast))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Breakfast Details");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

   
     else if(empty($lunch))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter lunch");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
else if(empty($dinner))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter dinner");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    
    else
{
    
  
//$sql = "insert into manage_rooms(id,add_floors,add_rooms,add_sharing,manager_email) values('$id','$add_floors','$add_rooms','$add_sharing','$manager_email')";



$sql="INSERT INTO meals(id,building_name,manager_email,tenant_name,date, breakfast, tenant_mobile, lunch, dinner, comments) VALUES ('$id',
'$building_name','$manager_email','$tenant_name','$date','$breakfast','$tenant_mobile','$lunch','$dinner','$comments')";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Meals Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Meals Not Registered");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
}
?>





 
		