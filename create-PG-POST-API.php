
<?php

    header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
    header('Content-Type: application/json');


include("config.php");
$result=false;
//`PG_Name`, manager_mobile`, `manager_email, `landmark`, `city`, `pincode`, `state`, `address`, `PG_Type
    
    $EncodedData=file_get_contents('php://input');
    $DecodedData=json_decode($EncodedData,true);

        //$building_name=$DecodedData['building_name'];
        $manager_email=$DecodedData['manager_email'];
        $manager_mobile=$DecodedData['manager_mobile'];
        $PG_Name=$DecodedData['PG_Name'];
        $landmark=$DecodedData['landmark'];
        $city= $DecodedData['city'];
        $address= $DecodedData['address']; 
       $pincode= $DecodedData['pincode']; 
       
       
     //  $roomfees=$DecodedData['roomfees']; 
        $state= $DecodedData['state']; 
        $PG_Type=$DecodedData['PG_Type'];
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
//$tenant_image = $DecodedData['tenant_image'];

 


$id="";

  $sql = "insert into `create_PG`(id,manager_email,manager_mobile,PG_Name,landmark,city,state,PG_Type,pincode,address)
   values('$id','$manager_email','$manager_mobile','$PG_Name','$landmark','$city','$state','$PG_Type','$pincode','$address')";
            

if ($conn->query($sql) === TRUE) 
{
     // echo '<script>alert("Thank You for contacting us we will get back to you soon!");</script>';
 		 $to1="pg_manager@iqbetspro.com";


			
		$subject1="New Tenant Contact Info";
		$from1="contact@iqbetspro.com"; 
	//	$from1="contact@iqbetspro.com";
		$message1= "Hi Team,".'<br/><br/>'."New Tenant filled the Registration form. Following are the Tenant information.".'<br/><br/>'."Name : " . $PG_Name .'<br/>'."Email : " .$manager_email.'<br/>'.
        '<br/>' ."Mobile Number : ".$city. '<br/><br/><br/><br/>'."Regards".'<br/>'. "PG Manager" .'<br/>'
		.'<a href="">https://iqbetspro.com/pg_manager_new/index.php</a>' . '<br/>' . 
		'<img src=""  style="" width="160px" height="60px"/>'. '<br/>';
	
		
		$headers1 = "MIME-Version: 1.0" . "\r\n";
      $headers1 .= "From: PG Manager <pg_manager@iqbetspro.com>"."\r\n";
      $headers1 .= "Content-type: text/html; charset=utf8\r\n ";
	 
		 if(mail($to1,$subject1,$message1,$headers1,'-fcontact@iqbetspro.com'))
	//	if(mail($to1,$subject1,$message1,$headers1,'fcontact@iqbetspro.com'))
		{  
		  
		$to=$manager_email;
		$subject="Greetings from PG Manager!!!";
		$from="pg_manager@iqbetspro.com";
		
		$message= '<html><body><table width="100%" style="background-color:#dadada;border-collapse:collapse;border-spacing:0;border-collapse:collapse;border-spacing:0"><tbody><tr><td align="center"><table width="682" style="border-collapse:collapse;border-spacing:0"><tbody><tr class="m_-1958935385513098443header">
  <td bgcolor="#eeeeee"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="12">&nbsp;</td>
  </tr><tr><td><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td width="35">&nbsp;</td><td width="557"><table width="100%" border="0">
  <tbody>
  <tr><center><td width="45%"><a href="" target="_blank""><img src="https://iqbetspro.com/pg-management/assets/images/logo-iiiq.png" width="140px" ></a></td></center>
  </tr>
  </tbody></table></td><td width="35">&nbsp;</td></tr></tbody></table></td></tr><tr>
  <table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td width="20" style="font-size:0;line-height:0">&nbsp;</td><td width="640" style="font-size:0;line-height:0"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="15">&nbsp;</td>
  </tr><tr><td style="background-color:#f8f8f8;border:1px solid #ebebeb"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="15">&nbsp;</td>
  </tr><tr><td style="margin:0;color:#1e4a7b;font-size:20px;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-style:normal;font-weight:normal;text-align:center">
  Greetings from PG Manager!!!!</td></tr><tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="5">&nbsp;</td>
  </tr></tbody></table></td></tr></tbody></table>
  <table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
  <tbody><tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">Dear '.$PG_Name.',
  </td></tr>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Your Registered Details,
  </td>
  </tr>
  <tr>
 

  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Mobile Number : '.$city.',
  </td></tr>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Email ( Please Use Your Email ID as USERNAME )  : '.$manager_email.',
  </td>
  </tr>
  <tr> 
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Passowrd ( to Login ) : '.$pincode.',
  </td></tr>
   <tr>
  <tr> 
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Aadhaar number : '.$state.',
  </td></tr>
   <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Please login Using this link <a href="https://iqbetspro.com/pg_tenant/"> https://iqbetspro.com/pg_tenant/</a>,
  </td></tr>
  
 
  
  <tr>
  <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
  </tr>
  <tr>
  <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;text-align:center;font-family:Arial,Helvetica,sans-serif;font-weight:normal">
  
  <div style="text-align:left"></div><div style="text-align:left"><span style="background-color:transparent">
  Thank you for Registering in our PG , We are heartly welcoming to our PG.</span>
  
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
  <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:21px;font-family:Arial,Helvetica,sans-serif;font-weight:normal">Regards,<br><span class="il">PG Manager</span> </td>
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
  
		 $Message = array("response"=>"success","status"=> 1,"message"=>"PG Details Registered succeesfully");
		  $Response[]=array("Message"=>$Message);
		  echo json_encode($Response);
		}
	
    
    
  // $Message = array("response"=>"success","status"=> 1,"message"=>"PG Details Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"PG Details Not Registered");
   $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
  echo $sql;
  
}


 
   
}
?>





 
		





 



 
		