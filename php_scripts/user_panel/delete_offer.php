<?php // zrobić tak, że każdy onclick potwierdzenia jest osobno
session_start();
if(!isset($_SESSION['logged_in']) || !isset($_POST['offer'])){
    exit();
}
$offer=htmlentities($_POST['offer']);
$user=$_SESSION['user_id'];
$result;
mysqli_report(MYSQLI_REPORT_STRICT);
try{//usuwanie zdjęć trzeba tu zrobić
    require_once '../connect.php';
    $connection = mysqli_connect($host,$db_user,$db_password,$db_name);
    if($connection->connect_errno==0){
        $sql="DELETE FROM users_offers WHERE seller='$user' AND offer_id='$offer' AND status='available'";
        $result=mysqli_query($connection,$sql);
        $result=mysqli_affected_rows($connection);
        if($result){
            $sql="SELECT photo1, photo2 FROM users_offers WHERE seller='$user' AND offer_id='$offer'";
            $result = mysqli_query($connection,$sql); 
            $result=mysqli_fetch_row($result);
            foreach($result as $photo){
                if($photo){
                    $path="../../$photo";
                    if(file_exists($path)){
                        unlink($path);
                    }
                }
            }
        }
        
        mysqli_close($connection);
    }
}
catch(Exception $e){
    $result=false;
}
echo json_encode($result);
?>