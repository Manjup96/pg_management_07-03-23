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

        $tenant_name=$DecodedData['tenant_name'];
        $tenant_email=$DecodedData['tenant_email'];
        $tenant_mobile= $DecodedData['tenant_mobile'];
        $tenant_address= $DecodedData['tenant_address']; 
        $tenant_aadhar_number= $DecodedData['tenant_aadhar_number']; 
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
       
       
//       $x = array("response"=>"error","status"=> 0,"message"=>"Base64 to image uploaded");
//  echo $Message[response];
       
      //  $base64 = $DecodedData['tenant_image']; // json tenant image
        //$tenant_image1 = $DecodedData['tenant_image']; 
        
        
  $Response1=array($tenant_image_base64=>$DecodedData['tenant_image']);
   
        
        //
        
        
        $base64=$Response1[$tenant_image_base64]->base64;
      $extension =$Response1[$tenant_image_base64]->ext;
      
      
    //   $base64=$Response1->base64;
    //   $extension =$Response1->ext;
        $extension =".png";
        $filepath="assets/images/".uniqid().$extension;
      //  file_put_contents($filepath,base64_decode($base64));
        echo $extension;
        echo $base64;
        echo $filepath;

 $Message = array("response"=>"error","status"=> 0,"message"=>"Base64 to image uploaded");
 echo $Message[response];
 
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
    
$id="";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');


       
//       if($tenant_aadhar_photo!="" && $tenant_image!="")
//       {
// $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
// tenant_address,tenant_aadhar_number,tenant_aadhar_photo,tenant_image) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','$tenant_aadhar_photo','$tenant_image')";
// }
// else
// {

    
 if($tenant_email!="")
 {
            $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
            tenant_address,tenant_aadhar_number) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number')";

}


// }


if ($conn->query($sql) === TRUE) 
{
   $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Details Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Details Not Registered");
  
  
}


//echo json_encode($data);




  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
?>





 
		





 



 
		