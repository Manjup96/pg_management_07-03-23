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

   $tenant_email = $DecodedData['tenant_email'];

    $password=$DecodedData['password'];

    // $tenant_email = $_POST['tenant_email'];

    // $password= $_POST['password'];

    $tenant_emailQuery = "SELECT * FROM `tenant_registration_manager_email` WHERE tenant_email = '$tenant_email'";
    $runEmailQuery = mysqli_query($conn, $tenant_emailQuery);
     
    

    if(!$runEmailQuery)
    {
         $Message = array("response"=>"error","status"=> 1,"message"=>"User not Existed");
    }
    else
    {
        if(mysqli_num_rows($runEmailQuery) > 0)
        {
            $passwordQuery = "SELECT * FROM `tenant_registration_manager_email` WHERE tenant_email = '$tenant_email' AND password = '$password'";
            $runPasswordQuery = mysqli_query($conn, $passwordQuery);

            if(!$runPasswordQuery)
            {
                 $Message = array("response"=>"error","status"=> 1,"message"=>"Please Check Credentials");
                 
            }
            else{
                
                if(mysqli_num_rows($runPasswordQuery) > 0)
                {
                     $fetchData = mysqli_fetch_assoc($runPasswordQuery);
                     $tenant_name=$fetchData['tenant_name'];
                     $tenant_mobile= $fetchData['tenant_mobile'];
                     $tenant_mobile=$fetchData['tenant_mobile'];
                     $manager_email=$fetchData['manager_email'];
                     $manager_mobile_no= $fetchData['manager_mobile_no'];
                    $building_name= $fetchData['building_name'];
                    
                    
                    
                          
                    //  $_SESSION['user_id'] = $fetchData['tenant_email'];
                    // $_SESSION['password'] = $fetchData['$password'];
                     
                     //$_SESSION['LOG_IN'] ='yes';
                    
                   
                     $Message = array("response"=>"success","status"=> 1,"message"=>"Login successful","tenant_name" => "$tenant_name","tenant_email" => "$tenant_email","tenant_mobile" => "$tenant_mobile", "manager_email" => "$manager_email","manager_mobile_no" => "$manager_mobile_no","building_name" => "$building_name");

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



 
                  
