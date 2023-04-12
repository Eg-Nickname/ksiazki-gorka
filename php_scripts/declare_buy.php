<?php
/////////////SPRAWDZIĆ CZY TO NIE OFERTA UŻYTRKOWNIKA NIBY BY SIE PRZYDALO
session_start();
$error=false;
$message="";
if(isset($_SESSION['logged_in']))
{
    if(isset($_POST['offer_id'])){
        $offer_id = htmlentities($_POST['offer_id']);
        require_once "connect.php";
        mysqli_report((MYSQLI_REPORT_STRICT));
        try{
            $connection=new mysqli($host,$db_user,$db_password,$db_name);
            if($connection->connect_errno==0){
                $sql = "SELECT sample_books.book_name,users_offers.seller FROM users_offers JOIN sample_books ON sample_books.book_ID=users_offers.book_id  WHERE offer_id = '$offer_id' AND status='available'";
                $result=$connection->query($sql);
                if($result->num_rows){
                    $row=mysqli_fetch_array($result);
                    $user_id=$_SESSION['user_id'];
                    if($row["seller"]!=$user_id){
                        $sql="UPDATE users_offers SET customer='$user_id', status='reserved' WHERE offer_id = '$offer_id'";
                        $result=$connection->query($sql);
                        $message="<h3>Zarezerwowano.</h3> Przejdź do wiadomości, aby omówić szczegóły ze sprzedawacą";
                        $seller=$row["seller"];
                        $buy_msg="<b>Zgłoszono chęć kupna: ".$row["book_name"]."</b>";
                        $sql_msg="INSERT INTO messages (message,sender_id,reciver_id) VALUES ('$buy_msg','$user_id','$seller')";
                        $result=mysqli_query($connection,$sql_msg);
                    }
                    else{
                        $error=true;
                        $message="Nie możesz zarezerwować swojej oferty";
                    }
                    mysqli_close($connection);
                    if(!$result) throw new Exception(mysqli_connect_errno());
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
            $message="Oferta nie jest już dostępna";
        }
    }
    else{
        $error=true;
        $message="Krytyczny błąd. Spróbuj odświeżyć stronę";
    }
}
else{
    $error=true;
    $message="Musisz być zalogowany";
}
$array=[];
$array['error']=$error;
$array['message']=$message;
echo json_encode($array);
?>