

<?php

    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
    header('Content-Type: application/json');


include("config.php");
$result=false;

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

        
        
        $tenant_mobile= $DecodedData['tenant_mobile']; 
        $complaint_type=$DecodedData['complaint_type'];
        $complaint_description=$DecodedData['complaint_description'];
        $created_date= $DecodedData['created_date']; 
      
        $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
    $tenant_name=$DecodedData['tenant_name'];
    $bed_no=$DecodedData['bed_no'];
        $resolve_date= $DecodedData['resolve_date']; 
        //$joining_date=$DecodedData['joining_date'];
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
//$tenant_image = $DecodedData['tenant_image'];

  $comments=$DecodedData['comments']; 
  
// $joining_date="";  
//$joining_date="SELECT DATE_FORMAT($joining_date, "%M %d %Y")";

$id="";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

$timestamp = strtotime($created_date);
 
// Creating new date format from that timestamp
$created_date = date("Y-m-d H:i:s", $timestamp);


$timestamp = strtotime($resolve_date);
 
// Creating new date format from that timestamp
$resolve_date = date("Y-m-d ", $timestamp);


 
if(empty($complaint_type))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter complaint_type");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

    else if(empty($complaint_description)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter email address");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
     else if(empty($tenant_mobile))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter mobile number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
else if(empty($resolve_date))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Aadhaar Card number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    
    else
{
    
 
 
  $sql = "insert into `complaints`(id,tenant_name,tenant_mobile,floor_no,room_no,bed_no,complaint_type,complaint_description,created_date,resolve_date,comments)
   values('$id','$tenant_name','$tenant_mobile','$floor_no','$room_no','$bed_no','$complaint_type','$complaint_description','$created_date','$resolve_date','$comments')";
            // $sql = "insert into tenant_registration1(id,tenant_name,complaint_description,tenant_mobile,
            // created_date,resolve_date) values('$id','$tenant_name','$complaint_description','$tenant_mobile','$created_date','$resolve_date')";





if ($conn->query($sql) === TRUE) 
{
   $Message = array("response"=>"success","status"=> 1,"message"=>"Complaints Details Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Complaints Details Not Registered");
  echo $sql;
  
}


//echo json_encode($data);




  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
}
?>





 
		





 



 
		