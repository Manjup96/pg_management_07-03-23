
 
 <?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();


$sum=0;


$sql = "SELECT  SUM(due) as dues from `adding-bed-details1`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

    $sum += $row['dues'];

}

// echo ".$sum.";
// echo $sum;

 


$Response[]=array("Total Dues"=>$sum);

    echo json_encode($Response);


?>
    
    


    
    

