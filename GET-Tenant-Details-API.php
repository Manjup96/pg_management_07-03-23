<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();




$bed_detailsGETQuery = "SELECT id,tenant_name,tenant_email,tenant_mobile,tenant_aadhar_number,tenant_address,comments,DATE_FORMAT(`joining_date`, '%d-%m-%Y') as joining_date from tenant_registration_without_image ORDER by id DESC";


//  $bed_detailsGETQuery = 
//  " SELECT id,tenant_name,tenant_mobile,complaint_description,complaint_type,resolve_date,comments,DATE_FORMAT(`created_date`, '%d-%m-%Y') as Date from complaints ORDER by   created_date DESC";
 
// $bed_detailsGETQuery = "SELECT * FROM tenant_registration_without_image ORDER BY id DESC";  


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
    
    