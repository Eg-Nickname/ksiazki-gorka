<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
    exit();
}
if(!isset($_POST['flag'])){
    exit();
}
$user = $_SESSION['user_id'];
require_once '../connect.php';
$connection=mysqli_connect($host,$db_user,$db_password,$db_name);
if($connection){
    $sql="SELECT s.book_name,uo.offer_id,uo.price,uo.seller,u.name, u.surname FROM sample_books AS s JOIN (users_offers AS uo JOIN users AS u ON uo.seller=u.id_user) ON s.book_ID=uo.book_id WHERE `customer`='$user'";
    $result=mysqli_query($connection,$sql);
    $everything= mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_close($connection);
}
echo json_encode($everything);
?>