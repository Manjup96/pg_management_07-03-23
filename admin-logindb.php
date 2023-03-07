


<?php
// include config file
include_once("config.php");
session_start();

// if "login" button clicked
if(isset($_POST['login'])){
    // store property_email
    $property_email = mysqli_real_escape_string($conn, $_POST['property_email']);
    // store password
    //$password = md5($_POST['password']);
    $password=$_POST['password'];
    // check property_email is unique or not
    $property_emailQuery = "SELECT * FROM `pg_management` WHERE property_email = '$property_email'";
    $runproperty_emailQuery = mysqli_query($conn, $property_emailQuery);

    if(!$runproperty_emailQuery){
        echo "Query Failed";
    }else{
        if(mysqli_num_rows($runproperty_emailQuery) > 0){
            $passwordQuery = "SELECT * FROM `pg_management` WHERE property_email = '$property_email' AND password = '$password'";
            $runPasswordQuery = mysqli_query($conn, $passwordQuery);

            if(!$runPasswordQuery){
                echo "Query Failed";
            }else{
                if(mysqli_num_rows($runPasswordQuery) > 0){
                    $fetchData = mysqli_fetch_assoc($runPasswordQuery);
                    $_SESSION['id'] = $fetchData['id'];
                    $_SESSION['property_email']=$fetchData['property_email'];
                    $_SESSION['property_name'] = $fetchData['property_name'];
                    $_SESSION['LOG_IN'] ='yes';
                    ?>
                    <script>window.location.href="pg-management-registration.php"</script>
                    <?

                }else{
                    echo '<div class="error-handle error-1" id="mydiv" onclick="this.style.display = \'none\'">Invalid Password <span onclick="this.parentElement.style.display=\'none\'" class="topright">&times</span></div>';?>
                    <script>
                        alert("Invalid Pasword");
                        window.location.href="pg-login.php"</script>
                <?php }
            }
        }else{
            echo "Invalid property_email address";
            ?>
             <script>window.location.href="pg-login.php"</script>
             <?php
        }
    }
}
?>