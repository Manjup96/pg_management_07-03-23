<?php


            
    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');

include("config.php");
$result=false;

//$data = array();


    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    
    $date=$DecodedData['date'];
    $type=$DecodedData['type'];
    $tenant_mobile=$DecodedData['tenant_mobile'];
    $expenditure_amount=$DecodedData['expenditure_amount'];
    $income_amount=$DecodedData['income_amount'];
   // $balance=$DecodedData['balance'];
    $comments=$DecodedData['comments'];
    $month=$DecodedData['month'];
    $year=$DecodedData['year'];
    
    
//$sum_of_balance=0;
$sum_of_income=0;


$sum_of_expenidture=0;


$sql = "SELECT  SUM(income_amount) as income from `accounts`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

    $sum_of_income += $row['income'];

}




$sql = "SELECT  SUM(expenditure_amount) as expense from `accounts`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

    $sum_of_expenidture += $row['expense'];

}

   
$sum_of_balance=($sum_of_income)-($sum_of_expenidture);
//$balance=$sum_of_balance;


if($income_amount>0)
{
    $sum_of_balance += $income_amount;
}
else if($expenditure_amount>0)
{
    $sum_of_balance -= $expenditure_amount;
}

 $balance=$sum_of_balance;
// echo ".$sum.";
// echo $sum;

 


//$Response[]=array("Total income"=>$sum);

    

    $id="";
    
 date_default_timezone_set('Asia/Kolkata');
//$date1 =  date("d-m-Y");



$timestamp = strtotime($date);
 
// Creating new date format from that timestamp
$date = date("Y-m-d", $timestamp);
    
   
if(empty($type))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Account Type Income or Expenditure");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

   
  
    
    else
{
    
  
//$sql = "insert into manage_rooms(id,add_floors,add_rooms,add_sharing,manager_email) values('$id','$add_floors','$add_rooms','$add_sharing','$manager_email')";
$sql="INSERT INTO accounts(id,date, type, tenant_mobile,month,year, expenditure_amount, income_amount, balance, comments) VALUES ('$id','$date','$type','$tenant_mobile','$month','$year','$expenditure_amount','$income_amount','$balance','$comments')";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Accounts Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Accounts Not Registered");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
}
?>





 
		