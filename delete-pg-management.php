<?php

include("config.php");

		
		if($conn->connect_error)
		{
			die("connection failed:" . $conn->connect_error);
		}
				
		else

		{

		$result=mysqli_query($conn,"select * from pg_management");

		$id=$_GET["id"];
		
		 $sql = "delete from pg_management where id= $id ";
		 
		 if ($conn->query($sql) === TRUE)
		 {
			 
			$resultData = array('status' => true, 'message' => 'Record Deleted Successfully...');
		 }
			 else
			 {
			     $resultData = array('status' => false, 'message' => 'Unable to delete Record...');
			 }
		
		
		}
	 echo json_encode($resultData);	
		
		
?>