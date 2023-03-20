<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    if(isset($_POST['register_email']) && isset($_POST['register_password']) && isset($_POST['check_password']) && isset($_POST['name']) && isset($_POST['surname'])){ //    
        $error = false;
        $error_message=[];
        $register_result=false;
        $error_class=[];
        $register_email=strtolower(htmlentities($_POST['register_email']));
        $password=htmlentities($_POST['register_password']);
        $check_password=htmlentities($_POST['check_password']);
        $name=ucfirst(strtolower(htmlentities($_POST['name'])));
        $surname=ucfirst(strtolower(htmlentities($_POST['surname'])));
        //Warunki poprawić bo ctype nie zalicza polskich znaków
        if(!filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $error_message['register-email']="Podaj poprawny adres e-mail";
            array_push($error_class,"register_email");
        }
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){ //Warunki hasła do ustawienia
            $error = true;
            $error_message['register-password']="Hasło nie spełnia wymagań złożoności";
            array_push($error_class,"register_password");
        }
        if($password!=$check_password){
            $error = true;
            $error_message['password-check']="Hasła nie są zgodne";
            array_push($error_class,"register_password");
            array_push($error_class,"check_password");
        }
        // if(strlen($password)<8 || $password!=$check_password || !preg_match('/[A-Z]/',$password)){ //Warunki hasła do ustawienia
        //     $error = true;
        //     $error_message['register-password']="Hasła nie są zgodne lub nie spełniają wymagań dotyczących złożoności";
        //     array_push($error_class,"register_password");
        //     array_push($error_class,"check_password");
        // }
        if(preg_match('/[0-9\~\!\@\#\$\%\^\&\*\(\)\-\_\=\+\\{\}\;\'\:\"\,\<\>\.\?]/',$name)){
            $error=true;
            $error_message['name']="Imię musi się składać wyłącznie z liter";
            array_push($error_class,"name");
        }else{
            if(strlen($name)<2){
                $error=true;
                $error_message['name']="Imię jest za krótkie";
                array_push($error_class,"name");
            }
        }
        if(preg_match('/[0-9\~\!\@\#\$\%\^\&\*\(\)\-\_\=\+\\{\}\;\'\:\"\,\<\>\.\?]/',$surname)){
            $error=true;
            $error_message['surname']="Nazwisko musi się składać wyłącznie z liter";
            array_push($error_class,"surname");
        }else{
            if(strlen($surname)<2){
                $error=true;
                $error_message['surname']="Nazwisko jest za krótkie";
                array_push($error_class,"surname");
            }
        }
        // if(preg_match('/[0-9\~\!\@\#\$\%\^\&\*\(\)\-\_\=\+\\{\}\;\'\:\"\,\<\>\.\?]/',$surname) || strlen($surname)<2){
        //     $error=true;
        //     $error_message['surname']="Nazwisko musi się składać wyłącznie z liter";
        //     array_push($error_class,"surname");
        // }
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
                    $error_message['register-email']="Podany adres email jest przypisany do innego konta";
                    array_push($error_class,'register_email');
                }
                if(!$error){
                    // $password=md5($password);
                    $password=password_hash($password,PASSWORD_DEFAULT);
                    $sql="INSERT INTO users VALUES (NULL,'$register_email','$password','$name','$surname')";
                    $result=$connection->query($sql);
                    if(!$result){
                        throw new Exception($connection->error);
                    }
                    $sql="SELECT id_user FROM users WHERE email='$register_email' AND password='$password'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    array_push($error_message,$row[0]);
                    $register_result=true;
                    $_SESSION['logged_in']=true;
                    $_SESSION['user_id']=$row[0];
                    $_SESSION['email']=$register_email;
                    $_SESSION['name']=$name;
                    $_SESSION['surname']=$surname;
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
        $array=[$error,$error_message,$register_result,$error_class];
        echo json_encode ($array);
    }
    else{
        header("Location:../strona-logowania");
    }
}
else{

}
?>