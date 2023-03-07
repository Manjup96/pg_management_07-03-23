
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
$tenant_aadhar_number= $DecodedData['tenant_aadhar_number']; 
//$tenant_aadhar_photo = $DecodedData['tenant_aadhar_photo'];
//$tenant_image = $DecodedData['tenant_image'];

   
$id=""; 
 



date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');



	
	  $sql = "insert into tenant_registration(id,tenant_name,tenant_email,tenant_mobile,
           tenant_address,tenant_aadhar_number) values('$id','$tenant_name','$tenant_email','$tenant_mobile','$tenant_address','$tenant_aadhar_number')";
		echo $sql;
    //echo json_encode($sql);

if ($conn->query($sql) === TRUE) 
{ 
	  
	 
		  
 		 $to1="koduri.bhagath@gmail.com";
       // $to1=$tenant_email;

			
		$subject1="New User Contact Info";
		$from1="info@potauto.in";
	
		$message1= "Hi Team,".'<br/><br/>'."New User filled the contact form. Following are the User information.".'<br/><br/>'."tenant_name : " . $tenant_name .'<br/>'."tenant_email : " .$tenant_email.'<br/>'.
        '<br/>' ."tenant_mobile : ".$tenant_mobile. '<br/>' ."tenant_aadhar_number : ".$tenant_aadhar_number.'<br/><br/><br/>'."Regards".'<br/>'. "PG Managaemnet" .'<br/>'
		.'<a href="">PG Managaemnet.com</a>' . '<br/>' . 
		'<img src=""  style="" width="160px" height="60px"/>'. '<br/>';
		
		
		$headers1 = "MIME-Version: 1.0" . "\r\n";
      $headers1 .= "From: PG Managaemnet <info@potauto.in>"."\r\n";
      $headers1 .= "Content-type: text/html; charset=utf8\r\n ";
	 
		 if(mail($to1,$subject1,$message1,$headers1,'-finfo@potauto.in'))
	//	if(mail($to1,$subject1,$message1,$headers1,'-fkoduri.bhagath@gmail.com'))
		{  
		  
                        $to=$tenant_email;
                        $subject="Greetings from PG Managaemnet!!!";
                        $from="koduri.bhagath@gmail.com";
                        
                        $message= '<html><body><table width="100%" style="background-color:#dadada;border-collapse:collapse;border-spacing:0;border-collapse:collapse;border-spacing:0"><tbody><tr><td align="center"><table width="682" style="border-collapse:collapse;border-spacing:0"><tbody><tr class="m_-1958935385513098443header">
                <td bgcolor="#eeeeee"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
                <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="12">&nbsp;</td>
                </tr><tr><td><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
                <tbody><tr><td width="35">&nbsp;</td><td width="557"><table width="100%" border="0">
                <tbody><tr><center><td width="45%"><a href="" target="_blank""><img src="https://iqbetspro.com/pg-management/assets/images/logo.png" width="140px" ></a></td></center></tr>
                </tbody></table></td><td width="35">&nbsp;</td></tr></tbody></table></td></tr><tr>
                <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left;border-bottom:3px solid #2f94d7" height="18">&nbsp;</td></tr></tbody></table></td></tr><tr><td bgcolor="#ffffff"> 
                <table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
                <tbody><tr><td width="20" style="font-size:0;line-height:0">&nbsp;</td><td width="640" style="font-size:0;line-height:0"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
                <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="15">&nbsp;</td>
                </tr><tr><td style="background-color:#f8f8f8;border:1px solid #ebebeb"><table width="100%" border="0" style="border-collapse:collapse;border-spacing:0">
                <tbody><tr><td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="15">&nbsp;</td>
                </tr><tr><td style="margin:0;color:#1e4a7b;font-size:20px;line-height:24px;font-family:Arial,Helvetica,sans-serif;font-style:normal;font-weight:normal;text-align:center">
                Greetings from PG Managaemnet!!!!</td></tr><tr>
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
                <td style="line-height:0;font-size:0;vertical-align:top;padding:0px;text-align:left" height="20">&nbsp;</td>
                </tr>
                <tr>
                <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:24px;text-align:center;font-family:Arial,Helvetica,sans-serif;font-weight:normal">
                
                <div style="text-align:left"></div><div style="text-align:left"><span style="background-color:transparent">
                Thank you for contacting us, We will get back to you soon!! </span>
                
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
                <td style="margin:0;padding:0;font-size:16px;color:#231f20;line-height:21px;font-family:Arial,Helvetica,sans-serif;font-weight:normal">Regards,<br><span class="il">PG Managaemnet</span> Team</td>
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
                <td style="margin:0;color:#999999;font-size:11px;line-height:20px;font-family:Arial,Helvetica,sans-serif;font-style:normal;font-weight:normal;text-align:center">' . date('Y').'<span class="il">  PG Managaemnet</span> |
                | <a href="https://www.iiiqbets.com/contacts/" style="color:#999999;font-size:11px;line-height:20px;font-family:Arial,Helvetica,sans-serif;font-style:normal;font-weight:normal;text-decoration:none" target="_blank" >Contact Us</a> <br>
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
                        $headers .= "From: PG Managaemnet <koduri.bhagath@gmail.com>"."\r\n";
                        $headers .= "Content-type: text/html; charset=utf8\r\n ";
                    
                            if(mail($to,$subject,$message,$headers,'-fkoduri.bhagath@gmail.com'))
                            {
                    
                    
                            
                               // echo '<script>alert("Thank you!, Our team will get back to you soon");window.location.href="index.php";</script>';
                                
                                //echo "email sent ";
                                $Message = array("response"=>"success","status"=> 1,"message"=>"Tenant Details Registered succeesfully");
                                    
                                $Response[]=array("Message"=>$Message);
                                echo json_encode($Response);
                            }
                        }

                        
                            else 
                            {
                            //$data['response'] = array("success" => "0", "msg" => "Not Registered");
                            $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Details Not Registered");
                            $Response[]=array("Message"=>$Message);
                                echo json_encode($Response);
                            
                            }
       

  
  } 
		else 
		{
            $Message = array("response"=>"error","status"=> 0,"message"=>"Tenant Details Not Registered");
            $Response[]=array("Message"=>$Message);
                echo json_encode($Response);
		}
  
	
  
	  
  //}
  

  
  ?>