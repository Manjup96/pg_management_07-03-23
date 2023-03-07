
<?php            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");

 $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    $month=$DecodedData['month'];
    $year = $DecodedData['year'];
   
    
//$bed_detailsGETQuery = "SELECT * FROM `meals` ORDER BY `meals`.`date` DESC";

$bed_detailsGETQuery = "
select MONTHNAME(date) as Month,year(date) as Year,sum(income_amount) 
as Income from `accounts` group by year(date),month(date) order by year(date) desc;
";  


  $bed_detailsGETQuery = "SELECT id,date,type,tenant_mobile,month,year,income_amount,comments FROM `accounts` 
where  MONTH(date)=$month and YEAR(date)=$year  and income_amount!=0
order by DATE(date) desc";



    $run_bedsDetailsGETQuery = mysqli_query($conn, $bed_detailsGETQuery);
    

    $result=mysqli_fetch_all($run_bedsDetailsGETQuery,MYSQLI_ASSOC);
    
    
    
    exit(json_encode($result));

?>