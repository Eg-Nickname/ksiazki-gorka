<?php
session_start();
if(!isset($_SESSION['admin_permission']) && !isset($_POST['id'])){
    exit();
}
$id=$_POST['id'];
if(!is_numeric($id)){
    exit();
}
$sql="DELETE FROM users_offers WHERE offer_id='$id'";
require_once "../../php_scripts/connect.php";
$connection=mysqli_connect($host,$db_user,$db_password,$db_name);
$msg="Błąd serwera";
if(!mysqli_connect_errno()){
    $result=mysqli_query($connection,$sql);
    $was_delated=mysqli_affected_rows($connection);
    if($was_delated==1){
        $msg="Usunięto ofertę ID $id";
    }
    else{
        $msg="Oferta ID $id nie istnieje";
    }
    mysqli_close($connection);
}
echo json_encode($msg);
?>