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

    
    
    
    $Name=$DecodedData['Name'];
    $Mobile_Number= $DecodedData['Mobile_Number'];
    $Email= $DecodedData['Email'];
    $Remarks=$DecodedData['Remarks'];
    $Reference=$DecodedData['Reference'];
    
     
      

date_default_timezone_set('Asia/Kolkata');
$date1 =  date("d-m-Y");
$time1 = date("h:i:sa");

    
$id="";
$enquiry_date="";

      
      if(empty($Name))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Name");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }
else if(empty($Mobile_Number))
{
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter mobile number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    else if(empty($Email)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter email address");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
    // else if(empty($Reference))
    // {
    //       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter form did you get Reference");
 

    // $Response[]=array("Message"=>$Message);
    // echo json_encode($Response);
    // } 
    else
{
  
$sql="INSERT INTO `tbl_enquiry`(`id`, `building_name`,manager_email,`Name`, `Mobile_Number`, `Email`, `Remarks`, `Reference`)  VALUES ('$id','$building_name','$manager_email','$Name','$Mobile_Number','$Email','$Remarks','$Reference')";

//  $manager_email= $DecodedData['manager_email'];
// $building_name= $DecodedData['building_name'];

if ($conn->query($sql) == TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Not Registered");
  
 // echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
}
?>





 
		