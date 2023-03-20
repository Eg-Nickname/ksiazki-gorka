<?php
session_start();
if(!isset($_SESSION['logged_in']) || !isset($_POST['offer']) || !isset($_POST['status'])){
    exit();
}
$offer = htmlentities($_POST['offer']);
$user=$_SESSION['user_id'];
$status=htmlentities($_POST['status']);
$result=false;
require_once "../connect.php";
$connection=mysqli_connect($host,$db_user,$db_password,$db_name);
if(!mysqli_connect_errno()){
    $sql="UPDATE users_offers SET status='$status' WHERE offer_id='$offer' AND (seller='$user' OR customer='$user')";
    $result=mysqli_query($connection,$sql);
    $was_updated=mysqli_affected_rows($connection);
    mysqli_close($connection);
}
echo json_encode($was_updated);

?>