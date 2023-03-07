
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

    <meta charset="utf-8">
   <?php include("header_link.php");?>
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	
	
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
                            <h4 class="m-b-10">Manage PGs</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">View PG Details</a></li>
                            <!-- <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
           
          
            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Bed Details	</h5>
                        <!-- <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                        <a type="button" href="PGs-reg.php" class="btn btn-info" style="color: #fff !important;float:right;" />Enroll PG</a>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>LoginID</th> -->
                                        <th>id</th>
                                        <th>floor_no</th>
                                        <th>room_no</th>
                                        <th>bed_no</th>
                                        <th>no_of_persons_sharing_per_room</th>
                                        <th>amount</th>
                                        <th>Available</th>
                                        <th>Action</th>


    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                 $sql="select * from `adding-bed-details1`";
                  $result=$conn->query($sql);

             if($result->num_rows>0)
                {
            while($row = mysqli_fetch_assoc($result)) 
                {
                                    ?>
                                    <tr>
                                        <!-- <td>TESTID</td> -->
                                        <td><?php echo $row["id"];?></td>
                                        <td><?php echo $row["floor_no"];?></td>
                                        <td><?php echo $row["room_no"];?></td>
                                        <td><?php echo $row["bed_no"];?></td>
                                        <td><?php echo $row["no_of_persons_sharing_per_room"];?></td>
                                        <td><?php echo $row["amount"];?></td>
                                        <td><?php 
                                        echo $row["Available"];
                                        if(($row["Available"])=="Yes")
                                        {?>
                                            <a type="button" href="#" data-toggle="modal" data-target="#AssignBedtoTenant<?php echo $row['id'] ?>"><i class="fa fa-edit btn-outline-primary"></i></a>
                                            
                                        <?php }
                                        ?></td>
                                        <!-- <td></td> -->
                                        <td><a href="edit-bed-details.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit btn-outline-primary"></i></a>
                                            <a href="delete-bed-details.php?id=<?php echo $row['id'];?>"><i class="fa fa-trash btn-outline-danger"></i></a>
                                            <a type="button" data-toggle="modal" data-target="#viewPGs<?php echo $row['id'] ?>"><i class="fa fa-eye btn-outline-success"></i></a>
                                            <a type="button" href="print-PG.php?id=<?php echo $row['id'];?>"><i class="fa fa-print btn-outline-dark"></i></a>
                                            <a type="button" href=""><i class="fa fa-envelope btn-outline-warning"></i></a>
                                        </td>
                                    </tr>
        
        <div id="AssignBedtoTenant<?php echo $row['id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bed Details</h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                    </div>
                    <div class="modal-body">
                        <div class="row col-md-12">
                            <div class="col-md-7">
                               
                                            
                                    
    <?php
                        
                        $d= $_GET['id'];
        $result=mysqli_query($conn,"select * from adding-bed-details1 where id='$d'");
        if($row=mysqli_fetch_array($result))
        {
             
                        ?>
            <form action="edit-assigning-bed-to-tenant-db.php?id=<?php echo $d?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="tenant_email">tenant_email</label>
                    <input type="email" aria-describedby="emailHelp" name="tenant_email" class="form-control" id="tenant_email" value="<?php echo $row['tenant_email'];?>"placeholder="" readonly>
                </div>
                </div>

                  

                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="tenant_mobile_no">tenant_mobile_no</label>
                    <input type="phone" name="tenant_mobile_no" class="form-control" id="tenant_mobile_no" value="<?php echo $row['tenant_mobile_no']?>"
                    placeholder="">
                </div>
                </div>

                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="due">due</label>
                    <input type="text" class="form-control" name="due" id="due"  value="<?php echo $row['due']?>">
                </div>
                </div>
                                
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="paid_amount">Property Phone</label>
                    <input type="text" name="paid_amount" class="form-control" id="paid_amount" value="<?php echo $row['paid_amount']?>" placeholder="">
                </div>
                </div>
          
               
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="floating-label" for="Available">Available</label>
                    <input type="text" name="Available" class="form-control" id="Available" value="No" disabled>
                 </div>
                 </div>
        

                   
                             
                             <input  type="submit" class="btn  btn-primary" name="submit" id="submit" value="Submit">
                        </form>

                        <?php
                         }
                        ?>

                        

                            </div>
                            
                           


                        
                         <div style="float: right">
                                <a class="btn badge-primary" style="color: white;" herf="edit-pg-management.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-edit btn-outline-light"></i> Edit </a>
                                <a type="button" class="btn btn-danger" style="color: white;" data-dismiss="modal">Close</a>
                           </div>
                         
                         
                    </div>
                </div>
            </div>
        </div>
        
        <div id="viewPGs<?php echo $row['id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">PG Details</h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                    </div>
                    <div class="modal-body">
                        <div class="row col-md-12">
                            <div class="col-md-7">
                               
                        <!-- <h6>Property Name : <?php #echo $row['property_name']; ?></h6>
                         <h6>Property Email : <?php #echo $row['property_email']; ?></h6>
                         <h6>Property Phone : <?php #echo $row['property_phone']; ?></h6>
                          <h6>Pincode : <?php #echo $row['pincode']; ?></h6> -->

                        

                            </div>
                            
                           


                        
                         <div style="float: right">
                                <a class="btn badge-primary" style="color: white;" href="edit-pg-management.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-edit btn-outline-light"></i> Edit </a>
                                <a type="button" class="btn btn-danger" style="color: white;" data-dismiss="modal">Close</a>
                           </div>
                         
                         
                    </div>
                </div>
            </div>
        </div>
                  
                     <?php
                       }
                   }
                   else{

                     ?>
               <tr>
        <td colspan="5"><?php echo "No Records found";?></td>
        </tr>
              <?php
                   }
                           ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->
           
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>



</body>
</html>

