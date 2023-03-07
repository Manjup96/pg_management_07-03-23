

<?php

    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
    header('Content-Type: application/json');


include("config.php");
$result=false;

    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

        $manager_email= $DecodedData['manager_email'];
$building_name= $DecodedData['building_name'];

        $tenant_name=$DecodedData['tenant_name'];
        $tenant_email=$DecodedData['tenant_email'];
        $tenant_mobile= $DecodedData['tenant_mobile']; 
        $complaint_type=$DecodedData['complaint_type'];
        $complaint_description=$DecodedData['complaint_description'];
        $created_date= $DecodedData['created_date']; 
      
        $floor_no=$DecodedData['floor_no'];
    $room_no=$DecodedData['room_no'];
    $tenant_name=$DecodedData['tenant_name'];
    $bed_no=$DecodedData['bed_no'];
        $resolve_date= $DecodedData['resolve_date']; 
       $response= $DecodedData['response'];

  $comments=$DecodedData['comments']; 
  
// $joining_date="";  
//$joining_date="SELECT DATE_FORMAT($joining_date, "%M %d %Y")";

$id="";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

$timestamp = strtotime($created_date);
 
// Creating new date format from that timestamp
$created_date = date("Y-m-d H:i:s", $timestamp);


$timestamp = strtotime($resolve_date);
 
// Creating new date format from that timestamp
$resolve_date = date("Y-m-d ", $timestamp);


 
if(empty($complaint_type))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter complaint_type");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

    else if(empty($complaint_description)) 
    {
     
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter email address");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
     }
     else if(empty($tenant_mobile))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter mobile number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}

    
    else
{
    //building_name,manager_email,manager_mobile_no,
 
 
  $sql = "insert into `complaints`(id,building_name,manager_email,tenant_name,tenant_mobile,tenant_email,floor_no,room_no,bed_no,complaint_type,complaint_description,created_date,resolve_date,comments,response)
   values('$id','$building_name','$manager_email','$tenant_name','$tenant_mobile','$tenant_email','$floor_no','$room_no','$bed_no','$complaint_type','$complaint_description','$created_date','$resolve_date','$comments','$response')";
            // $sql = "insert into tenant_registration1(id,tenant_name,complaint_description,tenant_mobile,
            // created_date,resolve_date) values('$id','$tenant_name','$complaint_description','$tenant_mobile','$created_date','$resolve_date')";





if ($conn->query($sql) === TRUE) 
{
   
   
    // echo '<script>alert("Thank You for contacting us we will get back to you soon!");</script>';
 		 $to1=$manager_email;


			
		$subject1="Complaint From Tenant $tenant_name --- $tenant_mobile from Building $building_name";
		$from1=$tenant_email; 
	//	$from1="contact@iqbetspro.com";
		$message1= "Hi Team,".'<br/><br/>'."Complaint From, Following are the Tenant information.".'<br/><br/>'."Name : " . $tenant_name .'<br/>'."Email : " .$tenant_email.'<br/>'.
        '<br/>' ."Mobile Number : ".$tenant_mobile. '<br/><br/><br/><br/>'."Regards".'<br/>'. "Tenant" .'<br/>'
		.'<a href="">https://iqbetspro.com/pg_manager_new/index.php</a>' . '<br/>' . 
		'<img src=""  style="" width="160px" height="60px"/>'. '<br/>';
	
		
		$headers1 = "MIME-Version: 1.0" . "\r\n";
      $headers1 .= "From:  <$tenant_email>"."\r\n";
      $headers1 .= "Content-type: text/html; charset=utf8\r\n ";
	 
	 
		 if(mail($to1,$subject1,$message1,$headers1,'-fcontact@iqbetspro.com'))
	//	if(mail($to1,$subject1,$message1,$headers1,'fcontact@iqbetspro.com'))
		{  
		  
		$to=$manager_email;
		$subject="complaint from PG Tenant $tenant_name --- $tenant_mobile --- from Building $building_name !!!";
		$from=$tenant_email;
		
		$message= '<html><body><table width="100%" style="background-color:#dadada;border-collapse:collapse;border-spacing:0;border-collapse:collapse;border-spacing:0"><tbody><tr><td align="center"><table width="682" style="border-collapse:collapse;border-spacing:0"><tbody><tr class="m_-1958935385513098443header">
  <td bgcolor="#eeeeee"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="12">&nbsp;</td>
  </tr><tr><td><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td width="35">&nbsp;</td><td width="557"><table width="100%" border="0">
  <tbody>
  <tr>
  <center><td width="45%"><a href="" target="_blank""><img src="https://iqbetspro.com/pg-management/assets/images/logo-iiiq.png" width="140px" ></a></td></center>
  </tr>
  </tbody></table></td><td width="35">&nbsp;</td></tr></tbody></table></td></tr><tr>
  <table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td width="20" style="font-size:0;line-height:0">&nbsp;</td><td width="640" style="font-size:0;line-height:0"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="15">&nbsp;</td>
  </tr><tr><td style="background-color:#f8f8f8;border:1px solid #ebebeb"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="15">&nbsp;</td>
  </tr>
  
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="5">&nbsp;</td>
  </tr></tbody></table></td></tr></tbody></table>
  <table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">Dear PG Manager,
  </td></tr>
  <tr>
<td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">
  Name :  '. $tenant_name .'
       
   </td>
  </tr> 
   <tr>
<td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">
  Email : ' .$tenant_email.'
       
   </td>
  </tr> 
   
        
     <tr>
<td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">
  Mobile Number :  '.$tenant_mobile.'
       
   </td>
  </tr> 
  <tr>
<td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">
   PG Buiding Name : '.$building_name.'
       
   </td>
  </tr> 
  <br/>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> I have complaint Regarding ,
  </td>
  
  </tr>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">Complaint Type:'.$complaint_type.',
  </td></tr>
  <br/>
  <tr>
  
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">Complaint Description:'.$complaint_description.',
  </td></tr>
 
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;text-align:center;font-family:Arial,Helvetica,sans-serif;font-weight:normal">
  
  <div style="text-align:left"></div><div style="text-align:left"><span style="background-color:transparent">
  .</span>
  
  </div>
  </td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:21px;font-family:Arial,Helvetica,sans-serif;font-weight:normal">Regards,<br><span class="il">PG Tenant, </span> </td>
  </tr>
  <tr>
  <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:21px;font-family:Arial,Helvetica,sans-serif;font-weight:normal"><br><span class="il">'.$tenant_name.'</span> </td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="10">&nbsp;</td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="10">&nbsp;</td>
  </tr>
  </tbody></table>
  
  </td>
  <td width="20" style="font-size:0;line-height:0">&nbsp;</td>
  </tr>
  </tbody></table></td></tr>
  
  
  <tr>
  <td bgcolor="#eeeeee"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr>
  <td width="35">&nbsp;</td>
  <td width="557"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr>
  <td><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:center" height="25">&nbsp;</td>
  </tr>
  <tr>
  <td style="margin:0;color:#999999;font-size:11px;line-height:20px;font-family:Arial,Helvetica,sans-serif;font-style:normal;font-weight:normal;text-align:center">' . date('Y').'<span class="il">  PG Manager </span> |
   | <a href="https://iqbetspro.com/PG Manager/index.php#contact" style="color:#999999;font-size:11px;line-height:20px;font-family:Arial,Helvetica,sans-serif;font-style:normal;font-weight:normal;text-decoration:none" target="_blank" >Contact Us</a> <br>
   </td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="text-align:center"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  </table></td>
  </tr>
  </tbody></table></td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left;border-bottom:1px solid #dadada" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="25">&nbsp;</td>
  </tr>
  
  </tbody></table></td>
  <td width="35">&nbsp;</td>
  </tr>
  </tbody></table></td>
  </tr>
  
  </tbody></table></td>
  </tr>
  </tbody></table></body></html>';
	   
		$headers = "MIME-Version: 1.0" . "\r\n";
		 $headers .= "From: PG Manager <contact@iqbetspro.com>"."\r\n";
		$headers .= "Content-type: text/html; charset=utf8\r\n ";
	  
		if(mail($to,$subject,$message,$headers,'-fcontact@iqbetspro.com'))
		{
  
		  $Message = array("response"=>"success","status"=> 1,"message"=>"Complaints Details Registered succeesfully");
		 
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
		}
		else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Complaints Details Not Registered");
  
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
  echo $sql;
  
}

   
   
 } 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Complaints Details Not Registered");
  
  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
  echo $sql;
  
}

}
//echo json_encode($data);




 
}
?>




