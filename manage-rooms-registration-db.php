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
$add_floors=mysqli_real_escape_string($conn,$_POST['add_floors']);

$add_rooms=mysqli_real_escape_string($conn,$_POST['add_rooms']);
$add_sharing= mysqli_real_escape_string($conn,$_POST['add_sharing']);

$id="";



$result=mysqli_query($conn,"select id from manage_rooms where id=(select max(id) from manage_rooms)");
	if($row=mysqli_fetch_array($result))
	{
		$id=$row['id']+1;
	}


       
$sql = "insert into manage_rooms(id,add_floors,add_rooms,add_sharing) values('$id','$add_floors','$add_rooms','$add_sharing')";


if($conn->query($sql) === TRUE)

{
    ?>

<script>
    alert("Registered SUccessfully");
    window.location="manage-rooms-registration.php";
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