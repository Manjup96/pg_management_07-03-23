<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

include("config.php");
$result=false;

//$data = array();


    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    
   // $registered_date=$DecodedData['registered_date'];
    // $type=$DecodedData['type'];
    
    $manager_name = $DecodedData['manager_name'];
    $manager_email= $DecodedData['manager_email'];
    $manager_mobile= $DecodedData['manager_mobile'];
    $password=$DecodedData['password'];
    
    
    
    
$registered_date="";
    $id="";
  
date_default_timezone_set('Asia/Kolkata');
$date1 =  date("d-m-Y");
$time1 = date("h:i:sa");

   
 


    
   

 
 $sql1="select * from `tbl_register_pg_manager` where `manager_email`='$manager_email' ";
       
         $sql2="select * from `tbl_register_pg_manager` where `manager_mobile`='$manager_mobile' ";

        $result1=mysqli_query($conn,$sql1);
        $result2=mysqli_query($conn,$sql2);

 
  $rowcount1=mysqli_num_rows($result1);
  $rowcount2=mysqli_num_rows($result2);

             if(($rowcount1==1) && ($rowcount2==1))
             {
                  
                
                         $Message = array("response"=>"error","status"=> 0,"message"=>"Email And Mobile number already registered");
                         $Response[]=array("Message"=>$Message);
                        echo json_encode($Response);
                         
            }
            
                    else if($rowcount1==1)
                     {
                        $Message = array("response"=>"error","status"=> 0,"message"=>"Email  already registered");
                         $Response[]=array("Message"=>$Message);
                        echo json_encode($Response);
                     }
            
            
             else if($rowcount2==1)
             {
                 
                  $Message = array("response"=>"error","status"=> 0,"message"=>"Mobile number  already registered");
                 $Response[]=array("Message"=>$Message);
                echo json_encode($Response);
             }
  
  else 
  {



		
		 
	

// $sql="INSERT INTO `tbl_register_pg_manager`(`id`, `manager_name`, `manager_email`, `manager_mobile`, `password`,`registered_date`) VALUES ('$id','$manager_name','$manager_email','$manager_mobile','$password','$registered_date')";

        
        $sql="INSERT INTO `tbl_register_pg_manager`(`id`, `manager_name`, `manager_email`, `manager_mobile`, `password`) VALUES ('$id','$manager_name','$manager_email','$manager_mobile','$password')";
        
        
        
        if ($conn->query($sql) === TRUE) 
        {
           //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
           $Message = array("response"=>"success","status"=> 1,"message"=>"PG Manager Registered succeesfully");
             
        } 
        else 
        {
            
          //$data['response'] = array("success" => "0", "msg" => "Not Registered");
          $Message = array("response"=>"error","status"=> 0,"message"=>"PG Manager Not Registered");
          
         // echo $sql;
        }
        
        
        $Response[]=array("Message"=>$Message);
            echo json_encode($Response);
  }
?>





 
		