<?php
session_start(); 

if(!isset($_SESSION['LOG_IN']))
{
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





$id=$_GET['id'];
 
	

		$sql = "update pg_management set id='$id',property_name='$property_name',property_email='$property_email',property_phone='$property_phone',pincode='$pincode',password='$password' where id='$id'";
		


			if ($conn->query($sql) === TRUE) 
		  {
		  	?>
  
  			<script type="text/javascript">
  				alert("Successfully PG Management deatils Updated");
  				window.location="view-pg-management.php";
  			</script>
		<?php
		} 
		
		  else 
		  {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

        }
?>