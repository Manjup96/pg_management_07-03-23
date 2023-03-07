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










 $bed_detailsGETQuery = 
 " SELECT id,manager_mobile,news_description,news_type,DATE_FORMAT(`created_at`, '%d-%m-%Y') as created_at
 from news
 where manager_email='$manager_email' and building_name='$building_name' ORDER by id DESC ";
 
 
//$bed_detailsGETQuery = "SELECT * FROM `news` ORDER BY `news`.`created_at` DESC";  

//$bed_detailsGETQuery = "SELECT * FROM `news` ";  


    //$bed_detailsGETQuery = "SELECT * FROM `tenant_registration_without_image` ";
    
    //DATE_FORMAT($joining_date, "%M %d %Y")
    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    

    $result=mysqli_fetch_all($run_bedsDetailsGETQuery,MYSQLI_ASSOC);
    
    // if(mysqli_num_rows($run_bedsDetailsGETQuery) > 0)
    //  {
    //         echo json_encode($result);
    //  }
    
    
    exit(json_encode($result));

?>