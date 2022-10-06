<?php
if(!isset($_POST['category']))
{
    header("Location:../strona-glowna");
    exit();
}
else
{
    $category = $_POST['category']; // do wywalenia
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
            $everything= $result->fetch_ALL(MYSQLI_ASSOC); //nieskończone
        }
    }
    catch(Exception $e){
        
    }
}
echo json_encode ($everything);
?>