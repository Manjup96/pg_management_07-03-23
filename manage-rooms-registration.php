<!DOCTYPE html>
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
?>
<html lang="en">
<head>
    <title>iiiQbets</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
   <?php include("header_link.php");?>
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	
	
	<!-- [ Header ] end -->
	
	

    <div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/iiiq.png" alt="" class="img-fluid mb-4">
		<div class="card borderless" style="box-shadow:0 2px 2px 2px lightgrey">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-title" style="background-color:lightgray;padding : 1px;">
						<h4 class="mb-3 f-w-400">Room Registartion</h4>
					</div>
					<div class="card-body">
						
                    <form action="manage-rooms-registration-db.php" method="POST" enctype="multipart/form-data">
						<div class="form-group mb-3">
                        <label class="floating-label" for="add_floors">Enter No.of Floors</label>
						<input type="text" class="form-control" id="add_floors" name="add_floors" placeholder="Enter No.of Floors">
						</div>
                        <div class="form-group mb-3">
                        <label class="floating-label" for="add_rooms">Enter No.of Rooms</label>
						<input type="text" class="form-control" name="add_rooms" id="add_rooms"  value="" placeholder="Enter No.of Rooms">
						</div>
						
      
      
                        <div class="form-group mb-3">
                        <label class="floating-label" for="add_sharing">Sharing Per Room</label>
						<input type="phone" class="form-control" name="add_sharing" id="add_sharing" value="" placeholder="Sharing Per Room">
						</div>
                       
						<input type="submit" name="submit" id="submit" value="submit" class="btn btn-block btn-primary mb-4">
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 
               
                


          
               
                   

                        


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>



</body>
</html>
