
<?php            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();

// select MONTHNAME(date),year(date),sum(income_amount)
// from accounts
// group by year(date),month(date)
// order by year(date),month(date);


$bed_detailsGETQuery = "SELECT * FROM `meals` ORDER BY `meals`.`date` DESC";

$bed_detailsGETQuery = "
select MONTHNAME(date),year(date),sum(income_amount) 
from `accounts` group by year(date),month(date) order by year(date) desc;
";  






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