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
    <script src="scripts/jquery-3.6.0.min.js"></script>
</head>
<body>
    <input type="text" name="email" id="email">
    <input type="password" id="password" name="password">
    <button id="log_in">Zaloguj</button>
    <script src="scripts/script.js"></script>
</body>
</html>