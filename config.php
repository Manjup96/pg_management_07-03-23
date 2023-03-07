<?php

// $host="localhost";
// $username="jyothilanduser";
// $pass="BTds{%L+H^Gd";
// $db="jyothilanddb";
		
$host="localhost";
$username="u406176785_pg_mng_user";
$pass="Pt;VYa&ez2:";
$db="u406176785_pg_management";
		
		$conn=new mysqli($host,$username,$pass,$db);
		
		if($conn->connect_error)
		{
			die("connection failed:" . $conn->connect_error);
		}
		?>