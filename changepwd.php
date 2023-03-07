
<!DOCTYPE html>
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
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
				
        <meta name="description" content="">
        <meta name="keywords" content="">
     
        <link rel="icon" href="images/logo.png">
        <title>Dashboard</title>
        <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/style.css" rel="stylesheet">
        <link href="lib/dialogue/bootstrap-dialog.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Hind:400,500,600,300,700' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
	 .row {
            margin-left: unset;
            margin-right: unset;
        }
	</style>
	
	</head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a class="navbar-brand" href="home.php"><img src="images/logo.png" width="70px" style="padding-left:2px;"/>
		   <h5 style="float:left;margin-top:-40px !important;margin-left:80px !important;font-size:17px;">Athishaya Builders & Developers</h5></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!--<li class="nav-pad-adjust"><a href="#">Help</a></li>-->
                <!--<li class="nav-pad-adjust nav-notification"><a href="#"><span class="glyphicon glyphicon-bell"></span> <span class="badge" id="counter-admin-pending-order"></span></a></li>-->
                <li class="dropdown">
				<?php
							$sql="select * from admin_login";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			 if($row = mysqli_fetch_assoc($result)) 
			 {
		?>
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php  echo $row["image"];?>" style="border-radius:50%;">                    </a>
                    <?php
			 }
		}
					?>
					<ul class="dropdown-menu">
                        <li><a href="profile.php">My account</a></li>
                        <li><a href="changepwd.php">Change password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2">
    <div class="sidebar">
        <div class="user-details">
            <div class="pull-left">
			<?php
							$sql="select * from admin_login";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			 if($row = mysqli_fetch_assoc($result)) 
			 {
		?>
                <img src="<?php  echo $row["image"];?>" alt="" class="thumb-md img-circle">
				<?php
			 }
		}
				?>
            </div>
            <div class="user-info">
                <a class="text-muted m-0 user-pos" href="#">Administrator </a>

            </div>
        </div>

        <div class="panel-group side-menu" id="accordion">
                                        <div class="panel panel-default">
                    <div class="panel-heading  active">
                        <h4 class="panel-title" ><a  href="home.php">
						<i class="fa fa-dashboard"> </i> Dashboard</a></h4>
                    </div>               
                     </div>
                                
					 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a  href="view_msg.php">
						<i class="fa fa-filter" aria-hidden="true"> </i> Contact Us Leads</a></h4>
                    </div>               
                     </div>
									
					 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a  href="view_visit.php">
						<i class="fa fa-car"> </i> Site Visit Requests</a></h4>
                    </div>               
                     </div>
					 
					  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a  href="view_calls.php">
						<i class="fa fa-phone"> </i> Call Back Requests</a></h4>
                    </div>               
                     </div>
									
								 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a  href="add_expert.php">
						<i class="fa fa-phone"> </i> Add Experts </a></h4>
                    </div>               
                     </div>	
                                
						<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a  href="https://athisheyaproperties.com:2096/logout/?locale=en" target="_blank">
						<i class="fa fa-envelope"> </i> WebMail</a></h4>
                    </div>               
                     </div>
					
                        </div>
    </div>
</div>
                <div class="col-sm-9 col-md-10 page-content">
                    <div id="flash-message-wrapper">


</div>
                   <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Profile</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							<?php
							$sql="select * from admin_login";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			 if($row = mysqli_fetch_assoc($result)) 
			 {
		?>
							<form method="POST" action="https://athishayaproperties.com/admin/changepwddb">
							<div class="row">
                <div class="col-lg-7 mb-lg-0 mb-5" style="margin-left:-10px;">
							
						<div class="col-lg-12">
						<div class="col-lg-2" style="padding:0px !important">
						<label>Old Password</label>
						</div>
						<div class="col-lg-8">
						   <input type="text" class="form-control"name="old_pwd" value="" size=30 required><br/><br/>
						</div>
						</div>
						
						<div class="col-lg-12">
						<div class="col-lg-2" style="padding:0px !important">
						<label>New Password</label>
						</div>
						<div class="col-lg-8">
						   <input type="text" class="form-control" name="new_pwd" value="" size=30 required><br/><br/>
						</div>
						</div>
						<div class="col-lg-12">
						<div class="col-lg-2" style="padding:0px !important">
						<label>Confirm</label>
						</div>
						<div class="col-lg-8">
						   <input type="text" name="con_pwd" class="form-control" value="" size=30 required><br/><br/>
						</div>
						</div>
						
						<div class="col-lg-12" style="margin-top:28px;margin-bottom:28px">
						<div class="col-lg-2" style="padding:0px !important">
						
						</div>
						<div class="col-lg-2">
						   <input  type="submit" name="submit" value="Update" class="btn btn-primary">

						</div>
						<div class="col-lg-2">
						   <input type="button" onclick="window.location.replace('home.php')" value="Cancel" class="btn btn-danger"/>

						</div>
						
						</div>
						
		<br/><br/>
												
					</div>
                        </div>	
						</form>
						<?php
			 }
		}
						?>
                     	
			
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>2018 © Athishaya Builders & Developers</p>
        </footer>
        
        <!--Config-->
        <!--<script type="text/javascript">
            var config = {
                admin_url: 'http://127.0.0.1:2017/MYTASTEBUDDY/',
                //token: 'e3e097022fdd359cc3772c7630bff940',
                //pusher_key: '3f83d9544659d6e0f6fe',
                //pusher_channel: 'administrator',
                base_url: 'http://127.0.0.1:2017/MYTASTEBUDDY/administrator/admin_login'
            };
        </script> -->

    <!--<audio src="http://foodday-v2.codebases.com/administrator/beep.wav" id="order-beep"></audio>-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgWsb5IHqZN2237amDE4wLHwLWTX0d-dE&amp;libraries=places" type="text/javascript"></script>
    <script src="lib/jquery-ui/jquery-ui.js" type="text/javascript" ></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ie10-viewport-bug-workaround.js"></script>
        <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
    <!--<script type="text/javascript" src="js/app.js"></script>-->
</body>
</html>