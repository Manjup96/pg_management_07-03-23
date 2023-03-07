<?php




include("config.php");
$result=false;

//$data = array();

     header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');
    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);
    
    

    $Name=$DecodedData['Name'];
    $Photo = $DecodedData['Photo'];
    $DOB= $DecodedData['DOB'];
    $Aadhaar_Card_No= $DecodedData['Aadhaar_Card_No'];
    $Gender=$DecodedData['Gender'];
    $Address = $DecodedData['Address'];
    $City= $DecodedData['City'];
    $District= $DecodedData['District'];
    $Pincode= $DecodedData['Pincode'];

   
    
     
    $date = str_replace('/', '-', $DOB);  
    $DOB_converted = date("Y-m-d", strtotime($date)); 

    $id="";
    
     if(empty($Name))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Name");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }
else if(empty($Photo))
{
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Upload Photo");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    else if(empty($DOB)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Date of Birth");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
    else if(empty($Aadhaar_Card_No))
    {
          $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Aadhaar Card No");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    } 
    else if(empty($Gender)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Gender");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
    else if(empty($Address))
    {
          $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Address");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    } 
    
    else if(empty($City)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter City");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
    else if(empty($District))
    {
          $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter District");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    } 
    else if(empty($Pincode))
    {
          $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Pincode");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    } 
    
    
    
    else
{
    
    
    $sql="select id from tbl_aadhaar where id=(select max(id) from tbl_aadhaar)";
      $result1=$conn->query($sql);
    
     if($result1->num_rows>0)
             {
                    if($row=mysqli_fetch_array($result1))
                    {
                    $id=$row['id']+1;
                    }
             }

$sql = "insert into `tbl_aadhaar`(id,Name,Photo,DOB,Aadhaar_Card_No,Gender,Address,City,District,Pincode) 
values('$id','$Name','$Photo','$DOB_converted','$Aadhaar_Card_No','$Gender','$Address','$City','$District','$Pincode')";



if ($conn->query($sql) === TRUE) 
{
   //$data['response'] = array("success" => "1", "msg" => "Registered Successfully");
   $Message = array("response"=>"success","status"=> 1,"message"=>"Aadhaar Deatils Inserted succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Aadhaar Deatils  NOT Inserted ");
  
  echo $sql;
}


$Response[]=array("Message"=>$Message);
    echo json_encode($Response);
}
?>





 
		