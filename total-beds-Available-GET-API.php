

 
 <?php


            
header('Access-Control-Allow-Origin:*');  
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
 header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();




$total_no_of_available_beds=0;

$sql = "SELECT  COUNT(*) as count from `adding-bed-details1` where Available='Yes' or Available='yes'";

//$sql="SELECT  COUNT(bed_no) as count from `adding-bed-details1` where id=(select max(id) from enquiryform)");
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result))
{
$count=$row['count'];
while($count>0)
{
    $total_no_of_available_beds += 1;
    $count--;
}
}





$Response[]=array("Total Available Beds"=>$total_no_of_available_beds);

echo json_encode($Response);


?>

