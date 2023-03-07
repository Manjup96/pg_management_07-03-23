 
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



$sum=0;


$sql = "SELECT   SUM(expenditure_amount) as expense from `accounts` where manager_email='$manager_email' and building_name='$building_name' ORDER by id DESC ";


//$sql = "SELECT  SUM(expenditure_amount) as expense from `accounts`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

    $sum += $row['expense'];

}


$Response[]=array("Total Expenses"=>$sum);


    echo json_encode($Response);


?>
    
    