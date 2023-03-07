<?php

session_start(); 

if(!isset($_SESSION['username'])){
   header("Location:login.html");
}
else
{
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
}
include("config.php");
$result=false;
 


$old_pwd=$_POST["old_pwd"];
$new_pwd=$_POST["new_pwd"];
$con_pwd=$_POST["con_pwd"];

if($conn->connect_error)
		{
			die("connection failed:" . $conn->connect_error);
		}

	$sql="select * from admin_login";
		$result=$conn->query($sql);
			 if($row = mysqli_fetch_assoc($result)) 
			 {
				 $pass=$row["password"];
				
				 
			 }
			 
			 if($pass==$old_pwd)
			 {
				 $sql = "update admin_login set password='$new_pwd' where id=1";
					if ($conn->query($sql) === TRUE) 
					{
						?>
							<script>
							window.location="home.php";
								alert("Successfully Changed password");
							</script>
			  <?php
				 
			 }
			 else
			 {
				  echo "Error: " . $sql . "<br>" . $conn->error;
			 }
			 }
			 else
			 {
				 ?>
				 
						<script>
							window.location="changepwd.php";
							alert("Old Password doesn't match");
							</script>
				 
				 <?php
				 
			 }
			 


?>