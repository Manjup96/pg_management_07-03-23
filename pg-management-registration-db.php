<?php
session_start(); 

if(!isset($_SESSION['LOG_IN'])){
   header("Location:login.php");
}
else
{
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
}
include("config.php");


if(isset($_POST['submit']))
{

//$property_id = mysqli_real_escape_string($conn,$_POST['property_id']);
$property_name=mysqli_real_escape_string($conn,$_POST['property_name']);

$property_email=mysqli_real_escape_string($conn,$_POST['property_email']);
$property_phone= mysqli_real_escape_string($conn,$_POST['property_phone']);

$pincode= mysqli_real_escape_string($conn,$_POST['pincode']); 
$password= mysqli_real_escape_string($conn,$_POST['password']); 
$id="";
$subscription="Free";

date_default_timezone_set('Asia/Kolkata');
$date1=Date('d-m-Y');

$result=mysqli_query($conn,"select id from pg_management where id=(select max(id) from pg_management)");
	if($row=mysqli_fetch_array($result))
	{
		$id=$row['id']+1;
	}


       
$sql = "insert into pg_management(id,property_name,property_email,property_phone,pincode,password,registered_date,subscription) values('$id','$property_name','$property_email','$property_phone','$pincode','$password','$date1','$subscription')";


if($conn->query($sql) === TRUE)

{
    ?>

<script>
    alert("Registered SUccessfully");
    window.location="pg-management-registration.php";
</script>
<?php
}
// 	 ?>
			  <script>
			
// 				alert("Please Enter all the fields");
// 				window.location="student-reg.php";
// 		</script>
 			  <?php
// }
	




}

?>