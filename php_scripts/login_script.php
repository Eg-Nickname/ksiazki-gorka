<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
    }
    else{
        
    }
}else{
    header("Location:../index.html"); //Lokacja do ustawienia formularz logowania
}
?>
