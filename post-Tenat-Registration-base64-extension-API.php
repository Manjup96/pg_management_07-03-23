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
        
        //tenant_image_base64_format_with_extension
        
        // $base64_image=$DecodedData['tenant_image_base64_format_with_extension[base64]'];
        // $ext_base64_image=$DecodedData['tenant_image_base64_format_with_extension[ext]'];
       
        $base64_image=$tenant_image_base64_format_with_extension["base64"];
        $ext_base64_image=$tenant_image_base64_format_with_extension["ext"];
       
        
         $dir="assets/images/".$tenant_name ."_".$tenant_mobile ."/";
       

if( !file_exists($dir) ) {
    mkdir($dir, 0755, true);
}
        $tenant_documents_base64 = $DecodedData['tenant_documents'];
        $tenant_documents_extension =".pdf";
         $tenant_documents_filepath=$dir.uniqid().$tenant_documents_extension;
       
        file_put_contents($tenant_documents_filepath,base64_decode($tenant_documents_base64));
        
       // $base64 = $DecodedData['tenant_image']; // json tenant image
        
        //
        
        //$base64=$tenant_image2->base64;
      //  $extension =".png";
        // $filepath="assets/images/".uniqid().$extension;
        
        // $filepath=$dir.uniqid().$extension;
        // file_put_contents($filepath,base64_decode($base64));
        // echo $extension;
        
        $filepath="assets/images/".uniqid().$ext_base64_image;
        
        $filepath=$dir.uniqid().$ext_base64_image;
        file_put_contents($filepath,base64_decode($base64_image));
        echo $ext_base64_image;
        
        
      //  echo $base64;
        echo $filepath;
        echo "jasdddddddd ----------------------------";
        $dir="assets/images/".$tenant_name ."_".$tenant_mobile ."/";
        //mkdir($dir,"0777",true);
        
       // $root = $_SERVER["DOCUMENT_ROOT"];
//$root = $_SERVER["HTTP_HOST"];
 //$dir = $root . '/assets/images/".$tenant_name ."/".$tenant_mobile ."/"';
//$dir =  '/assets/images/$tenant_name/$tenant_mobile/';

if( !file_exists($dir) ) {
    mkdir($dir, 0755, true);
}
        
        echo $dir;
        //mkdir("https://iqbetspro.com/home/u406176785/domains/iqbetspro.com/public_html/pg-management/assets/images/.$tenant_mobile/.$tenant_name",0777,true);
       // mkdir("https://iqbetspro.com/pg-management/ ".$tenant_name,0777,false); // .$tenant_mobile);
       // echo $mkdir;
         $website_addr_for_image="https://iqbetspro.com/pg-management/";
         
           $tenant_documents_filepath =$website_addr_for_image.$tenant_documents_filepath;
           $filepath =$website_addr_for_image.$filepath;
        

 $Message = array("response"=>"error","status"=> 0,"message"=>"Base64 to image uploaded");
 
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

         if(!empty($filepath))
         {
         
          $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
            tenant_address,tenant_aadhar_number,tenant_image,tenant_documents) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','$filepath','$tenant_documents_filepath')";
         }
        else if(!empty($filepath))
         {
         
          $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
            tenant_address,tenant_aadhar_number,tenant_image) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','$filepath')";
         }
 else if($tenant_email!="")
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





 
		





 



 
		