

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

        $manager_email= $DecodedData['manager_email'];
$building_name= $DecodedData['building_name'];

        $tenant_name=$DecodedData['tenant_name'];
        
        $tenant_mobile= $DecodedData['tenant_mobile']; 
        
        $breakfast=$DecodedData['breakfast'];
        $lunch=$DecodedData['lunch'];
        $dinner=$DecodedData['dinner'];
        $date= $DecodedData['date']; 
      
        $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
        $bed_no=$DecodedData['bed_no'];
        
        $comments= $DecodedData['comments']; 
       
 
 
  
$id="";
 
if(empty($breakfast) && empty($lunch) && empty($dinner))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Select Any Meals");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

   
     

    
    else
{
    //building_name,manager_email,manager_mobile_no,
 
 
  $sql = "insert into `meals`(id,building_name,manager_email,tenant_name,tenant_mobile,floor_no,room_no,bed_no,breakfast,lunch,dinner,date,comments)
   values('$id','$building_name','$manager_email','$tenant_name','$tenant_mobile','$floor_no','$room_no','$bed_no','$breakfast','$lunch','$dinner','$date','$comments')";
            // $sql = "insert into tenant_registration1(id,tenant_name,lunch,tenant_mobile,
            // date,comments) values('$id','$tenant_name','$lunch','$tenant_mobile','$date','$comments')";





if ($conn->query($sql) === TRUE) 
{
   		  $Message = array("response"=>"success","status"=> 1,"message"=>"MEALS Details Registered succeesfully");
		 
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
		}
		else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"MEALS Details Not Registered");
  
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
  echo $sql;
  
}

   
  

//echo json_encode($data);




 
}
?>




