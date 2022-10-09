<?php
session_start();
if(isset($_SESSION['logged_in']))
{
    header('Location:strona-glowna');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="scripts/jquery-3.6.1.min.js"></script>
</head>
<body>
    <input type="email" name="email" id="email">
    <input type="password" id="password" name="password">
    <button id="log_in">Zaloguj</button>
        <div>
            <input type="email" name="register_email" id="register_email" value="12@df.pl">
            <input type="password" name="register_password" id="register_password" value="123456789">
            <input type="password" name="check_password" id="check_password" value="123456789">
            <input type="text" name="name" id="name" value="siema">
            <input type="text" name="surname" id="surname" value="si">
            <input type="text" name="username" id="username" value="2s">
            <button id="register">Zarejestruj się</button>
        </div>
    <script src="scripts/script.js"></script>
</body>
</html>