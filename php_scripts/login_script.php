<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $error = false;
        $error_message=[];
        $login_result=false;
        $email=$_POST['email'];
        $password=$_POST['password'];
        $email=htmlentities($email);
        $password=htmlentities($password);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            array_push($error_message,"Podaj poprawny adres e-mail");
        }
        if(strlen($password)==0){
            $error = true;
            array_push($error_message,"Podaj poprawne hasło");
        }
        if(!$error){
            require_once "connect.php";
            mysqli_report((MYSQLI_REPORT_STRICT));
            try{
                $connection=new mysqli($host,$db_user,$db_password,$db_name);
                if($connection->connect_errno!=0){
                    throw new Exception(mysqli_connect_errno());
                }
                else{
                $password=md5($password);
                $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
                $result=$connection->query($sql);
                if(!$result){
                    array_push($error_message,"Nie znaleziono użytkownika");
                }
                else{
                    $number_of_users=$result->num_rows;
                    if($number_of_users==1){
                        $user_data=$result->fetch_assoc();
                        $login_result=true;
                        $_SESSION['logged_in']=true;
                        $_SESSION['username']=$user_data['username'];
                        $_SESSION['email']=$user_data['email'];
                    }
                }
                $connection->close();
                }
            }
            catch(Exception $e){
                array_push($error_message,"Krytyczny błąd systemu");
                $error=true;
            }
        }
        $array=[$error,$error_message,$login_result];
        echo json_encode ($array);
    }
    else{
        header("Location:../strona-logowania");
    }
}else{

}
?>
