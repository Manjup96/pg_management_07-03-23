
<?php
  // header('Access-Control-Allow-Origin: https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_state_for_nested');
     header('Access-Control-Allow-Origin: https://www.w3schools.com');
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
    header('Content-Type: application/json');
   // header('Access-Control-Allow-Methods','Content-Type','Authorization');

include("config.php");
$result=false;

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

        $manager_email= $DecodedData['manager_email'];


        $PG_Name=$DecodedData['PG_Name'];
        $manager_email=$DecodedData['manager_email'];
       
        $manager_mobile=$DecodedData['manager_mobile'];
        $floor=$DecodedData['floor'];
      
     
       
    $room=$DecodedData['room'];
    $PG_Name=$DecodedData['PG_Name'];
    $bed=$DecodedData['bed'];
       
$id="";

// date_default_timezone_set('Asia/Kolkata');
// $date1=Date('d-m-Y');

// $timestamp = strtotime($created_date);
 
// // Creating new date format from that timestamp
// $created_date = date("Y-m-d H:i:s", $timestamp);
// $timestamp = strtotime($resolve_date);
 

 
if(empty($PG_Name))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter PG Name");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

    else if(empty($floor)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Floor");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
      //`PG_Name`, `manager_mobile`, `manager_email`, `floor`, `room`, `bed`
    
    
    else
{
    //building_name,manager_email,manager_mobile_no,
 //INSERT INTO `configure_PG` (`id`, `PG_Name`, `manager_mobile`, `manager_email`, `floor`, `room`, `bed`) VALUES


 
  $sql = "insert into `configure_PG`(`id`, `PG_Name`, `manager_mobile`, `manager_email`, `floor`, `room`, `bed`)
   values('$id','$PG_Name', '$manager_mobile', '$manager_email', '$floor', '$room', '$bed')";
            // $sql = "insert into tenant_registration1(id,PG_Name,floor,tenant_mobile,
            // created_date,resolve_date) values('$id','$PG_Name','$floor','$tenant_mobile','$created_date','$resolve_date')";





if ($conn->query($sql) === TRUE) 
{
   
   
  
		  $Message = array("response"=>"success","status"=> 1,"message"=>"Configuring PG Details Registered succeesfully");
		 
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
		}
		else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Configuring PG  Details Not Registered");
  
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
  echo $sql;
  
}

   
 

}
//echo json_encode($data);




 

?>




