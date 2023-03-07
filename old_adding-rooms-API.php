<?php




include("config.php");
$result=false;

//$data = array();


    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    $add_floors=$DecodedData['add_floors'];
    $add_rooms = $DecodedData['add_rooms'];
    $add_sharing= $DecodedData['add_sharing'];
    $id="";
       
$sql = "insert into manage_rooms(id,add_floors,add_rooms,add_sharing) values('$id','$add_floors','$add_rooms','$add_sharing')";



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





 
		