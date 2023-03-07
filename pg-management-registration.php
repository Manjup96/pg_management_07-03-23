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
						<h4 class="mb-3 f-w-400">PG Registartion</h4>
					</div>
					<div class="card-body">
					
					
					
					    <form id="RegistartionForm" name="RegistrationForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onsubmit="return RegistrationForm_validation();"  method="POST" novalidate="">
                

					
						
                    <form action="pg-management-registration-db.php" method="POST" enctype="multipart/form-data">
						<div class="form-group mb-3">
                        <label class="floating-label" for="property_name">Property Name</label>
						<input type="text" class="form-control" id="property_name" name="property_name" placeholder="Property Name">
						</div>
                        <div class="form-group mb-3">
                        <label class="floating-label" for="property_email">Property Email</label>
						<input type="email" class="form-control" name="property_email" id="property_email" aria-describedby="emailHelp" value="" placeholder="Property Email">
						</div>
                       
                        <div class="form-group mb-3">
                        <label class="floating-label" for="property_phone">Property Phone</label>
						<input type="phone" class="form-control" name="property_phone" id="property_phone" value="" placeholder="Property Phone">
						</div>
                        <div class="form-group mb-3">
                        <label class="floating-label" for="pincode">Pincode</label>
                        <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Pincode">
						</div>

                  
                        
						<div class="form-group mb-4">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" >
						</div>
						<!-- <div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Save credentials.</label>
						</div> -->
						<div class="modal-footer1">
                <input type="submit"  name="submit_enq" id="submit_enq" value="Submit" style="justify-content: center;color:#27569e;background:#f9cf1f"/>
                </div>
						</form>
						<!-- <hr> -->
						<!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p> -->
					<!-- 	<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> -->
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
