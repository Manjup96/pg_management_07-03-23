<?php

include("config.php");
//$result=false;

//$data = array();
        
        
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
 
 //`adding-bed-details1`(`id`, `building_name`, `manager_email`, `manager_mobile`, `tenant_name`, `tenant_email`, `tenant_mobile`
    
    	$manager_email=$DecodedData['manager_email'];
    	$manager_mobile=$DecodedData['manager_mobile'];
    	$tenant_email=$DecodedData['tenant_email'];
    	$tenant_mobile=$DecodedData['tenant_mobile'];
    		
    		$tenant_name=$DecodedData['tenant_name'];
    		
    $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
    $no_of_persons_sharing_per_room=$DecodedData['no_of_persons_sharing_per_room'];
    $bed_no=$DecodedData['bed_no'];
    $amount=$DecodedData['amount'];
    $Available=$DecodedData['Available'];
    
    $paid_amount=$DecodedData['paid_amount'];
    $due=$DecodedData['due'];
   // $joining_date=$DecodedData['joining_date'];
       

date_default_timezone_set('Asia/Kolkata');
$date1 =  date("Y-m-d");
$time1 = date("h:i:sa");

    
$id="";
$joining_date="";



       
$get_tenant_Details_sql_query="SELECT `tenant_name`, `tenant_email`, `tenant_mobile`, `tenant_address`, `tenant_aadhar_number`, `tenant_aadhar_photo`, `tenant_image`,  `tenant_documents` FROM `tenant_registration` WHERE tenant_mobile='$tenant_mobile'";

//echo $get_tenant_Details_sql_query;

//$result = $mysqli->query($get_tenant_Details_sql_query);
$result = mysqli_query($conn, $get_tenant_Details_sql_query);
//echo $result;

//$result = $mysqli->query("SELECT Code, Name FROM Country ORDER BY Name");

/* Get the number of rows in the result set */
$row_cnt = $result->num_rows;

//echo $row_cnt;



if ($result->num_rows > 0)
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    $tenant_name=$row["tenant_name"];
    $tenant_email=$row["tenant_email"];
    $tenant_mobile=$row["tenant_mobile"];
    $tenant_address=$row["tenant_address"];
    $tenant_aadhar_number=$row["tenant_aadhar_number"];
    $tenant_aadhar_photo=$row["tenant_aadhar_photo"];
     $tenant_image=$row["tenant_image"];
      $tenant_documents=$row["tenant_documents"];
    
   //echo $tenant_mobile;
  }
  
  
  $result=mysqli_query($conn,"select id from tbl_vacated_tenant where id=(select max(id) from tbl_vacated_tenant)");
	if($row=mysqli_fetch_array($result))
	{
		$id=$row['id']+1;
	}
  
  $tbl_vacated_tenant_sql = "INSERT INTO `tbl_vacated_tenant`(`id`, `tenant_name`, `tenant_email`, `tenant_mobile`, `floor_no`, `room_no`, `bed_no`,`tenant_address`,`tenant_aadhar_number`,`tenant_image`,`tenant_documents`) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$floor_no', '$room_no', '$bed_no','$tenant_address','$tenant_aadhar_number','$tenant_image','$tenant_documents')";
  
  //echo $tbl_vacated_tenant_sql;

if ($conn->query($tbl_vacated_tenant_sql) === TRUE) 
{
   
   
$sql = "UPDATE `adding-bed-details1` SET 
`tenant_name`='',
`tenant_email`='',`tenant_mobile`='',
`paid_amount`='',`due`='',
`Available`='Yes'
where tenant_mobile=$tenant_mobile";


    
        if ($conn->query($sql) === TRUE) 
        {
           //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
           $Message = array("response"=>"success","status"=> 1,"message"=>" Bed Vacated by Tenant  Deatils Updated succeesfully");
             
        } 
        else 
        {
          //$data['response'] = array("success" => "0", "msg" => "Not Registered");
          $Message = array("response"=>"error","status"=> 0,"message"=>"Bed Vacated by Tenant  Deatils  Not Updated ");
          
         // echo $sql;
        }
        
//}        

// echo $sql;
$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
}
}
    
?>





 

   