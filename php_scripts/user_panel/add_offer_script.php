<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    exit();
}
$error=false;
$error_msg=[];
$allowed_exs = array("jpg", "jpeg", "png");
$new_img_name="";
$new_bc_img_name="";
$seller=$_SESSION['user_id'];
if(!isset($_POST['book_id']) || strlen($_POST['book_id'])==0){
    $error=true;
    array_push($error_msg,'Nie wybrano podręcznika');
}
if(!isset($_POST['price']) || $_POST['price']==0){
    $error=true;
    array_push($error_msg,'Nie podano ceny');
}
if(!isset($_FILES['front_photo'])){
    $error=true;
    array_push($error_msg,'Nie wybrano przedniego zdjęcia');
}
else{
    $img_ex = pathinfo($_FILES['front_photo']['name'], PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-").'.'.$img_ex_lc;
    }else {
        $error=true;
        array_push($error_msg,'Rozszerzenie zdjęcia przodu nie jest obsługiwane');
    }
}
if(!isset($_FILES['back_photo'])){
    $error=true;
    array_push($error_msg,'Nie wybrano tylnego zdjęcia');
}
else{
    $bc_img_ex = pathinfo($_FILES['back_photo']['name'], PATHINFO_EXTENSION);
	$bc_img_ex_lc = strtolower($bc_img_ex);
    if (in_array($bc_img_ex_lc, $allowed_exs)) {
        $new_bc_img_name = uniqid("IMG-").'.'.$bc_img_ex_lc;
    }else {
        $error=true;
        array_push($error_msg,'Rozszerzenie zdjęcia tyłu nie jest obsługiwane');
    }
}
if(!$error){
    $id=$_POST['book_id'];
    $price=$_POST['price'];
    $img_upload_path = '../../users_offers/'.$new_img_name;
    $bc_img_upload_path = '../../users_offers/'.$new_bc_img_name;
    $serwer_img_path='users_offers/'.$new_img_name;
    $serwer_bc_img_path='users_offers/'.$new_bc_img_name;
    require_once '../connect.php';
    $connection=mysqli_connect($host, $db_user,$db_password,$db_name);
    $sql="INSERT INTO `users_offers`(`seller`,`price`,`photo1`,`photo2`,`status`, `book_id`) VALUES ('$seller','$price','$serwer_img_path','$serwer_bc_img_path','available','$id')";
    $result=mysqli_query($connection,$sql);
    if($result){
        move_uploaded_file($_FILES['front_photo']['tmp_name'], $img_upload_path);
        move_uploaded_file($_FILES['back_photo']['tmp_name'], $bc_img_upload_path);
        array_push($error_msg,'Pomyślnie dodano ofertę');
    }
    else{
        array_push($error_msg,'Błąd serwera.Spróbuj później');
    }
    mysqli_close($connection);
}
$array=[$error,$error_msg];
echo json_encode($array);
?>