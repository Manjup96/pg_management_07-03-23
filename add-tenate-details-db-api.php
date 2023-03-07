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

        // $tenant_name=$DecodedData['tenant_name'];
        // $tenant_email=$DecodedData['tenant_email'];
        // $tenant_mobile= $DecodedData['tenant_mobile'];
       // $tenant_address= $DecodedData['tenant_address']; 
       
        // $tenant_aadhar_number= $DecodedData['tenant_aadhar_number']; 
        // $joining_date=$DecodedData['joining_date'];
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
//$tenant_image = $DecodedData['tenant_image'];

//   $comments=$DecodedData['comments'];
// $joining_date="";  
//$joining_date="SELECT DATE_FORMAT($joining_date, "%M %d %Y")";



   $tenant_name=$DecodedData['tenantName'];
        $tenant_email=$DecodedData['tenantEmail'];
        $tenant_mobile= $DecodedData['tenantMobileNumber'];
        $roomfees= $DecodedData['roomfees']; 
       
        $tenant_aadhar_number= $DecodedData['aadahrno']; 
        $joining_date=$DecodedData['tenantJoiningDate'];
$password = $DecodedData['tenantpassword'];
$tenant_address = $DecodedData['tenantAddress'];

  $comments=$DecodedData['tenantComments'];


$id="";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

$timestamp = strtotime($joining_date);
 
// Creating new date format from that timestamp
$joining_date = date("Y-m-d", $timestamp);


 
if(empty($tenant_name))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Name");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

    else if(empty($tenant_email)) 
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
else if(empty($tenant_aadhar_number))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Aadhaar Card number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    
    else
{
    
 
 
  $sql = "insert into `tenant_registration_without_image`(id,tenant_name,tenant_email,tenant_mobile,tenant_aadhar_number,comments,joining_date,password,tenant_address,	roomfees)
   values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_aadhar_number','$comments','$joining_date','$password','$tenant_address','$roomfees')";
            // $sql = "insert into tenant_registration1(id,tenant_name,tenant_email,tenant_mobile,
            // tenant_address,tenant_aadhar_number) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number')";







if ($conn->query($sql) === TRUE) 
{
   $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Details Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Details Not Registered");
  echo $sql;
  
}


//echo json_encode($data);




  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
}
?>





 
		





 



 
		