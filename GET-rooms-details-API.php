<?php
// include config file
include_once("config.php");
// session_start();

        
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

    //$EncodedData=file_get_contents('php://input');
    //$DecodedData=json_decode($EncodedData,true);
    
    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

    $manager_email = $DecodedData['manager_email'];

  
    

    

    $id="";




    $rooms_details_Query = "SELECT * FROM `manage_rooms` WHERE manager_email = '$manager_email'";
    $run_rooms_details_Query = mysqli_query($conn, $rooms_details_Query);
     
    

    if(mysqli_num_rows($run_rooms_details_Query) > 0)
    {
        $fetchData = mysqli_fetch_assoc($run_rooms_details_Query);
        $add_floors=$fetchData['add_floors'];
        $add_rooms= $fetchData['add_rooms'];
        $add_sharing=$fetchData['add_sharing'];
       
        $Message = array("response"=>"success","status"=> 1,"message"=>"Rooms Details","No.of Floors" => "$add_floors","No.of Rooms" => "$add_rooms","Sharing per Room" => "$add_sharing");
                 
            }
            
                else
                {
                    
                    $Message = array("response"=>"error","status"=> 0,"message"=>"No Room details found");
                   
                }
            

$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>