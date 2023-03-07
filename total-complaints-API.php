 
 <?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();


// $sql = "SELECT  SUM(income_amount) from `accounts`";
//$result = mysqli_query($conn,$sql);
//display data on web page
// while($row = mysqli_fetch_array($result))
// {
//     echo " Total income: ".  " ".$row['SUM(income_amount)'];
    
//}

$sum=0;


$sql = "SELECT  SUM(income_amount) as income from `accounts`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

    $sum += $row['income'];

}

// echo ".$sum.";
// echo $sum;

 


$Response[]=array("Total income"=>$sum);

    echo json_encode($Response);


?>
    
    