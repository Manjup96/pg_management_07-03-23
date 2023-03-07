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

    $manager_email = $DecodedData['manager_email'];

    $password=$DecodedData['password'];

    // $manager_email = $_POST['manager_email'];

    // $password= $_POST['password'];

    $manager_emailQuery = "SELECT * FROM `tbl_register_pg_manager` WHERE manager_email = '$manager_email'";
    $runEmailQuery = mysqli_query($conn, $manager_emailQuery);
     
    

    if(!$runEmailQuery)
    {
         $Message = array("response"=>"error","status"=> 1,"message"=>"login error here");
    }
    else
    {
        if(mysqli_num_rows($runEmailQuery) > 0){
            $passwordQuery = "SELECT * FROM `tbl_register_pg_manager` WHERE manager_email = '$manager_email' AND password = '$password'";
            $runPasswordQuery = mysqli_query($conn, $passwordQuery);

            if(!$runPasswordQuery)
            {
                 $Message = array("response"=>"error","status"=> 1,"message"=>"login error");
                 
            }
            else{
                
                if(mysqli_num_rows($runPasswordQuery) > 0)
                {
                     $fetchData = mysqli_fetch_assoc($runPasswordQuery);
                     $manager_name=$fetchData['manager_name'];
                     $manager_mobile= $fetchData['manager_mobile'];
                     //$pincode=$fetchData['pincode'];
                    
                          
                    //  $_SESSION['user_id'] = $fetchData['manager_email'];
                    // $_SESSION['password'] = $fetchData['$password'];
                     
                     //$_SESSION['LOG_IN'] ='yes';
                    
                   
                    
                    $Message = array("response"=>"success","status"=> 1,"message"=>"login succeesfully","manager_name" => "$manager_name","manager_email" => "$manager_email","manager_mobile" => "$manager_mobile");
                   

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