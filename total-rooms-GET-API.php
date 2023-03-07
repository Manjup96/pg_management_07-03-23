
 
 <?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

// include config file
include_once("config.php");
// session_start();


// $sql = "SELECT  COUNT(add_rooms) from `manage_rooms`";
// $result = mysqli_query($conn,$sql);
// //display data on web page
// while($row = mysqli_fetch_array($result))
// {
//     echo " Total Rooms: ".  " ".$row['COUNT(add_rooms)'];
    
// }


$total_no_of_rooms=0;

$sql = "SELECT  COUNT(add_rooms) as count from `manage_rooms`";


$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result))
{
    $count=$row['count'];
    while($count>0)
    {
        $total_no_of_rooms += 1;
        $count--;
    }
}


 


$Response[]=array("Total Rooms"=>$total_no_of_rooms);

    echo json_encode($Response);


?>
    
    

