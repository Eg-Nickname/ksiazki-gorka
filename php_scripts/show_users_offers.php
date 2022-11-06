<?php
if(isset($_POST['book_id'])){
    $bookId=$_POST['book_id'];
    require_once "connect.php";
    $everything=[];
    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli($host,$db_user,$db_password,$db_name);
        if($connection->connect_errno==0){
            $sql="SELECT * FROM users_offers WHERE book_id='$bookId'";
            $result=$connection->query($sql);
            $everything= $result->fetch_ALL(MYSQLI_ASSOC);
        }
        else{
            throw new Exception(mysqli_connect_errno());
        }
    }
    catch(Exception $e){

    }
    echo json_encode($everything);
}
else{
    exit();
}
?>