<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    if(isset($_POST['register_email']) && isset($_POST['register_password']) && isset($_POST['check_password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username'])){ //    
        $error = false;
        $error_message=[];
        $register_result=false;
        $error_class=[];
        $register_email=strtolower(htmlentities($_POST['register_email']));
        $password=htmlentities($_POST['register_password']);
        $check_password=htmlentities($_POST['check_password']);
        $name=ucfirst(strtolower(htmlentities($_POST['name'])));
        $surname=ucfirst(strtolower(htmlentities($_POST['surname'])));
        $username=strtolower(htmlentities($_POST['username']));
        //Warunki poprawić bo ctype nie zalicza polskich znaków
        if(!filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            array_push($error_message,"Podaj poprawny adres e-mail");
            array_push($error_class,"register_email");
        }
        if(strlen($password)<8 || $password!=$check_password){ //Warunki hasła do ustawienia
            $error = true;
            array_push($error_message,"Hasła nie są zgodne lub nie spełniają wymagań dotyczących złożoności");
            array_push($error_class,"register_password");
            array_push($error_class,"check_password");
        }
        if(!ctype_alpha($name)){
            $error=true;
            array_push($error_message,"Podaj poprawnę imię");
            array_push($error_class,"name");
        }
        if(!ctype_alpha($surname)){
            $error=true;
            array_push($error_message,"Podaj poprawnę nazwisko");
            array_push($error_class,"surname");
        }
        if(1==0){ //tutaj dać warunek
            $error=true;
            array_push($error_message,"Podaj poprawną nazwę użytkownika");
            array_push($error_class,"username");
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
                $sql="SELECT * FROM users WHERE email='$register_email'";
                $result=$connection->query($sql);
                if(!$result) throw new Exception($connection->error);
                if($result->num_rows!=0){
                    $error=true;
                    array_push($error_message,"Podany adres email jest przypisany do innego konta");
                    array_push($error_class,'register_email');
                }
                $sql="SELECT * FROM users WHERE username='$username'";
                $result=$connection->query($sql);
                if(!$result) throw new Exception($connection->error);
                if($result->num_rows!=0){
                    $error=true;
                    array_push($error_message,"Podana nazwa użytkownika jest już zajęta");
                    array_push($error_class,'username');
                }
                if(!$error){
                    $password=md5($password);
                    $sql="INSERT INTO users VALUES (NULL,'$username','$register_email','$password','$name','$surname')";
                    $result=$connection->query($sql);
                    if(!$result){
                        throw new Exception($connection->error);
                    }
                    $register_result=true;
                    $_SESSION['logged_in']=true;
                    $_SESSION['username']=$username;
                    $_SESSION['email']=$register_email;
                    array_push($error_message,"Utworzono konto");
                }
                $connection->close();
                }
            }
            catch(Exception $e){
                array_push($error_message,"Krytyczny błąd systemu");
                $error=true;
            }
        }
        $array=[$error,$error_message,$register_result];
        echo json_encode ($array);
    }
    else{
        header("Location:../strona-logowania");
    }
}
else{

}
?>