

       


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
    $tenant_name=$DecodedData['tenant_name'];
    $tenant_email=$DecodedData['tenant_email'];
    $tenant_mobile= $DecodedData['tenant_mobile'];
    $tenant_address= $DecodedData['tenant_address']; 
    $tenant_aadhar_number= $DecodedData['tenant_aadhar_number']; 
$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
    
    
    
     $dir="assets/images/".$tenant_name ."_".$tenant_mobile ."/";
   

if( !file_exists($dir) ) {
mkdir($dir, 0755, true);
}
    $tenant_documents_base64 = $DecodedData['tenant_documents'];
    $tenant_documents_extension =".pdf";
     $tenant_documents_filepath=$dir.uniqid().$tenant_documents_extension;
  
    file_put_contents($tenant_documents_filepath,base64_decode($tenant_documents_base64));
    
    $base64 = $DecodedData['tenant_image']; // json tenant image
    
   
    
   
    $extension =".png";
    $filepath="assets/images/".uniqid().$extension;
    $filepath=$dir.uniqid().$extension;
    file_put_contents($filepath,base64_decode($base64));
    
 
    
    
    
  
if( !file_exists($dir) ) {
mkdir($dir, 0755, true);
}
    
   
     $website_addr_for_image="https://iqbetspro.com/pg-management/";
     
       $tenant_documents_filepath =$website_addr_for_image.$tenant_documents_filepath;
       $filepath =$website_addr_for_image.$filepath;
    




//date_default_timezone_set('Asia/Kolkata');
//$date1=Date('d-m-Y');


   
//  if(!empty($tenant_documents_filepath) || !empty($filepath) || !empty($tenant_aadhar_photo_filepath) )
//       {
// $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
// tenant_address,tenant_aadhar_number,tenant_aadhar_photo,tenant_image) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','$tenant_aadhar_photo','$tenant_image')";
// }
// else
// {

//      if(!empty($tenant_documents_filepath))
//      {
     
//       $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
//         tenant_address,tenant_aadhar_number,tenant_image,tenant_documents) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','$filepath','$tenant_documents_filepath')";
//      }
//     else if(!empty($filepath))
//      {
     
//       $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
//         tenant_address,tenant_aadhar_number,tenant_image) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','$filepath')";
//      }
// else if($tenant_email!="")
// {
//         $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
//         tenant_address,tenant_aadhar_number) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number')";

// }



// date_default_timezone_set('Asia/Kolkata');
// $date1 =  date("Y-m-d");
// $time1 = date("h:i:sa");

   
$sql = "UPDATE `tenant_registration` SET `tenant_name`='$tenant_name',
`tenant_email`='$tenant_email',`tenant_mobile`='$tenant_mobile',`tenant_address`='$tenant_address',
`tenant_aadhar_number`='$tenant_aadhar_number',`tenant_aadhar_photo`='$tenant_aadhar_photo',
`tenant_image`='$filepath',`tenant_documents`='$tenant_documents_filepath' 
where id ='$id' ";
// $sql = "update `tbl_enquiry`
// set Name='$Name',Mobile_Number='$Mobile_Number',Email='$Email',enquiry_date = '$enquiry_date', Remarks ='$Remarks',Reference ='$Reference'

// where id =$id ";

if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Registred Deatils Updated succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Registred Deatils  Not Updated ");
  
 // echo $sql;
}

// echo $sql;
$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>





 
