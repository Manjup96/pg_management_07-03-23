<?php
  include("config.php");
  if(isset($_POST["submit"]))
  {

    $id = $_GET["id"];
   
    $name=mysqli_escape_string($conn,$_POST['name']);
    $email=mysqli_escape_string($conn,$_POST['email']);
    $phone=mysqli_escape_string($conn,$_POST['phone']);
   $password = mysqli_escape_string($conn,$_POST['password']);
   $company_name = mysqli_escape_string($conn, $_POST['company_name']);
   $address = mysqli_escape_string($conn,$_POST['address']);

    $id="";

     date_default_timezone_set('Asia/Kolkata');
$date1 =  date("d-m-Y");
$time1 = date("h:i:sa");


    $company_logo =$_FILES["company_logo"]["name"];

$dist="./admin/images/".$company_logo.$date1;

$dist1="admin/images/".$company_logo.$date1;

move_uploaded_file($_FILES["company_logo"]["tmp_name"],$dist);

$imageFileType = pathinfo($dist1,PATHINFO_EXTENSION);


 $image=$_FILES["image"]["name"];

$dis="./admin/images/".$image.$date1;

$dis1="admin/images/".$image.$date1;

move_uploaded_file($_FILES["image"]["tmp_name"],$dis);

$imageFileType1 = pathinfo($dis1,PATHINFO_EXTENSION);

//if($_FILES["company_logo"]["error"])
//{

  //if($_FILES["image"]["error"])
  //{


if($_FILES["company_logo"]["error"] AND $_FILES["image"]["error"])
{

 $sql = "update admin_login set name='$name',email='$email',phone='$phone',company_name='$company_name',address='$address' where id='$id'";
} 
else if($_FILES["company_logo"]["error"])
{
 $sql = "update admin_login set name='$name',email='$email',phone='$phone',company_name='$company_name',image='$dis1',address='$address' where id='$id'";
}
else if($_FILES["image"]["error"])
{
   $sql = "update admin_login set name='$name',email='$email',phone='$phone',company_name='$company_name',company_logo='$dist1',address='$address' where id='$id'";
}


       // $sql = "update admin_login set name='$name',email='$email',phone='$phone',company_name='$company_name',company_logo='$dist1',image='$dis1',address='$address' where id='$id'";
      if ($conn->query($sql) === TRUE) 
    {
      
      ?>
      <script type="text/javascript">
      alert("Profile Updated Successfully");
    window.location="profile.php";
  </script>
<?php
    

    }
    else
    {
       ?>
      <script type="text/javascript">
      alert("Unable to Update Profile, Plase try again ");
    window.location="profile.php";
  </script>
<?php
     //  echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
 
$conn->close();
    
    }
  
  ?>

