<?php
// include config file
include_once("config.php");
 //session_start();

 header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

    //$EncodedData=file_get_contents('php://input');
    //$DecodedData=json_decode($EncodedData,true);
    
    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

    $property_email = $DecodedData['property_email'];

    $password=$DecodedData['password'];

    // $property_email = $_POST['property_email'];

    // $password= $_POST['password'];

    $property_emailQuery = "SELECT * FROM `pg_management` WHERE property_email = '$property_email'";
    $runEmailQuery = mysqli_query($conn, $property_emailQuery);
     
    

    if(!$runEmailQuery)
    {
         $Message = array("response"=>"error","status"=> 1,"message"=>"login error here");
    }
    else
    {
        if(mysqli_num_rows($runEmailQuery) > 0){
            $passwordQuery = "SELECT * FROM `pg_management` WHERE property_email = '$property_email' AND password = '$password'";
            $runPasswordQuery = mysqli_query($conn, $passwordQuery);

            if(!$runPasswordQuery)
            {
                 $Message = array("response"=>"error","status"=> 1,"message"=>"login error");
                 
            }
            else{
                
                if(mysqli_num_rows($runPasswordQuery) > 0)
                {
                     $fetchData = mysqli_fetch_assoc($runPasswordQuery);
                     $property_name=$fetchData['property_name'];
                     $property_phone= $fetchData['property_phone'];
                     $pincode=$fetchData['pincode'];
                    
                          
                    //  $_SESSION['user_id'] = $fetchData['property_email'];
                    // $_SESSION['password'] = $fetchData['$password'];
                     
                     //$_SESSION['LOG_IN'] ='yes';
                    
                   
                    
                    $Message = array("response"=>"success","status"=> 1,"message"=>"login succeesfully","property_name" => "$property_name","property_email" => "$property_email","property_phone" => "$property_phone","pincode" => "$pincode");
                   

                }
                else
                {
                    
                    $Message = array("response"=>"error","status"=> 1,"message"=>"login error");
                   
                }
            }
        }
        else
        {
            $Message = array("response"=>"error","status"=> 1,"message"=>"login error");
        
        }
    }

$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
?>