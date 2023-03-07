

<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();



 
 
 $bed_detailsGETQuery = 
 " SELECT id,tenant_name, tenant_email, tenant_mobile, DATE_FORMAT(`joined_date`, '%d-%m-%Y') as joined_date , floor_no,room_no, bed_no, tenant_address, tenant_aadhar_number, tenant_aadhar_photo, tenant_image, tenant_documents
 from tbl_vacated_tenant ORDER by   id DESC";
   // $bed_detailsGETQuery = "SELECT * FROM `tbl_vacated_tenant`";
    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    

    $result=mysqli_fetch_all($run_bedsDetailsGETQuery,MYSQLI_ASSOC);
    
    // if(mysqli_num_rows($run_bedsDetailsGETQuery) > 0)
    //  {
    //         echo json_encode($result);
    //  }
    
    
    exit(json_encode($result));

?>
    