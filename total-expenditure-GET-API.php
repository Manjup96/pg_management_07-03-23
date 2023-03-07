 
 <?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();


// $sql = "SELECT  SUM(expenditure_amount) from `accounts`";
// $result = mysqli_query($conn,$sql);
// //display data on web page
// while($row = mysqli_fetch_array($result))
// {
//     echo " Total Expenditure : ".  " ".$row['SUM(expenditure_amount)'];
    
// }

$sum=0;


$sql = "SELECT  SUM(expenditure_amount) as expense from `accounts`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

    $sum += $row['expense'];

}

// echo ".$sum.";
// echo $sum;

 


$Response[]=array("Total Expenses"=>$sum);

    echo json_encode($Response);


?>
    
    

   
    