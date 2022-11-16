<?php
session_start();
$error=false;
$message="";
if(isset($_SESSION['logged_in']))
{
    if(isset($_POST['offer_id']) && $_POST['book_id']){
        $offer_id = $_POST['offer_id'];
        $book_id = $_POST['book_id'];
        require_once "connect.php";
        mysqli_report((MYSQLI_REPORT_STRICT));
        try{
            $connection=new mysqli($host,$db_user,$db_password,$db_name);
            if($connection->connect_errno==0){
                $sql = "SELECT * FROM users_offers WHERE offer_id = '$offer_id' AND book_id = '$book_id' AND status='available'";
                $result=$connection->query($sql);
                if($result->num_rows){
                    $user_id=$_SESSION['user_id'];
                    // $sql="UPDATE users_offers SET "
                }
                else{
                    throw new Exception(mysqli_connect_errno());
                }
            }
            else{
                throw new Exception(mysqli_connect_errno());
            }
        }
        catch(Exception $e){
            $error=true;
            $message="Operacja się nie powiodła. Krytyczny błąd. Spróbuj odświeżyć stronę";
        }
    }
    else{
        $error=true;
        $message="Krytyczny błąd.  Spróbuj odświeżyć stronę";
    }
}
else{
    $error=true;
    $message="Musisz być zalogowany";
}
$array=[$error,$message];
echo json_encode($array);
?>