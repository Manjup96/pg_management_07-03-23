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

        $tenant_name=$DecodedData['tenant_name'];
        $tenant_email=$DecodedData['tenant_email'];
        $tenant_mobile= $DecodedData['tenant_mobile'];
        $tenant_address= $DecodedData['tenant_address']; 
       $password= $DecodedData['password']; 
     //  $roomfees=$DecodedData['roomfees']; 
        $tenant_aadhar_number= $DecodedData['tenant_aadhar_number']; 
        $joining_date=$DecodedData['joining_date'];
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
//$tenant_image = $DecodedData['tenant_image'];

  $comments=$DecodedData['comments'];


$id="";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

$timestamp = strtotime($joining_date);
 

 //$joining_date = date("Y-m-d H:i:s", $timestamp);
 

 $result_email=mysqli_query($conn,"select * from tenant_registration_without_image where tenant_email ='$tenant_email'");

  $result_mobile=mysqli_query($conn,"select * from tenant_registration_without_image where tenant_mobile ='$tenant_mobile'");
  
  $result_aadhaar=mysqli_query($conn,"select * from tenant_registration_without_image where tenant_aadhar_number ='$tenant_aadhar_number'");
  
  $aadhaar_rows=mysqli_num_rows($result_aadhaar);
  
  $email_rows=mysqli_num_rows($result_email);
  //echo $email_rows;
  $mobile_rows=mysqli_num_rows($result_mobile);
	
	if($email_rows>0 && $mobile_rows>0 && $aadhaar_rows>0)
	{
	
	     $Message = array("response"=>2,"status"=> 0,"message"=>" Tenant Mobile number,Email and Aadhaar number  is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
	}
	
	else	if($email_rows>0 && $mobile_rows>0 )
	{
	
	     $Message = array("response"=>3,"status"=> 0,"message"=>" Both Tenant Mobile number and Email   is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
	}
	else	if( $mobile_rows>0 && $aadhaar_rows>0)
	{
	
	     $Message = array("response"=>4,"status"=> 0,"message"=>" Both  Tenant Mobile number and Aadhaar number  is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
	}
	else	if($email_rows>0  && $aadhaar_rows>0)
	{
	
	     $Message = array("response"=>5,"status"=> 0,"message"=>" Both Email and Aadhaar number  is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
	}
	

 else if($email_rows>0)
	{

	    $Message = array("response"=>6,"status"=> 0,"message"=>"Tenant Email is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
    }

    else if($mobile_rows>0)
		{
		    $Message = array("response"=>7,"status"=> 0,"message"=>"Tenant Mobile number is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response); 
		    
		}
	else	if($aadhaar_rows>0)
	{
	
	     $Message = array("response"=>8,"status"=> 0,"message"=>" Aadhaar number  is Already Registered");
	     $Response[]=array("Message"=>$Message);
  echo json_encode($Response);
	}
    
 else if(empty($tenant_name))
    {
      
       $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Name");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);
    }

    else if(empty($tenant_email)) 
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
else if(empty($tenant_aadhar_number))
{ 
    $Message = array("response"=>"error","status"=> 0,"message"=>"Please Enter Aadhaar Card number");
 

    $Response[]=array("Message"=>$Message);
    echo json_encode($Response);   
}
    
    else
{
    
 
 
  $sql = "insert into `tenant_registration_without_image`(id,tenant_name,tenant_email,tenant_mobile,tenant_aadhar_number,comments,joining_date,password,tenant_address)
   values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_aadhar_number','$comments','$joining_date','$password','$tenant_address')";
            // $sql = "insert into tenant_registration1(id,tenant_name,tenant_email,tenant_mobile,
            // tenant_address,tenant_aadhar_number) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number')";

if ($conn->query($sql) === TRUE) 
{
     // echo '<script>alert("Thank You for contacting us we will get back to you soon!");</script>';
 		 $to1="pg_manager@iqbetspro.com";


			
		$subject1="New Tenant Contact Info";
		$from1="contact@iqbetspro.com"; 
	//	$from1="contact@iqbetspro.com";
		$message1= "Hi Team,".'<br/><br/>'."New Tenant filled the Registration form. Following are the Tenant information.".'<br/><br/>'."Name : " . $tenant_name .'<br/>'."Email : " .$tenant_email.'<br/>'.
        '<br/>' ."Mobile Number : ".$tenant_mobile. '<br/><br/><br/><br/>'."Regards".'<br/>'. "PG Manager" .'<br/>'
		.'<a href="">https://iqbetspro.com/pg_manager_new/index.php</a>' . '<br/>' . 
		'<img src=""  style="" width="160px" height="60px"/>'. '<br/>';
	
		
		$headers1 = "MIME-Version: 1.0" . "\r\n";
      $headers1 .= "From: PG Manager <pg_manager@iqbetspro.com>"."\r\n";
      $headers1 .= "Content-type: text/html; charset=utf8\r\n ";
	 
		 if(mail($to1,$subject1,$message1,$headers1,'-fcontact@iqbetspro.com'))
	//	if(mail($to1,$subject1,$message1,$headers1,'fcontact@iqbetspro.com'))
		{  
		  
		$to=$tenant_email;
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
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left">Dear '.$tenant_name.',
  </td></tr>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Your Registered Details,
  </td>
  </tr>
  <tr>
 

  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Mobile Number : '.$tenant_mobile.',
  </td></tr>
  <tr>
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Email ( Please Use Your Email ID as USERNAME )  : '.$tenant_email.',
  </td>
  </tr>
  <tr> 
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Passowrd ( to Login ) : '.$password.',
  </td></tr>
   <tr>
  <tr> 
  <td style="vertical-align:top;margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;text-align:left"> Aadhaar number : '.$tenant_aadhar_number.',
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
  
		 $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Details Registered succeesfully");
		 
		}
	}
    
    
  // $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Details Registered succeesfully");
     
} 
else 
{
  //$data['response'] = array("success" => "0", "msg" => "Not Registered");
  $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Details Not Registered");
  echo $sql;
  
}


//echo json_encode($data);




  $Response[]=array("Message"=>$Message);
   echo json_encode($Response);
}
?>





 
		





 



 
		