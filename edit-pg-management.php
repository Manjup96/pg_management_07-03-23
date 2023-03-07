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
	<?php include("menu.php");?>
	
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">PG Profile</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">PG Profile</a></li>
                            <!-- <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

  <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>PG Details</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        
                        $d= $_GET['id'];
        $result=mysqli_query($conn,"select * from pg_management where id='$d'");
        if($row=mysqli_fetch_array($result))
        {
             
                        ?>
            <form action="edit-pg-management-db.php?id=<?php echo $d?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="property_id">PG ID</label>
                    <input type="text" name="property_id" class="form-control" id="property_id" value="<?php echo $row['property_id'];?>"placeholder="" readonly>
                </div>
                </div>

                  

                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="property_name">Property Name</label>
                    <input type="text" name="property_name" class="form-control" id="property_name" value="<?php echo $row['property_name']?>"
                    placeholder="">
                </div>
                </div>

                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="property_email">Property Email</label>
                    <input type="email" class="form-control" name="property_email" id="property_email" aria-describedby="emailHelp" value="<?php echo $row['property_email']?>">
                </div>
                </div>
                                
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="property_phone">Property Phone</label>
                    <input type="phone" name="property_phone" class="form-control" id="property_phone" value="<?php echo $row['property_phone']?>" placeholder="">
                </div>
                </div>
          
               
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="pincode">Pincode</label>
                    <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo $row['pincode']?>" placeholder="">
                 </div>
                 </div>
        

                    <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['password']?>" placeholder="" readonly>
                </div>
                </div> 

                             
                             <input  type="submit" class="btn  btn-primary" name="submit" id="submit" value="Submit">
                        </form>

                        <?php
                         }
                        ?>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] start -->
          
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>



</body>
</html>
