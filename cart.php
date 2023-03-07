
<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: Login.php");
    exit;
}
?>
<?php

if(isset($_GET['empty']))
{
  unset($_SESSION['cart']);
  $total_price =0;
}

if(isset($_GET['remove']))
{
  $id=$_GET['remove'];
  foreach($_SESSION['cart'] as $k => $part)
  {
    if($id == $part['id'])
    {
      unset($_SESSION['cart'][$k]);
    }
  }
}


?>
<html lang="en">
<head>
   <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TMTSJ6B');</script>
<!-- End Google Tag Manager -->

<title>Suhas Diagnostic Centre | Cart</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

      ﻿<meta charset="utf-8"> 
<meta name="viewport" content="height=device-height, 
width=device-width, initial-scale=1, 
minimum-scale=1.0, maximum-scale=1.0, 
user-scalable=no, target-densitydpi=device-dpi">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#e40f56">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>  

<!--<link rel="canonical" href="contactus.php" />-->

<meta name="description" content="Suhas is most Sophisticated Pathology,Radiology,Cardiology lab and diagnostics center known for excellent customer satisfaction and preventive healthcare in Bangalore.">
  <meta name="keywords" content="Pathology lab,Radiology,x-ray,urine test,blood test,diagnostic centre,covid test,sugar test , choesterol test ,kidney test,scanning,home collection,Diagnostic Centres in hanmant nagar bangalore,Diagnostic Centers in bangalore,Best diagnostic Centres in bangalore,Best diagnostic Centre in hanmant nagar bangalore,Diagnostic Centres,Scanning Centres in bangalore,Scanning Centres in hanmant nagar bangalore,Near hanmant nagar diagnostic Centre,Top diagnostic Centres in bangalore,Best Diagnostic Centres,Searchning diagnostics centre in bangalore,Diagnostic Centres in south bangalore,Top diagnostic Labs in south bangalore,top diagnostics labs in bangalore,top pathology lab in bangalore,Bangalore diagnostics centres,Suhas Diagnostics Centre,Top Laboratories in bangalore,Diagnostics Centres near me,Diagnostic Centres near hanmant nagar ">

      <link rel="alternate" href="index.php" hreflang="en-in" />

  <!--Canonical--->
  <base  />

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet">
<link href="fonts/fontawesome/css/all.css" rel="stylesheet">
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Suhas Diagnostics Centre",
  "url": "https://suhasdiagnostics.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '278532630447183');
   fbq('track', 'AddToCart');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=278532630447183&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>
   
<body>
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TMTSJ6B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        

<header>

<!--<div id="hellobar-box">
    <div id="hellobar-box-wrap">
        <div id="hellobar-box-text">
            <strong>[COVID-19 Message]</strong> Dear Customer, Due to the surge in COVID-19 cases, you may experience a slight delay in our response time for delivering reports and addressing calls. Our teams are working round the clock to make sure we continue our safe and quality service. We appreciate your patience and cooperation. 
        </div>
        <div id="hellobar-box-btns"><button type="button" id="hellobar-box-accept" onclick="hellobarhide()">X</button>
        </div>
    </div> 
</div>  --> 
<!--<script>
function hellobarhide() {
  var x = document.getElementById("hellobar-box");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>-->

<style type="text/css">
.dropdown-content{display:none;position:absolute;background-color:#f6f6f6;width: -webkit-fill-available;overflow:auto;z-index: 1000;height:220px; border:1px solid #ddd;}
.dropbtn{padding:16px;font-size:16px;border:none;cursor:pointer;}
  
.dropdown-content a{color:black;padding:12px 16px;text-decoration:none;display:block;}

.dropdownmobile a:hover{background-color:#ddd;}
 
 .dropdown a:hover{background-color:#ddd;}
 
.show{display: block;}
</style>

<script>
  $(document).ready(function() {
 $("#owl-demo").owlCarousel({
    navigation : true
  });
 });
</script>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60dc51c47f4b000ac03a5212/1f9e9uqvs';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!--Whatsapp-->
 <script>
    (function(w,d,s,c,r,a,m){
      w['KiwiObject']=r;
      w[r]=w[r] || function () {
        (w[r].q=w[r].q||[]).push(arguments)};
      w[r].l=1*new Date();
        a=d.createElement(s);
        m=d.getElementsByTagName(s)[0];
      a.async=1;
      a.src=c;
      m.parentNode.insertBefore(a,m)
    })(window,document,'script',"https://app.interakt.ai/kiwi-sdk/kiwi-sdk-17-prod-min.js?v="+ new Date().getTime(),'kiwi');
    window.onload = function () {
      kiwi.init('', 'OqAaMxgQITS9aEuqFI9TUOxo9h3RORCl', {});
    }
  </script>

<!--End WHatsapp-->
<!--MOBILE VIEW-->


<div class="patients-page-menu">
    <!--<div class="logo-search">
        <div class="mobileSearch-icon d-block d-sm-none">
          <a href="checkout.php" class="basket-cart cart-white-wrapper">
            <div class="items-add-basket"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:x-large;"></i><span style="color:#fff;">0</span>
            </div>
          </a>
        </div>
    </div>-->
  <div class="reports-status-patients">
    <p style="margin-top:revert;">
    <a href="https://www.facebook.com/profile.php?id=100068429118279" target= "_blank"><i class="fab fa-facebook-f" style="font-size:20px;"></i></a>&nbsp;&nbsp;
    <a href="https://twitter.com/SuhasDiagnosti1" target= "_blank"><i class="fab fa-twitter" style="font-size:20px;"></i></a>&nbsp;&nbsp;
    <a href="https://www.instagram.com/suhasdiagnostics/" target= "_blank"><i class="fab fa-instagram" style="font-size:20px;"></i></a>&nbsp;&nbsp;
    <a href="https://www.linkedin.com/in/suhas-diagnostics-100166213/" target= "_blank"><i class="fab fa-linkedin-in" style="font-size:20px;"></i></a></p>

    <div class="report-status customer-care" style="border-right:1px solid black;padding-right:5px;">
      <a href="tel:9342548006"><i class="fas fa-phone-alt"></i>&nbsp; Call Us: 9342548006</a>
    </div>
    <div class="report-status report-status-customsmain" style="border-right:1px solid black;padding-right:5px;">
        <a class="report-status-customs" href="download-report.php">
           <i class="fa fa-download"></i> &nbsp; <span>Download Report</span>
        </a>    
    </div>  
    <div class="report-status upload-prescription-statusmains"style="border-right:1px solid black;padding-right:5px;">
      <a class="upload-prescription-status" href='#' data-toggle="modal" data-target="#uploadPresModal">
        <i class="fa fa-arrow-up"></i> &nbsp; <span>Upload Prescription</span>
      </a>
    </div>
    <div class="report-status" style="">
      <?php  if (isset($_SESSION["name"])) {?>
          <li class="" style="list-style: none;">
            <div class="dropdown">
              <a class="nav-link" data-toggle="dropdown" aria-haspopup="true">
                  <span>My Account &nbsp;<i class="fa fa-angle-down"></i></span>
              </a>
              <div class="dropdown-menu locationDropdown" aria-labelledby="dropdownMenuButtonMobile">
                <a class="dropdown-item" id="" href="user-order.php">Orders</a>
                <a class="dropdown-item" id="" href="user-report.php">Report</a>
                <a class="dropdown-item" id="" href="logout.php">LogOut</a>
              </div></div>
            </li>
          <?php }else
          {
          ?>
             <?php echo ' <a href="Login.php">  <i class="fa fa-user"></i> &nbsp;Login / Sign Up</a>'?>
          <?php
          }
          ?>
    </div>
    <div class="report-status upload-prescription" style="">
        <a href="homevisit.php"><i class="fa fa-home"></i> &nbsp; <span>Book A Home Visit</span></a>
    </div>
    <div class="report-status"><button type="submit"  id="rotatebutton" name="rotatebutton" class="btn1" data-toggle="modal" data-target="#myModal1">Book Test Now</button></div>
    
</div>
</div>

<nav class="navbar navbar-expand-lg">
  <div class="logo"><a href="#"><img src="img/suhas_logo.png" alt="suhas-logo" class="img-fluid lazyload suhas-logo"></a></div>

    <button class="navbar-toggler hamburger-button collapsed" id="hamburger" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
       <i class="fa fa-bars" aria-hidden="true" style="color:#e40f56;"></i>
    </button>

   
    <div class="navbar-collapse collapse width" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto first-navbar">
        <li class="nav-item menu-item">
          <button class="navbar-toggler back-arrow-navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button><a class="nav-link"><!--Menu-->&nbsp;</a>
        </li>
           
        <li class="nav-item sub-menu-item">
          <div class="report-status search-city d-sm-flex" style="">
          <div class="input-search dropdown">
            <input type="text" class="dropbtn" name="myInputmobile" id="myInputmobile" placeholder="Search for Tests"
                 onkeyup="filterFunctionmobile()" style="color:black;"onclick="myFunctionmobile();" autocomplete="off">
            <div class=""><div class="dropdown-content" id="myDropdownmobile">
            <?php
              include("config.php");
              $sql="select * from package";
              $result=$conn->query($sql);
              if($result->num_rows>0)
              {
                 while($row = mysqli_fetch_assoc($result)) 
              {
            ?>
          <a href="packages/<?php echo $row["str"];?>" ><?php echo $row["package_name"];?></a>
            <?php
                 }}
            ?>
            </div> </div>
          </div>
          </div>
 
           <div class="report-status cart">
        <a href="cart.php" class="basket-cart">
            <span> <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:x-large;"></i></span>
            <div class="items-add-basket"> <span style="color:#fff;">
              <?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}
              else {echo '0';}
            ?></span></div>
        </a>
    </div>
   
          </li>
              <?php  if (isset($_SESSION["name"])) {?>
          <li class="nav-item">
               <div class="dropdown">
                <a class="nav-link" data-toggle="dropdown" aria-haspopup="true">
                        <span>My Account &nbsp;<i class="fa fa-angle-down"></i></span>
                </a>
                <div class="dropdown-menu locationDropdown countryDropdown countryDropdownMobile"
                        aria-labelledby="dropdownMenuButtonMobile">
                    <a class="dropdown-item " id="" href="user-order.php">Orders</a>
                    <a class="dropdown-item " id="" href="user-report.php">Report</a>
                        <!--<a class="dropdown-item " id="compliments" href="compliments.html">Compliments</a>-->
                    <a class="dropdown-item " id="" href="logout.php">LogOut</a>
                </div></div>
            </li>
          <?php }else
          {
          ?>
        <li class="nav-item sub-menu-item">
          <?php echo ' <a href="Login.php">  <i class="fa fa-user"></i> &nbsp;Login / Sign Up</a>'?>
        </li>
          <?php
          }
          ?>
        <li class="divider margin-divider"></li>
        <li class="nav-item sub-menu-item">
          <a class="nav-links" href="download-report.php"> <i class="fa fa-download"></i> &nbsp;Download Report</a>
        </li>
        <li class="divider margin-divider"></li>
        <li class="divider margin-divider"></li>
        <li class="nav-item sub-menu-item">
          <a href='#' data-toggle="modal" data-target="#uploadPresModal"> <i class="fa fa-arrow-up"></i> &nbsp;Upload Prescription</a>
        </li>

        <li class="divider margin-divider"></li>
        <li class="nav-item sub-menu-item"><a href="homevisit.php"><i class="fa fa-home"></i> <span>Book A Home Visit</span></a></li><li class="divider margin-divider"></li><li class="divider"></li><li class="nav-item sub-menu-item"><a href="" data-toggle="modal" data-target="#myModal1"><span>Book Test Online</span></a></li> <li class="divider margin-divider"><li>
        <li class="divider"></li> 
        <li class="nav-item extra-item">
          <a href="tel:9342548006"><i class="fas fa-phone-alt"></i>&nbsp;9342548006</a>
        </li>
           
        </ul>
        <ul class="navbar-nav second-navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <div class="dropdown">
                <a class="nav-link" data-toggle="dropdown" aria-haspopup="true">
                        <span>About Us &nbsp;<i class="fa fa-angle-down"></i></span>
                </a>
                <div class="dropdown-menu locationDropdown countryDropdown countryDropdownMobile"
                        aria-labelledby="dropdownMenuButtonMobile">
                    <a class="dropdown-item " id="contact us" href="aboutus.php">About Center</a>
                    <a class="dropdown-item " id="" href="leaders.php">Our Leader</a>
                        <!--<a class="dropdown-item " id="compliments" href="compliments.html">Compliments</a>-->
                    <a class="dropdown-item " id="faq" href="faq.php">FAQ</a>
                </div></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="doctors.php">Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="partners.php">Partners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="corporates.php">Corporates</a>
            </li>
            <li class="nav-item">
               <div class="dropdown">
                <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" >
                   <span>Packages</span> &nbsp;<i class="fa fa-angle-down"></i></span>
                </a>
                <div class="dropdown-menu locationDropdown countryDropdown countryDropdownMobile" aria-labelledby="dropdownMenuButtonMobile">
                  <?php
                  include("config.php");
                  $sql="select distinct Category,slug from package";
                  $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                 while($row = mysqli_fetch_assoc($result)) 
                {
                 ?>
              <a class="dropdown-item " id="" href="<?php echo $row['slug']?>"><?php echo $row['Category']?></a>
                <?php
                    }}
                 ?>
                </div></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog/blog.php">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
            </li>
           
        </ul>
        <div class="login-section d-none d-lg-flex">
         
       <div class="report-status cart">
        <a href="#" class="basket-cart">

            <span> <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:x-large;"></i></span>
            <div class="items-add-basket"> <span style="color:#fff;"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}
              else {echo '0';}
            ?></span></div>
        </a>
       </div> 

      <div class="report-status search-city d-sm-flex" style="">
        <div class="input-search dropdown">
          <input type="text" class="dropbtn" name="myInput" id="myInput" placeholder="Search for Tests"
                 onkeyup="filterFunction()" style="color:black;"onclick="myFunction();" autocomplete="off">
          <div class=""><div class="dropdown-content" id="myDropdown">
          <?php
          include("config.php");
          $sql="select * from package";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result)) 
          {
          ?>
          <a href="packages/<?php echo $row["str"];?>" ><?php echo $row["package_name"];?></a>
          <?php
            }}
          ?>
          </div></div>
        </div>
      </div>
        <!--<?php  if (isset($_SESSION['name'])) {?>
           <div class="login-signup">
             <?php echo "Welcome ".$_SESSION['name'];?> &nbsp;&nbsp;<span> <i class="fa fa-user"></i></span><a href="Logout.php">&nbsp;Logout</a> &nbsp;
            </div>
          <?php }else
              {
          ?>
          <div class="login-signup">
             <?php echo '<span><i class="fa fa-user"></i></span><a href="Login.php">&nbsp;Login / Signup&nbsp;&nbsp;</a>'?>
          </div>
            <?php
          }
          ?>-->
        </div>
    </div>
</nav>
</header>
    <main>    
         
 <style>
 
 html {
  overflow-x: hidden;
}


 .faqs .accordion .card {
    min-height: 100px;
}
 .main-website-banner.book-home-visit-carousel div#paitent-main .owl-dots {
    left: calc(50% - 43px)!important;
    bottom: -30px;
}
p.additional-p {
    display: none;
}
body.faq_cls p.additional-p {
    display: block;
}
body.faq_cls p.non-additional {
    display: none;
}


table#table_st2 {
    width: 100%;
}
table#table_st2 tr:first-child, table#table_st2 tr:nth-child(even) {
    border-top: 1px solid grey;
    border-bottom: 1px solid grey;
}
table#table_st2 tr {
    text-align: center;
}
table#table_st2 tr td {
    border-left: 1px solid grey;
    padding: 5px;
    font-weight: 500;
    color: #000;
}
table#table_st2 tr td:last-child {
    border-right: 1px solid grey;
}
table#table_st2 tr:last-child {
    border-bottom: 1px solid #808080;
}


</style>
<!-- Navigation -->
<section class="navigation-section">
    <div class="text-wrapper">
        <a href="index.php">
            Home
        </a>
        <i class="fas fa-angle-double-right"></i>
        <a href="#">
            View Cart
        </a>
        <!-- </div> -->
    </div>
</section>
<!-- Navigation End -->

<!-- Slider Owl Crousel -->
<section class="paitent-main-slider">
    	<div class="main-website-banner book-home-visit-carousel">
		<div class="container">
			<div class="row">
				<div class="col-sm-8" style="box-shadow: 1px 1px 15px rgb(0 0 0 / 10%);border-radius: 12px;">
					  <a href="cart.php?empty"  name="empty" class="empty btn btn-danger">Empty Cart</a>
<table class="table">
<tbody>
<tr>

<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
<td>REMOVE</td>
</tr> 

<?php
if(isset($_SESSION['cart'])){
  $total_price = 0;  

  if(!(count($_SESSION['cart']) == 0))
    {
            
    
foreach ($_SESSION['cart'] as $k => $item){
?>
<tr>
<td><?php echo $item["package_name"]; ?></td>
<td><?php echo $item['quantity'];?></td>
<td><?php echo "₹".$item["pack_price"]; ?></td>
<td><?php echo "₹".$item["pack_price"]*$item["quantity"]; ?></td>
<td><a href="cart.php?remove=<?php echo $item['id'];?>" name="remove"><i class="fas fa-times"></i></a></td>
</tr>
<?php
$total_price += ($item["pack_price"]*$item["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "₹".$total_price; ?></strong>
</td>
</tr>
 
  <?php

}
else{
  echo "<h3>Your cart is empty!</h3>";
  }
 }
?>
</tbody>
</table>   



					</div>
          <div class="col-sm-1"></div>

          <div class="col-sm-3" style="box-shadow: 1px 1px 15px rgb(0 0 0 / 10%);border-radius: 12px;">
            <!--<small>Registered User </small>-->
           <h3>Total</h3>
           <hr/>
           
            <?php if($total_price <= 0){
              ?>
              <p>Cart is Empty</p>
              <?php
              echo '<a href="" class="btn btn-info" style="pointer-events: none;">Buy Now</a>';
            }

            else
              { ?>
                 <p><?php echo "₹".$total_price; ?></p><?php
              echo '<a href="checkout.php" class="btn btn-info">Buy Now</a>';
            }

            ?>
             
             

          </div>
				</div>
			</div>
		</div> 
	
	
   
</section>







    </main>
    <footer>
        <footer class="Truhealth-packges-footer">
    <div class="list-footer-menu">
       <div class="logo" style="text-align-last: center;"><a href="#"><img src="img/suhas_footer_logo.png" class="img-fluid lazyload" alt="suhas logo"></a>
        </div>
        <div class="row col-md-12" style="padding: 35px 0;margin-left: 15px;margin-right: 10px;">
        <div class="col-md-4">
        <h5><i class="fas fa-map-marker-alt"></i>&nbsp; Reach Us</h5>
             <p>SUHAS DIAGNOSTIC CENTRE </br> #548/A, 50 Feet Main Road, Hanumanthanagar,Bangalore - 560050</p>
        </div>
        <div class="col-md-2">
           <h5><i class="fas fa-phone-alt"></i> &nbsp; Contact Us</h5>
              <p><a href="tel:9342548006">+91 9342548006</a></p>
              <p><a href="tel:080-22428503">080-22428503</a></p>
              <p><a href="tel:9342548006">080-25928397</a></p>
              <!--<p class="mail-p"><i class="fas fa-envelope"></i>&nbsp;<a href="mailto:">info@suhasdiagnostics.in</a> </p>-->
        </div>
        <div class="col-md-3">
            <h5><i class="fas fa-envelope"></i>&nbsp; Mail Us</h5>              
            <p class="mail-p"><a href="mailto:info@suhasdiagnostics.com">info@suhasdiagnostics.com</a> </p>
             <p class="mail-p"><a href="mailto:contact@suhasdiagnostics.com">contact@suhasdiagnostics.com</a> </p>
             <p><a href="feedback.php"><h5>Feedback</h5></a></p>
        </div>
          <div class="col-md-3">
               <h5>Quick Links</h5>
               <ul style="list-style: none;">
              <li><a href="aboutus.php" target= "_blank">About Us</a></li>
              <li><a href="services.php" target= "_blank">Services</a></li>
              <li><a href="doctors.php" target= "_blank">Doctors</a></li>
              <li><a href="partners.php" target= "_blank">Partners</a></li>
              <li><a href="corporates.php" target= "_blank">Corporate</a></li>
              <li><a href="Blog/blog.php" target= "_blank">Blog</a></li>
              </ul>
          </div>
      </div>
      <div style="text-align-last: center;margin-bottom: 10px;">
        <h5>Follow Us</h5>
        <a href="https://www.facebook.com/people/Suhas-Diagnostics/100068429118279/" style="margin-right:15px;"target= _blank>
          <img src="img/fb.png" width="40px" alt="facebook" /></a>
<a href="https://twitter.com/SuhasDiagnosti1" target= _blank style="margin-right:15px;">
  <img src="img/tw.png" width="40px" alt="twitter" /></a>
<a href="https://www.linkedin.com/in/suhas-diagnostics-100166213/" style="margin-right:15px;" target= _blank>
  <img src="img/linked.png" width="40px"  alt="linkedin"/></a>
<a href="https://www.instagram.com/suhasdiagnostics/" style="margin-right:15px;"target= _blank>
  <img src="img/insta.png" width="40px"  alt="instagram" /></a>
             
      </div>

    </div>
    <div class="copy-right">
        <div class="container copyright-social-icon">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-6">
                    <span>© Suhas Diagnostics Center <?php echo date('Y'); ?>, All Rights Reserved.</span>
                </div>
                <div class="row col-md-6">
                  <div class="col-md-4">
                  <span><strong><a href="terms-condition.php">Terms & Conditions</a></strong> </span></div>
                  <div class="col-md-3">
                    <span><strong><a href="privacy-policy.php">Privacy Policy</a></strong> </span></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="mobile-view-quick-links d-block d-md-none">
    <div class="row">
        <div class="col-sm-12 d-flex">
            <a href="tel:9342548006" class="quick-tabs-wrapper call-us">
                <div class="quick-tabs-images">
                   <i class="fa fa-phone" aria-hidden="true" style="font-size:25px;color:#559934;"></i>
                </div>
                <p>Call Us</p>
            </a>
            <div class="linebreak"></div>
            <a href="homevisit.php" class="quick-tabs-wrapper home-visit">
                <div class="quick-tabs-images">
                    <i class="fa fa-home" aria-hidden="true" style="font-size:25px;color:#559934;"></i>
                </div>
                <p>Book Home Visit</p>
            </a>
            <div class="linebreak"></div> 
            <a href="Health-Profile" class="quick-tabs-wrapper find-center">
                <div class="quick-tabs-images">
                   <i class="fa fa-medkit" aria-hidden="true" style="font-size:25px;color:#559934;"></i>
                </div>
                <p>Book Package</p>
            </a>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade presModal" id="myModal1"  tabindex="-1" role="dialog" style="z-index:99999 !important;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Book a Test Online</h4><br/>   
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
       <div class="modal-body" id="modalbody">
        <!--<p class="title">Book a home visit with Suhas and take the step towards a healthy life</p>-->
        <div class="">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="" method="POST" id="book_online_test" name="book_online_test" onsubmit="return book_validation()">
    <small id="result"></small>
       <div class="form-group">
   <input class="form-control" type="text" id="p_name"name="p_name" style="border:2px solid #e1e5e8;padding:18px;"placeholder="Enter Name" required /></div>
    <div class="form-group">
    <input class="form-control" id="p_mobile"name="p_mobile"style="border:2px solid #e1e5e8;padding:18px" placeholder="Enter Phone Number"type="tel" required></div>
    <div class="form-group">
      <input class="form-control" id="p_email"name="p_email" style="border:2px solid #e1e5e8;padding:18px" placeholder="Enter Mail Id"type="email" required>
    </div>
      <div class="form-group">
   <input class="form-control" type="number" min="18" max="90" id="age"name="age" style="border:2px solid #e1e5e8;padding:18px;"placeholder="Enter Age" required /></div>
   <div class="form-group">
   <select class="form-control" placeholder="select Gender" name="gender" id="gender" required>
      <option value="">Select gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select></div>
    <div class="form-group">
    <select class="form-control" placeholder="select City" name="city" id="city" required>
      <option value="">Select City</option>
      <option value="Bangalore">Bangalore</option>
    </select></div>
    <div class="form-group">
     <select class="form-control" placeholder="select Test" name="test_name" id="test_name" required>
      <option value="">Select Test</option>
      <?php
        include('config.php');
    $sql="select * from  package";
       $result=$conn->query($sql);
        if($result->num_rows>0)
      {
       while($row = mysqli_fetch_assoc($result)) 
       {
       
        ?>     
      <option value="<?php echo $row["package_name"];?>"><?php echo $row["package_name"];?></option>
         <?php
    }
    }
?>

    </select></div>

        <button type="submit"  id="book" name="book" class="btn2">Book</button>
  </form>
</div>
      </div>
    
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="del btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!---ENd-->

<!-- Modals -->



<div class="modal fade presModal" id="uploadPresModal" tabindex="-1" role="dialog" aria-labelledby="uploadPresModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row right-side-blog-page login-modal-content">
                <div class="col-sm-12">
                    <div class="">
                        <div class="title-wrapper">
                          <div class="modal-title login-modal-title">Upload Prescription</div>
                        </div>
                        <!--<p class="login-modal-desc">Not sure which tests to take? Share your prescription with us and our team will call you to book tests for you.</p>-->
                    </div>
                </div><br/>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" name="upload" id="upload" method="post" onsubmit="return upload_validation();" enctype="multipart/form-data">
               <!-- <div class="input-wrappr">-->
                    <div class="col-sm-12">
                        <div class="form-group input-newsletter">
                            <input id="name" type="text" name="name" class="signup-input" required>
                            <label for="name" class="control-label">Your Name</label><i class="bar"></i>
                        </div>
                    </div><br/>
                   
                <!--</div>-->
                <div class="col-sm-12">
                    <div class="form-group input-newsletter">
                        <input type="email" id='email' name="email" class="signup-input" required>
                        <label for="email" class="control-label">Your Email</label><i class="bar"></i>
                    </div>
                </div><br/>
                <div class="col-sm-12">
                    <div class="form-group input-newsletter">
                        <input type="tel" id='phone' name="phone"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="signup-input" required>
                        <label for="phone" class="control-label">Your Mobile Number</label><i class="bar"></i>
                    </div>
                </div><br/>
                <div class="col-sm-12">
                <div class="input-newsletter">
                            <select class="" id="gender" name="gender">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option> 
                                <option value="other">Other</option>
                            </select>
                            <!--  -->
                            
                        </div></div><br/>

                <input type="hidden" id="inquiry_type_prescription" value="upload_prescription" name="inquiry_type" />
                <div class="col-sm-12 file-wrapper">
                    <div class="input-newsletter">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input" id="prescription" name="prescription" multiple>
                            <label class="custom-file-label" for="customFile">Upload
                                Prescription</label>
                        </div>
                    </div>
                </div><br/>
                <!--<div class="col-sm-12 upload-desc-wrapper">
                    <span class="upload-desc">You can add upto 3 documents in formats: PDF, JPG,
                        PNG</span>
                </div>-->
                <div class="col-sm-12">
                    <div class="filelist">
                        </ul>
                    </div>

                    <div class="col-sm-12 button-col">
                        <input type="submit" id="u_submit" name="u_submit" class="btn btn-primary-custom btn-lg "/>
                        
                    </div>
                     </form>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
 
  function upload_validation()
  {
    var phoneno=/^\d{10}$/;
    var email1=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
    var letters = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
    
    var ph=document.upload.phone.value;
    var em=document.upload.email.value;
    var name=document.upload.name.value;
    var gender=document.upload.gender,value;
    //var sponserid=document.join.referid.value;
    alert(ph);
    if(ph === " " || em === " " || name === " " || gender === " ")
    {
      alert("Please Enter All The Fields");
      return false;
    }
    if(name.match(letters))
    {
     if(ph.match(phoneno))
     {
       if (em.match(email1))
        {
          return (true);
        }
        else
        {
          alert("You have entered an invalid email address!")
          return (false);
        }
      return true;
     }
     else
     {
      alert("Not a valid phone number, please enter correct 10 digit number");
      //document.book.phone.focus();
      return false;
     }
    return true;
    }
    else
    {
      alert("Not a correct name ,Enter only alphabets");
      //document.contact.names.focus();
      return false;
    }
   
  }

</script>




<?php
  include("config.php");
  if(isset($_POST["u_submit"]))
  {
 
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $gender=trim($_POST['gender']);
$pres=$_FILES["prescription"]["name"];


$v1=rand(1111,9999);
$v2=rand(1111,9999);
$v3=$v1.$v2;
$v3=md5($v3);

$dist="./Prescription/".$v3.$pres;

$dist1="Prescription/".$v3.$pres;

move_uploaded_file($_FILES["prescription"]["tmp_name"],$dist);

$resumeFileType = pathinfo($dist1,PATHINFO_EXTENSION);




    $id="";
    //$id="VGCFL".01;
    //$date1 = date("d M, Y");


    if($name =="") 
    {
     // $errorMsg=  "error : You did not entered name.";
      echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered name.</small>';
    }
    elseif($email == "") {
     // $errorMsg=  "error : You did not entered Email.";
      //$code= "2" ;
       echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered Email id.</small>';
    }
    elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
    //$errorMsg= 'error : You did not enter a valid email.';
    //$code= "2";
    echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered a valid Email id.</small>';
    }
    elseif($phone == ""){
    //$errorMsg=  "error : You did not entered phone number.";
    //$code= "3" ;
      echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Phone Number.</small>';
    }
    elseif(is_numeric(trim($phone)) == false){
    //$errorMsg=  "error : Please enter numeric value.";
    //$code= "3";
     echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Correct Phone Number.</small>';
    }
    elseif(strlen($phone)<10){
   // $errorMsg=  "error : Number should be ten digits.";
    //$code= "3";
      echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Correct 10 digit Phone Number.</small>';
    }
    elseif($gender == ""){
    //$errorMsg=  "error : You did not entered Test Name.";
    //$code= "4" ;
    echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Select Gender.</small>';
    }
   else
    {
    $result=mysqli_query($conn,"select id from prescription where id=(select max(id) from prescription)");
    if($row=mysqli_fetch_array($result))
    {
    $id=$row['id']+1;
    //$s=preg_replace("/[^0-9]/", '', $id);
    //$userid="VGCFL0".($s+1);
    }
      $sql = "INSERT INTO prescription(id,name,email,phone,gender,pres) VALUES ('$id','$name','$email','$phone','$gender','$dist1')";
    if ($conn->query($sql) === TRUE) 
    {
          
           $to1="info@suhasdiagnostics.com";
      $subject1="Online Test Book Request";
      $from1="contact@suhasdiagnostics.com";
      $message1= "Hi Team,".'<br/><br/>'."User Uploaded prescription,get prescription from dashboard.Please Contact them. Following are the User information.".'<br/><br/>'."Name : " . $name .'<br/>'."Email : " .$email.'<br/>'.
      "Phone : ".$phone .'<br/>' ."Gneder : ".$gender.'<br/><br/><br/>'."Regards".'<br/>'. "Suhas Diagnostics" .'<br/>'
      .'<a href="https://suhasdiagnostics.com">suhasdiagnostics.com</a>' . '<br/>' . 
      '<img src="https://suhasdiagnostics.com/img/suhas_logo.png" alt="suhas logo" width="160px" height="60px"/>'. '<br/>';
  
      $headers1 = "MIME-Version: 1.0" . "\r\n";
      $headers1 .= "From: Suhas Diagnostics <contact@suhasdiagnostics.com>"."\r\n";
      $headers1 .= "Content-type: text/html; charset=utf8\r\n ";
   
      if(mail($to1,$subject1,$message1,$headers1,'-fcontact@suhasdiagnostics.com'))
      {  
        
      $to=$email;
      $subject="Greetings from Suhas Diagnostics!!!";
      $from="contact@suhasdiagnostics.com";
 
      $message= '<html><body><table width="350" align="center" cellpadding="0" cellspacing="0" style="font-family:arial;font-size:14px;border:2px solid #d61f73">
  <tbody><tr><td width="350" height="10" style="background:#d61f73"> </td></tr> <tr><td width="350" style="background:#d61f73">
<table width="340" height="55" align="center" style="padding-bottom:10px;"><tbody><tr> <td width="340" height="55" align="center" valign="middle" style="background:#ffffff">
<p style="color:#341c53;text-decoration:none;font-family:arial;font-size:18px" target="_blank" ><strong>Greetings from Suhas Diagnostics!!!</strong></p></td></tr>
</tbody></table></td></tr><tr> <td width="350" height="20"> </td></tr>
<tr><td width="350" align="center" valign="middle"><table width="330" cellpadding="0" cellspacing="0" style="font-family:arial;font-size:14px;border:1px dotted #d61f73">
<tbody><tr><td width="350" align="center" valign="middle" style="padding:10px;line-height:20px"><strong>
<p style="color:#000000;" > Thank You!!! </strong></p><p style="color:#000000;">'. $name .'</p> 
<p>Thank you for uploading prescription.Our team will schedule the test and contact you soon.</p> <br/><strong>Follow Us On :</strong> <br/>
<a href="https://www.facebook.com/people/Suhas-Diagnostics/100068429118279/" target= _blank><img src="suhasdiagnostics.com/img/fb.png" width="30px" height="30px"/></a>
<a href="https://twitter.com/SuhasDiagnosti1" target= _blank><img src="suhasdiagnostics.com/img/tw.png" width="30px" height="30px"/></a>
<a href="https://www.linkedin.com/in/suhas-diagnostics-100166213/" target= _blank><img src="suhasdiagnostics.com/img/linked.png" width="30px" height="30px"/></a>
<a href="https://www.instagram.com/suhasdiagnostics/" target= _blank><img src="suhasdiagnostics.com/img/insta.png" width="30px" height="30px"/></a>
<br/><br/><br/>Regards<br/>Suhas Diagnostics Center<br/><a href="https://www.suhasdiagnostics.com">suhasdiagnostics.com</a><br/> 
<img src="suhasdiagnostics.com/img/suhas_logo.png" style="" width="160px" height="60px"/>
</td></tr><tr> <td width="350" align="center" valign="middle"></td></tr>
<tr><td width="350" height="15" align="center" valign="middle"> </td></tr> </tbody></table></td> </tr><tr><td width="350" height="20"> </td></tr>
</tbody></table></body></html>';
    
      $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "From: Suhas Diagnostics <contact@suhasdiagnostics.com>"."\r\n";

      $headers .= "Content-type: text/html; charset=utf8\r\n ";
    
      if(mail($to,$subject,$message,$headers))
      {
      echo '<div class="error-handle error-1" id="mydiv" onclick="this.style.display = \'none\'">Thank you!!!</div>';
      }
      else{
echo '<div class="error-2 error-1" id="mydiv" onclick="this.style.display = \'none\'">Sorry Failed to send try again.</div>';
 //print_r(error_get_last());
        }

} 
      else 
      {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
  }
 
  }
  //}
$conn->close();
    
  }
  
  ?>
<!-- Modals -->

</div>  

<script type="text/javascript">
  function book_validation()
  {
    var e=document.book_online_test.p_mobile.value,t=document.book_online_test.p_email.value,a=document.book_online_test.p_name.value,n=document.book_online_test.test_name.value;return alert(e)," "===e||" "===t||" "===a||" "===n?(alert("Please Enter All The Fields"),!1):a.match(/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/)?e.match(/^\d{10}$/)?!!t.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)||(alert("You have entered an invalid email address!"),!1):(alert("Not a valid phone number, please enter correct 10 digit number"),!1):(alert("Not a correct name ,Enter only alphabets"),!1)}</script>
    <?php include("config.php");if(isset($_POST["book"])){$name=trim($_POST['p_name']);$email=trim($_POST['p_email']);$phone=trim($_POST['p_mobile']);$test_name=trim($_POST['test_name']);$city=trim($_POST['city']);$age=trim($_POST['age']);$gender=trim($_POST['gender']);$id="";if($name==""){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered name.</small>';}elseif($email==""){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered Email id.</small>';}elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$email)){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered a valid Email id.</small>';}elseif($phone==""){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Phone Number.</small>';}elseif(is_numeric(trim($phone))==false){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Correct Phone Number.</small>';}elseif(strlen($phone)<10){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Correct 10 digit Phone Number.</small>';}elseif($test_name==""){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Please Enter Test Name.</small>';}elseif($city== " "){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered city.</small>';}elseif($age==" "){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">You Did not entered Age.</small>';}elseif($gender==""){echo '<small class="error-1 error-2" id="" onclick="this.style.display = \'none\'">Plesae Senect Gender.</small>';}
    else{$result=mysqli_query($conn,"select id from book_online_test where id=(select max(id) from book_online_test)");if($row=mysqli_fetch_array($result)){$id=$row['id']+1;}

$date=date("d,M Y H:i:s");
        $sql="select * from test_packages where pack_name = '$test_name'";
          $result=$conn->query($sql);

           if($result->num_rows>0)
          {
            if($row = mysqli_fetch_assoc($result)) 
          {

 $postData= [
   "patient_name" => $name, 
   "gender" => $gender, 
   "date_of_birth" => " ", 
   "age" => $age, 
   "address" => $address, 
   "mobile_no" => $phone, 
   "email" => $email, 
   "doctor_name" => "", 
   "patient_type" => " ", 
   "created_date" => $date, 
   "Tests" => [
         [
            "Name" => " ", 
            "Code" => " " 
         ] 
      ], 
   "Packages" => [
               [
                  "Name" => $row["pack_name"], 
                  "Code" => $row["pack_id"] 
               ] 
            ], 
   "BillItems" => [
                     [
                        "Name" => "Delivery Charges", 
                        "Code" => "2000" 
                     ] 
                  ], 
   "action" => "create", 
   "controller" => "integration/orders" 
]; 
 
 
   
$curl = curl_init();
//echo "heloo";
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ayuslab.com/integration/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postData),
CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'X-Token: 9360812728070309'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

    $sql="INSERT INTO book_online_test(id,name,email,mobile,city,age,gender,test_name,date1) VALUES ('$id','$name','$email','$phone','$city','$age','$gender','$test_name','$date')";if($conn->query($sql)===TRUE){

 
  $to1="info@suhasdiagnostics.com";$subject1="Online Test Book Request";$from1="contact@suhasdiagnostics.com";$message1="Hi Team,".'<br/><br/>'."User Booked Online Test.Schedule test for them. Following are the User information.".'<br/><br/>'."Name : ".$name.'<br/>'."Email : ".$email.'<br/>'."Phone : ".$phone.'<br/>'."Age : ".$age.'<br/>'."Gender :".$gender.'<br/>'."City : ".$city.'<br/>'."Test Name : ".$test_name.'<br/><br/><br/>'."Regards".'<br/>'."Suhas Diagnostics".'<br/>'.'<a href="https://suhasdiagnostics.com">suhasdiagnostics.com</a>'.'<br/>'.'<img src="suhasdiagnostics.com/img/suhas_logo.png"  style="" width="150px" height="60px"/>'.'<br/>';$headers1="MIME-Version: 1.0"."\r\n";$headers1.="From: Suhas Diagnostics <contact@suhasdiagnostics.com>"."\r\n";$headers1.="Content-type: text/html; charset=utf8\r\n ";if(mail($to1,$subject1,$message1,$headers1,'-fcontact@suhasdiagnostics.com')){$to=$email;$subject="Greetings from Suhas Diagnostics!!!";$from="contact@suhasdiagnostics.com";$message='<html><body><table width="350" align="center" cellpadding="0" cellspacing="0" style="font-family:arial;font-size:14px;border:2px solid #d61f73">
  <tbody><tr><td width="350" height="10" style="background:#d61f73"> </td></tr> <tr><td width="350" style="background:#d61f73">
<table width="340" height="55" align="center" style="padding-bottom:10px;"><tbody><tr> <td width="340" height="55" align="center" valign="middle" style="background:#ffffff">
<p style="color:#341c53;text-decoration:none;font-family:arial;font-size:18px" target="_blank" ><strong>Greetings from Suhas Diagnostics!!!</strong></p></td></tr>
</tbody></table></td></tr><tr> <td width="350" height="20"> </td></tr>
<tr><td width="350" align="center" valign="middle"><table width="330" cellpadding="0" cellspacing="0" style="font-family:arial;font-size:14px;border:1px dotted #d61f73">
<tbody><tr><td width="350" align="center" valign="middle" style="padding:10px;line-height:20px"><strong>
<p style="color:#000000;" > Thank You!!! </strong></p><p style="color:#000000;">'.$name.'</p> 
<p>Thank you for booking online test.Our team will schedule the test and contact you soon.</p> <br/><strong>Follow Us On :</strong> <br/>
<a href="https://www.facebook.com/people/Suhas-Diagnostics/100068429118279/" target= _blank><img src="suhasdiagnostics.com/img/fb.png" width="30px" height="30px"/></a>
<a href="https://twitter.com/SuhasDiagnosti1" target= _blank><img src="suhasdiagnostics.com/img/tw.png" width="30px" height="30px"/></a>
<a href="https://www.linkedin.com/in/suhas-diagnostics-100166213/" target= _blank><img src="suhasdiagnostics.com/img/linked.png" width="30px" height="30px"/></a>
<a href="https://www.instagram.com/suhasdiagnostics/" target= _blank><img src="suhasdiagnostics.com/img/insta.png" width="30px" height="30px"/></a>
<br/><br/><br/>Regards<br/>Suhas Diagnostics Center<br/><a href="https://www.suhasdiagnostics.com">suhasdiagnostics.com</a><br/> 
<img src="suhasdiagnostics.com/img/suhas_logo.png" style="" width="160px" height="60px"/>
</td></tr><tr> <td width="350" align="center" valign="middle"></td></tr>
<tr><td width="350" height="15" align="center" valign="middle"> </td></tr> </tbody></table></td> </tr><tr><td width="350" height="20"> </td></tr>
</tbody></table></body></html>';$headers="MIME-Version: 1.0"."\r\n";$headers.="From: Suhas Diagnostics <contact@suhasdiagnostics.com>"."\r\n";$headers.="Content-type: text/html; charset=utf8\r\n ";if(mail($to,$subject,$message,$headers)){
  $postData=["userId"=>$id,"phoneNumber"=>$phone,"countryCode"=>"+91",];$curl=curl_init();curl_setopt_array($curl,array(CURLOPT_URL=>'https://api.interakt.ai/v1/public/track/users/',CURLOPT_RETURNTRANSFER=>true,CURLOPT_ENCODING=>'',CURLOPT_MAXREDIRS=>10,CURLOPT_TIMEOUT=>0,CURLOPT_FOLLOWLOCATION=>true,CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,CURLOPT_CUSTOMREQUEST=>'POST',CURLOPT_POSTFIELDS=>json_encode($postData),CURLOPT_HTTPHEADER=>array('Content-Type: application/json','Authorization: Basic WjdZYks1UW9ER0Q2UkZoT3prUC1zX2NhM0x0YUo4YnkySnVOY1lQMUl3MDo='),));$response=curl_exec($curl);curl_close($curl);$postData1=["userId"=>$id,"phoneNumber"=>$phone,"countryCode"=>"+91","event"=>"bookonline event",];$curl=curl_init();curl_setopt_array($curl,array(CURLOPT_URL=>'https://api.interakt.ai/v1/public/track/events/',CURLOPT_RETURNTRANSFER=>true,CURLOPT_ENCODING=>'',CURLOPT_MAXREDIRS=>10,CURLOPT_TIMEOUT=>0,CURLOPT_FOLLOWLOCATION=>true,CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,CURLOPT_CUSTOMREQUEST=>'POST',CURLOPT_POSTFIELDS=>json_encode($postData1),CURLOPT_HTTPHEADER=>array('Content-Type: application/json','Authorization: Basic WjdZYks1UW9ER0Q2UkZoT3prUC1zX2NhM0x0YUo4YnkySnVOY1lQMUl3MDo='),));$response=curl_exec($curl);curl_close($curl);echo '<script>alert("Thank you for Booking Test! We will get back to you soon!!");</script>';}else{echo '<script>alert("Failed to send! Try Again!");</script>';}}else{echo "Error: ".$sql."<br>".$conn->error;}}}}}$conn->close();} ?>
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="unpkg.com/ionicons%404.5.10-0/dist/css/ionicons.min.css">
<link rel="stylesheet" href="cdn.jsdelivr.net/npm/select2%404.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&amp;display=swap">
<!--<link href="css/aos.css" rel="stylesheet" async>-->

<script src="js/jquery.min.js"></script>
<script src="js/lazysizes.min.js" async=""></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/popper.min.js" defer=""></script>
<script src="js/bootstrap.min.js"></script>
<script src="cdn.jsdelivr.net/npm/select2%404.0.13/dist/js/select2.min.js"></script>
<script nomodule="" src="unpkg.com/ionicons%404.5.10-0/dist/ionicons.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
  function myFunction()
  {
    document.getElementById("myDropdown").classList.toggle("show");

  }
  function myFunctionmobile()
  {
    document.getElementById("myDropdownmobile").classList.toggle("show");

  }
  
  function filterFunction()
  {
    var input,filter,ul,li,a,i;
    input=document.getElementById("myInput");
    filter=input.value.toUpperCase();
    div=document.getElementById("myDropdown");
    a=div.getElementsByTagName("a");
    for(i=0;i<a.length;i++)
    {
      txtValue=a[i].textContent || a[i].innerText;
      if(txtValue.toUpperCase().indexOf(filter) > -1)
{
a[i].style.display="";
}
else
{
  a[i].style.display="none";
}
    }
  }
function filterFunctionmobile()
  {
    var input,filter,ul,li,a,i;
    input=document.getElementById("myInputmobile");
    filter=input.value.toUpperCase();
    div=document.getElementById("myDropdownmobile");
    a=div.getElementsByTagName("a");
    for(i=0;i<a.length;i++)
    {
      txtValue=a[i].textContent || a[i].innerText;
      if(txtValue.toUpperCase().indexOf(filter) > -1)
{
a[i].style.display="";
}
else
{
  a[i].style.display="none";
}
    }
  }

</script>

   </footer>
   </body>
      <base />
</html>  