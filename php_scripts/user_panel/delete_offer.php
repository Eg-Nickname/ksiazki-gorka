<?php // zrobić tak, że każdy onclick potwierdzenia jest osobno
session_start();
if(!isset($_SESSION['logged_in']) || !isset($_POST['offer'])){
    exit();
}
$offer=$_POST['offer'];
$user=$_SESSION['user_id'];
$result;
mysqli_report(MYSQLI_REPORT_STRICT);
try{//usuwanie zdjęć trzeba tu zrobić
    require_once '../connect.php';
    $connection = mysqli_connect($host,$db_user,$db_password,$db_name);
    if($connection->connect_errno==0){
        $sql="DELETE FROM users_offers WHERE seller='$user' AND offer_id='$offer'";
        $result=mysqli_query($connection,$sql);
        mysqli_close($connection);
    }
}
catch(Exception $e){
    $result='1';
}
echo json_encode($result);
?>