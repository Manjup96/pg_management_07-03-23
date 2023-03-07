<?php

include("config.php");
//$result=false;

//$data = array();
        //building_name`, `manager_email`, `manager_mobile
        
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    	$pg_manager_email=$DecodedData['pg_manager_email'];
    	$pg_manager_mobile_no=$DecodedData['pg_manager_mobile_no'];
    	$tenant_email=$DecodedData['tenant_email'];
    	$tenant_mobile_no=$DecodedData['tenant_mobile_no'];
    		
    			
    $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
    $no_of_persons_sharing_per_room=$DecodedData['no_of_persons_sharing_per_room'];
    $bed_no=$DecodedData['bed_no'];
    $amount=$DecodedData['amount'];
    $Available=$DecodedData['Available'];
    
    $paid_amount=$DecodedData['paid_amount'];
    $due=$DecodedData['due'];
       


    
$id="";
// $joining_date=$DecodedData['joining_date'];
    
    
    
// $timestamp = strtotime($joining_date);
 
// // Creating new date format from that timestamp
// $joining_date = date("Y-m-d", $timestamp);


 
if(empty($pg_manager_email))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter PG manager email");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }
    else if(empty($pg_manager_mobile_no))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter PG manager mobile");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

    // else if(empty($tenant_email)) 
    // {
     
    //   $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Tenant email address");
 

    // $Response[]=array("Message"=>$Message);
    // echo json_encode($Response);   
    //  }
    //  else if(empty($tenant_mobile_no))
    // { 
    // $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Tenant mobile number");
 

    // $Response[]=array("Message"=>$Message);
    // echo json_encode($Response);   
    // }
else if(empty($floor_no))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Floor number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
else if(empty($room_no))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter  room number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response); 
    
}
else if(empty($no_of_persons_sharing_per_room))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter  number of persons sharing per room");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response); 
    
}
 
else if(empty($bed_no))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Bed number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response); 
    
}
else if(empty($amount))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Room Fee amount ");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response); 
    
}

   
   
else if(empty($Available))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter  Room avialbility ");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response); 
    
}
   
    
   
      
// else if(empty($paid_amount))
// { 
//     $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Amount Paid");
 

//     $Response[]=array("Message"=>$Message);
//     echo json_encode($Response); 
    
// }
   
// else if(empty($due))
// { 
//     $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Due amount");
 

//     $Response[]=array("Message"=>$Message);
//     echo json_encode($Response); 
    
// }

else
{
    
 
 
    
        //$sql = "insert into adding-bed-details1 (email,mobile_no,floor_no,room_no,no_of_persons_sharing_per_room,bed_no,amount,status) values ('$email','$mobile_no','$floor_no','$room_no','$no_of_persons_sharing_per_room','$bed_no','$amount','$status')";
        
        $sql = "insert into `adding-bed-details1`
        (id,pg_manager_email,pg_manager_mobile_no,tenant_email,tenant_mobile_no,floor_no,room_no,no_of_persons_sharing_per_room,bed_no,amount,paid_amount,due,Available)
        values ('$id','$pg_manager_email','$pg_manager_mobile_no','$tenant_email','$tenant_mobile_no','$floor_no','$room_no','$no_of_persons_sharing_per_room','$bed_no','$amount','$paid_amount','$due','$Available')";
        
        //'$date1',  joining_date,
        if ($conn->query($sql) === TRUE) 
        {
           //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
           $Message = array("response"=>"success","status"=> 1,"message"=>"Bed Deatils Added succeesfully");
             
        } 
        else 
        {
          //$data['response'] = array("success" => "0", "msg" => "Not Registered");
          $Message = array("response"=>"error","status"=> 0,"message"=>"Bed Deatils Not Added");
          
          echo $sql;
        }
        
        
        $Response[]=array("Message"=>$Message);
            echo json_encode($Response);
}
?>
