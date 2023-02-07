<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    exit();
}
if(!isset($_POST['id']) || !isset($_POST['price'])){
    exit();
}
$offer=$_POST['id'];
$price=$_POST['price'];
$user=$_SESSION['user_id'];
$result=false;
require_once '../connect.php';
$connection = mysqli_connect($host,$db_user,$db_password,$db_name);
if($connection){
    $sql="UPDATE users_offers SET `price`='$price' WHERE `seller`='$user' AND `offer_id`='$offer'";
    $result = mysqli_query($connection,$sql);
    mysqli_close($connection);
}
echo json_encode($result);
?>