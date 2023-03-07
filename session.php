    <?php

session_start(); 

if(!isset($_SESSION['user_id'])){
   header("Location:login.php");
}
else
{
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
}
include("config.php");

$url = basename($_SERVER['PHP_SELF']);

?>
