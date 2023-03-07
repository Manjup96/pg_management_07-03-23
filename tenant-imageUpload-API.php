
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
//$tenant_image = $DecodedData['tenant_image'];

   $extension = pathinfo($_FILES['tenant_image']['name'], PATHINFO_EXTENSION);

	$db_uploading_tenant_image = time() . '.' . $extension;

	move_uploaded_file($_FILES['tenant_image']['tmp_name'], '/assets/images/' . $db_uploading_tenant_image);

// $imagename=$_FILES["tenant_aadhar_photo"]["name"];

// $dist="./img/".$imagename;

// $dist1="img/".$imagename;

// move_uploaded_file($_FILES["tenant_aadhar_photo"]["tmp_name"],$dist);


// $imagename=$_FILES["tenant_image"]["name"];

// $dist2="./img/".$imagename;

// $dist3="img/".$imagename;

// move_uploaded_file($_FILES["tenant_image"]["tmp_name"],$dist);

// $extension = pathinfo($dist1,PATHINFO_EXTENSION);


// $extension = pathinfo($dist1,PATHINFO_EXTENSION);

// $extension = pathinfo($_FILES['tenant_image']['name'], PATHINFO_EXTENSION);

// 	$new_name = time() . '.' . $extension;

// 	move_uploaded_file($_FILES['tenant_image']['tmp_name'], 'images/' . $new_name);

$id="";

   
   



date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

if($extension != "jpeg" || $extension != "jpg" || $extension != "png" || $extension != "bmp" || $extension != "gif" || $extension != "tiff")
{
   echo "File Format Not Suppoted";
} 
else	
{
      

$sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
tenant_address,tenant_aadhar_number,tenant_aadhar_photo,tenant_image) values
('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number','','$db_uploading_tenant_image')";

        
        if ($conn->query($sql) === TRUE) 
        {
          $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Details Registered succeesfully");
            
        } 
        else 
        {
         //$data['response'] = array("success" => "0", "msg" => "Not Registered");
         $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Details Not Registered");
         
         
        }
        

 $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
}
//  else
//  {

 
//             $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
//             tenant_address,tenant_aadhar_number) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number')";

// }


// }




//echo json_encode($data);



?>