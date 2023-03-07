

 
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



$sql = "SELECT  COUNT(*) as count from `complaints` where manager_email='$manager_email' and building_name='$building_name' ORDER by id DESC ";

$solved_complanits_sql = "SELECT  COUNT(*) as solved_complanits_count from `complaints` where manager_email='$manager_email' and building_name='$building_name' and status='Solved' ORDER by id DESC ";

$pending_complanits_sql = "SELECT  COUNT(*) as pending_complanits_count from `complaints` where manager_email='$manager_email' and building_name='$building_name' and status='Pending' ORDER by id DESC ";


$total_no_of_complaints=0;
$total_no_of_complaints_solved=0;
$total_no_of_complaints_pending=0;


$result = mysqli_query($conn,$sql);

$solved_complanits_result = mysqli_query($conn,$solved_complanits_sql);

$pending_complanits_result = mysqli_query($conn,$pending_complanits_sql);


while($row = mysqli_fetch_array($result))
{
$count=$row['count'];
while($count>0)
{
    $total_no_of_complaints += 1;
    $count--;
}
}


while($row = mysqli_fetch_array($solved_complanits_result))
{
$solved_complanits_count=$row['solved_complanits_count'];
// while($solved_complanits_count>0)
// {
//     $total_no_of_complaints_solved += 1;
    
//     $solved_complanits_count--;
     
// }
if($solved_complanits_count>0)
$total_no_of_complaints_solved =$solved_complanits_count;
}

while($row = mysqli_fetch_array($pending_complanits_result))
{
$pending_complanits_count=$row['pending_complanits_count'];
// while($pending_complanits_count>0)
// {
//   $total_no_of_complaints_pending += 1;
    
//     $pending_complanits_count--;
   
// }


if($pending_complanits_count>0)
 $total_no_of_complaints_pending =$pending_complanits_count;
}




$Response[]=array("Total Complaints"=>$total_no_of_complaints,
"Solved Complaints"=>$total_no_of_complaints_solved,
"Pending Complaints"=>$total_no_of_complaints_pending);

echo json_encode($Response);


?>

