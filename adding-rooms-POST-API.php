<?php




include("config.php");
$result=false;

//$data = array();

     header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');
    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    $add_floors=$DecodedData['add_floors'];
    $add_rooms = $DecodedData['add_rooms'];
    $add_sharing= $DecodedData['add_sharing'];
    $manager_email= $DecodedData['manager_email'];
    

    $id="";
$sql = "insert into manage_rooms(id,add_floors,add_rooms,add_sharing,manager_email) values('$id','$add_floors','$add_rooms','$add_sharing','$manager_email')";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Not Registered");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>





 
		