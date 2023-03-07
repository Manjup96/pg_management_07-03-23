
<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
require('config.php');


//$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);



require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{


    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
   // $razorpayPayment = $api->order->fetch($razorpay_order_id)->payments();
//$paymethod = $razorpayPayment['method'];
  $razorpayPayment = $api->payment->fetch($razorpay_payment_id);
  $paymethod = $razorpayPayment['method'];
  
//if($paymethod == "card")
//{

//  $carddetails = $api->payment->fetch($razorpay_payment_id)->fetchCardDetails();

//}

    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
    $phone=$_SESSION['phone'];
   // $amount=$_SESSION['amount'];
    $address=$_SESSION['address'];
    $schedule_date=$_SESSION['schedule_date'];
    $schedule_time=$_SESSION['schedule_time'];

if(isset($_SESSION['cart']))
{
    if(count($_SESSION['cart']) == 0)
    {
        array_push($errors, "Cart is Empty,Add packages");
    }
}
else
{
    array_push($errors, "cart is empty");
}

//if((count($error)) == 0)
//{
    $date=date("d,M Y H:i:s");
    $p_total=0;
    $packages="";
    $quantity="";
    foreach ($_SESSION['cart'] as $key => $item) {
        $packages .=$item['package_name']."+";
        $quantity .=$item['quantity']. "+";
        $pack_price =$item['pack_price'] * $item['quantity'];
        $p_total= $p_total + $pack_price;
   // $p_total=number_format($p_total,2);
        # code...
    }
    $tt = $p_total;
    $p_total=number_format($p_total,2);
//$date=date("d,M Y H:i:s");
 $s= explode("+", $packages);

  $rowCount = count($s);

for($i=0;$i<$rowCount;$i++) 
{

//mysqli_query($conn, "DELETE FROM home_visit WHERE id ='" . $_POST["users"][$i] . "'");


    $sql="select * from test_packages where pack_name ='".$s[$i]."'";
          $result=$conn->query($sql);

           if($result->num_rows>0)
          {
            if($row = mysqli_fetch_assoc($result)) 
          {
 //print_r($s);
 $postData= [
  "id" => $razorpay_order_id,
  "bill_no"=>$razorpay_payment_id,
   "bill_date"=> $date, 
   "mrn"=>"",
   "patient_name" => $name, 
   "gender" => " ", 
   "date_of_birth" => " ", 
   "age" => "", 
   "address" => $address, 
   "mobile_no" => $phone, 
   "email" => $email, 
   "doctor_name" => " ", 
   "patient_type" => " ", 
   "ip_no"=>" ", 
   "ward_no"=>" ", 
   "room_no"=>" ",
    "is_active"=>true,
    "created_by"=>" ", 
   "created_date" => $date, 
   "Tests" => [
         [
            "Name" => " ", 
            "Code" => " " 
         ] 
      ], 
   "Packages" => [
               [
                  "Name" => $s[$i], 
                  "Code" => $row["pack_id"] 
               ] 
            ], 
   "BillItems" => [
                     [
                        "Name" => " ", 
                        "Code" => "" 
                     ] 
                  ], 
    "payment_type"=> $paymethod, 
    "amount_paid"=> $tt, 
    "card_no"=> " "              
   
]; 
 }
 
 
   
$curl = curl_init();
//echo "heloo";
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ayuslab.com/integration/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postData),
CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'X-Token: 9360812728070309'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

}
}
    $sql="INSERT INTO orders (order_id, payment_id, status, p_name, p_email, p_phone, address, date1,scheduled_time,scheduled_date, quantity, total,payment_method,package,Actions) VALUES ('$razorpay_order_id', '$razorpay_payment_id', 'success', '$name', '$email', '$phone','$address','$date','$schedule_time','$schedule_date','$quantity','$p_total','$paymethod','$packages','Pending')";
    if ($conn->query($sql) === TRUE)
    {
        echo "<p style='color:white;font-size:20px;'>Order Confirmed</p>";


         $to1="info@suhasdiagnostics.com";
      $subject1="User Booked a Test";
      $from1="contact@suhasdiagnostics.com";
      $message1= "Hi Team,".'<br/><br/>'."New User Booked for Test. Following are the User information.".'<br/><br/>'."Name : " . $name .'<br/>'."Email : " .$email.'<br/>'.
      "Phone : ".$phone .'<br/>'. "Scheduled Date : " .$schedule_date .'<br/>'."Schedule Time : ".$schedule_time.'<br/>'."Address : ".$address.'<br/>'."Payment Id :".$razorpay_payment_id.'<br/>'."Total amount paid : ".$p_total.'<br/>'."Payment Method : ".$paymethod.'<br/>'.'<p>For more information check Dashboard</p>'.'<br/><br/><br/>'."Regards".'<br/>'. "Suhas Diagnostics" .'<br/>'
      .'<a href="suhasdiagnostics.com">suhasdiagnostics.com</a>' . '<br/>' . 
      '<img src="https://suhasdiagnostics.com/img/suhas_logo.png"  style="" width="160px" height="60px"/>'. '<br/>';
  
      $headers1 = "MIME-Version: 1.0" . "\r\n";
       $headers1 .= "From: Suhas Diagnostics <contact@suhasdiagnostics.com>"."\r\n";
      $headers1 .= "Content-type: text/html; charset=utf8\r\n ";
   
      if(mail($to1,$subject1,$message1,$headers1,'-fcontact@suhasdiagnostics.com'))
      {  
        
      $to=$email;
      $subject="Order Confirmation!!!";
      $from="contact@suhasdiagnostics.com";
 
      $message= '<html><body><table width="350" align="center" cellpadding="0" cellspacing="0" style="font-family:arial;font-size:14px;border:2px solid #d61f73">
  <tbody><tr><td width="350" height="10" style="background:#d61f73"> </td></tr> <tr><td width="350" style="background:#d61f73">
<table width="340" height="55" align="center" style="padding-bottom:10px;"><tbody><tr> <td width="340" height="55" align="center" valign="middle" style="background:#ffffff">
<p style="color:#341c53;text-decoration:none;font-family:arial;font-size:18px" target="_blank" ><strong>Greetings from Suhas Diagnostics!!!</strong></p></td></tr>
</tbody></table></td></tr><tr> <td width="350" height="20"> </td></tr>
<tr><td width="350" align="center" valign="middle"><table width="330" cellpadding="0" cellspacing="0" style="font-family:arial;font-size:14px;border:1px dotted #d61f73">
<tbody><tr><td width="350" align="center" valign="middle" style="padding:10px;line-height:20px"><strong>
<p style="color:#000000;" > Thank You!!! </strong></p><p style="color:#000000;">'. $name .'</p> 
<p>Thank you for booking a Test.Your Test booked successfully</p><p>Scheduled on : .'.$schedule_date.'&nbsp;'.$schedule_time.'.</p><p>Your Payment ID : '.$razorpay_payment_id.'</p><br/><strong>Follow Us On :</strong> <br/>
<a href="https://www.facebook.com/people/Suhas-Diagnostics/100068429118279/" target= _blank><img src="suhasdiagnostics.com/img/fb.png" width="30px" height="30px"/></a>
<a href="https://twitter.com/SuhasDiagnosti1" target= _blank><img src="suhasdiagnostics.com/img/tw.png" width="30px" height="30px"/></a>
<a href="https://www.linkedin.com/in/suhas-diagnostics-100166213/" target= _blank><img src="suhasdiagnostics.com/img/linked.png" width="30px" height="30px"/></a>
<a href="https://www.instagram.com/suhasdiagnostics/" target= _blank><img src="suhasdiagnostics.com/img/insta.png" width="30px" height="30px"/></a>
<br/><br/><br/>Regards<br/>Suhas Diagnostics Center<br/><a href="https://www.suhasdiagnostics.com">suhasdiagnostics.com</a><br/> 
<img src="suhasdiagnostics.com/img/suhas_logo.png" style="" width="160px" height="60px"/>
</td></tr><tr> <td width="350" align="center" valign="middle"></td></tr>
<tr><td width="350" height="15" align="center" valign="middle"> </td></tr> </tbody></table></td> </tr><tr><td width="350" height="20"> </td></tr>
</tbody></table></body></html>';
     
      $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "From: Suhas Diagnostics <contact@suhasdiagnostics.com>"."\r\n";
      $headers .= "Content-type: text/html; charset=utf8\r\n ";
    
      if(mail($to,$subject,$message,$headers))
      {
                $postData=[ 
//"userId" => $id,
  "phoneNumber"=> $phone,
    "countryCode"=> "+91",

   ];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/users/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postData),
CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic WjdZYks1UW9ER0Q2UkZoT3prUC1zX2NhM0x0YUo4YnkySnVOY1lQMUl3MDo='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
//echo $id;
//echo $name;
//echo $phone;
//echo $email;

$postData1=[ 
//"userId" => $id,
  "phoneNumber"=> $phone,
    "countryCode"=> "+91",
  "event"=>"order event",
 
];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/events/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postData1),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic WjdZYks1UW9ER0Q2UkZoT3prUC1zX2NhM0x0YUo4YnkySnVOY1lQMUl3MDo='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

      echo '<div class="error-handle error-1" id="mydiv" onclick="this.style.display = \'none\'">Thank you!!!</div>';
      }
      else{
echo '<div class="error-2 error-1" id="mydiv" onclick="this.style.display = \'none\'">Sorry Failed to send try again.</div>';
 //print_r(error_get_last());
        }
    }
    unset($_SESSION["cart"]);
        //session_destroy();
    
//session_destroy();
    $html = "<body style='background: #2d367980;color: white;font-size: 20px; text-align: center;'>
            <h1 style='color:#559934;'>Your payment was successful</h1>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>

             <a href='index.php' style='color:white'>Back to home page</a>
             </body>";

}
}

else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
