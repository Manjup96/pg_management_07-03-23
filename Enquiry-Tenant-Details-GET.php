<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();


   // SELECT *FROM tenant_registration_without_image ORDER BY joining_date DESC;   enquiry_date
   
     $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
 $manager_email= $DecodedData['manager_email'];
$building_name= $DecodedData['building_name'];



   
 $bed_detailsGETQuery = 
 " SELECT Id,building_name,Name,Mobile_Number,Email,Remarks,Reference,DATE_FORMAT(`enquiry_date`, '%d-%m-%Y') as enquiry_date from tbl_enquiry 
 where manager_email='$manager_email' and building_name='$building_name' ORDER by id DESC ";
 
 //   $bed_detailsGETQuery = "SELECT *FROM `tbl_enquiry` ORDER BY id DESC";
    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    

    $result=mysqli_fetch_all($run_bedsDetailsGETQuery,MYSQLI_ASSOC);
    
    
    
 if(mysqli_num_rows($run_bedsDetailsGETQuery) > 0)
      {
             echo json_encode($result);
      }
    
    else
    {
        echo $bed_detailsGETQuery;
    }
    
    
   // exit(json_encode($result));

?>
    