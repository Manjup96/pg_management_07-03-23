<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();


  $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
 $manager_email= $DecodedData['manager_email'];
$building_name= $DecodedData['building_name'];
$tenant_mobile= $DecodedData['tenant_mobile'];

 $bed_detailsGETQuery = 
 " SELECT id,building_name,manager_email,floor_no,room_no,bed_no,tenant_name,tenant_mobile, `breakfast`, `lunch`, `dinner`, `date`, `comments`,DATE_FORMAT(`date`, '%d-%m-%Y') as date from meals
 where manager_email='$manager_email' and building_name='$building_name' and tenant_mobile='$tenant_mobile' ORDER by id DESC ";
 
 
 
    


    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    

    $result=mysqli_fetch_all($run_bedsDetailsGETQuery,MYSQLI_ASSOC);
    
 if(mysqli_num_rows($run_bedsDetailsGETQuery) > 0)
      {
             echo json_encode($result);
      }
    
    



    else
    {
         $Message = array("response"=>"error","status"=> 0,"message"=>"No Data found for MEALS");
             
$Response[]=array("Message"=>$Message);
    echo json_encode($Response);

  
       // echo $bed_detailsGETQuery;
    }
   // exit(json_encode($result));
  
?>
    
    