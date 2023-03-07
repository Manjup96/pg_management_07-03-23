<!DOCTYPE html>
<html lang="en">
<?php include("session.php");?>
<head>
 <?php include("header-links.php");?>
 <?php include("functions.php");?>
 <?php include("config.php");?>

 <style type="text/css">
   #successful_data_submit{
    color: green;
   }
 </style>


</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
         <?php include("sidebar.php");?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
             <?php include("navbar.php");?>
            <!-- Navbar End -->


            <!-- Form Start -->

            <!-- Registration form Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="row g-4 text-center" >
                    
                    <div class="col-sm-12 col-xl-7">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Regsiter User</h6>

                              <?php
                              $user_id = $_SESSION['user_id'];
        $sql="select * from admin_login where phone = '$user_id'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
             if($row = mysqli_fetch_assoc($result)) 
             {
        ?>
                            <form action="profiledb.php?id=<?php echo $row["id"];?>" name="register_user" id="register_user" method="POST" onsubmit="return reg_user_validation();" enctype="multipart/form-data">

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"];?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]?>" required>
                                    </div>
                                </div>
                                 <div class="row mb-3">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="phone" name="phone" value="<?php echo $row["phone"];?>" required>
                                    </div>
                                </div>
                                 <!-- <div class="row mb-3">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div> -->
                                 <div class="row mb-3">
                                    <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="company_name" value="<?php echo $row["company_name"];?>" name="company_name" required>
                                    </div>
                                </div>
                                 <div class="row mb-3">
                                    <label for="company_logo" class="col-sm-2 col-form-label">Company Logo</label>
                                    <div class="col-sm-6">
                              <input type="file" class="form-control" id="company_logo" name="company_logo" value="<?php echo $row["company_logo"];?>" required>
                                    </div>
                                    <div class="col-sm-3">
                                      <img src="admin/<?php echo $row["company_logo"]?>" width="100px;"/>
                                    </div>
                                </div>
                                 <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" id="image" name="image" required value="<?php echo $row["image"];?>">
                                    </div>
                                     <div class="col-sm-3">
                                      <img src="admin/<?php echo $row["image"]?>" width="100px"/>
                                    </div>
                                </div>

                                 <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="address" id="address" value="<?php echo $row["address"];?>" required></textarea>
                                    </div>
                                </div>
                           
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-danger">Back</button>
                            </form>

                            <?php
                          }
                        }
                            ?>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Form End -->


         <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Behife</a>, All Right Reserved. 
                        </div>
                      
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


<script type="text/javascript">
$('.num-test').keyup(function(event) {
    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;

    // format number
    $(this).val(function(index, value) {
      return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
  });
</script>


</body>

</html>