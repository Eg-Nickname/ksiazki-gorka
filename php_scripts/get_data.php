<?php
if(!isset($_POST['flag']))
{
    header("Location:../strona-glowna");
    exit();
}
else
{
    $error=false;
    $error_message="";
    $everything=[];
    $categories=[];
    require_once 'connect.php';
    mysqli_report((MYSQLI_REPORT_STRICT));
    try{
        $connection=new mysqli($host,$db_user,$db_password,$db_name);
        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_errno());
        }
        else{
            $sql="SELECT * FROM `sample_books`";
            $result=$connection->query($sql);
            if($result){
            $everything= $result->fetch_ALL(MYSQLI_ASSOC); //nieskończone
            }
            else{
                throw new Exception();
            }
        }
    }
    catch(Exception $e){
        $error=true;
        $error_message="Katastrofalny błąd serwera";
    }
    $array=[$error,$error_message,$everything,$categories];
    echo json_encode($array);
}
?>