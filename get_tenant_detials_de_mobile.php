<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();

$tenantMobileNumber = $_GET["tenantMobileNumber"];


$bed_detailsGETQuery = "SELECT *FROM tenant_registration_without_image where tenant_mobile = '$tenantMobileNumber'";  


    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    

    $result=mysqli_fetch_all($run_bedsDetailsGETQuery,MYSQLI_ASSOC);
 
    
    exit(json_encode($result));

 
?>
    
    