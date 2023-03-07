<?php
// include config file
include_once("config.php");
// session_start();
 header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');


    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
  
    	$pg_manager_email=$DecodedData['pg_manager_email'];
    	
    $bed_detailsGETQuery = "SELECT * FROM `adding-bed-details1` WHERE pg_manager_email = '$pg_manager_email'";
    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    
    if(mysqli_num_rows($run_bedsDetailsGETQuery) > 0)
    {
        $fetchData = mysqli_fetch_assoc($run_bedsDetailsGETQuery);
        
       
            
            $id=$fetchData['id'];
            $pg_manager_email=$fetchData['pg_manager_email'];
            $pg_manager_mobile_no=$fetchData['pg_manager_mobile_no'];
            $tenant_email=$fetchData['tenant_email'];
            $tenant_mobile_no=$fetchData['tenant_mobile_no'];
            $floor_no=$fetchData['floor_no'];
            $room_no=$fetchData['room_no'];
            $no_of_persons_sharing_per_room=$fetchData['no_of_persons_sharing_per_room'];
            $bed_no=$fetchData['bed_no'];
            $amount=$fetchData['amount'];
            $Available=$fetchData['Available'];
            
            $Message1 = array("response"=>"success","status"=> 1,"message"=>"Beds Details","pg_manager_email"=>"$pg_manager_email","pg_manager_mobile_no"=>"$pg_manager_mobile_no");

        //$Message = array("response"=>"success","status"=> 1,"message"=>"Beds Details","Mobile Number"=>"$tenant_mobile_no",
        //"Floor Number" => "$floor_no","Room  Number" => "$room_no","Sharing per Room" => "$no_of_persons_sharing_per_room",
        //"Bed Number"=>"$bed_no", "Amount"=>"$amount", "Availablity"=>"$Available");
          
          $Message = array("tenant_email"=>"$tenant_email","tenant_mobile_no"=>"$tenant_mobile_no",
        "floor_no" => "$floor_no","room_no" => "$room_no","no_of_persons_sharing_per_room" => "$no_of_persons_sharing_per_room",
        "bed_no"=>"$bed_no", "amount"=>"$amount", "Available"=>"$Available");
          
          
                 
            }
            
                else
                {
                    
                    $Message = array("response"=>"error","status"=> 0,"message"=>"No Room details found");
                   
                }
//                 $arr = json_decode($Message);

// echo $arr->Message[0]->tenant_email; //Thengode
// echo $arr->Message[0]->tenant_mobile_no; //Maharashtra
// echo $arr->Message[0]->$floor_no; //IN
            
$Response[]=array($Message1);


$Response[]=array($Message);
    echo json_encode($Response);
    
?>
    
    