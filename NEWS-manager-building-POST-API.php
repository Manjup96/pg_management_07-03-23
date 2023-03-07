

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


    
    $created_at=$DecodedData['created_at'];
    
    $manager_mobile=$DecodedData['manager_mobile'];
    $news_type=$DecodedData['news_type'];
    $news_description=$DecodedData['news_description'];
   
   // $comments=$DecodedData['comments'];
    
 
    

    $id="";
    
 //date_default_timezone_set('Asia/Kolkata');
//$date1 =  date("d-m-Y");



$timestamp = strtotime($created_at);
 
// Creating new date format from that timestamp
$created_at = date("Y-m-d", $timestamp);
    
   
if(empty($manager_mobile))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Manager Mobile Number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

   
    
     else if(empty($news_type))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter News Type");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
else if(empty($news_description))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter News Description");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    
    else
{
    
  
//$sql = "insert into manage_rooms(id,add_floors,add_rooms,add_sharing,manager_email) values('$id','$add_floors','$add_rooms','$add_sharing','$manager_email')";
$sql="INSERT INTO news(id,building_name,manager_email,created_at, manager_mobile, news_type, news_description) VALUES ('$id','$building_name','$manager_email','$created_at','$manager_mobile','$news_type','$news_description')";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"News Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"News Not Registered");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
}
?>





 
		