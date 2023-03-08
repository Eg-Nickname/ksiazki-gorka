<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    exit();
}
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje dane</title>
    <link rel="stylesheet" href="../style/logowanie.css">
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/user_data_script.js"></script>
    <script defer src="../scripts/log_out.js"></script>
</head>
<body>
<form action="javascript:void(0);" class="register-in-form " method="POST">
    <div class="label-wrapper sign-up-form">
        <label for="name">Imię:</label>
        <div class="input-field">
        <input type="text" placeholder="Wpisz imię" name="name" id="name" value="<?php echo $name?>">
        </div>
        <span id="name-error" class="error_log_info">Lorem Ipsum</span>
    </div>
    <div class="label-wrapper sign-up-form label-wrapper-l">
        <label for="surname">Nazwisko:</label>
        <div class="input-field">
        <input type="text" placeholder="Wpisz nazwisko" name="surname" id="surname" value="<?php echo $surname?>"/>
        </div>
        <span id="surname-error" class="error_log_info">Lorem Ipsum</span>
    </div>
    <div class="label-wrapper register-in-form label-wrapper-l">
        <label for="register_email">Email:</label>
        <div class="input-field">
        <input type="email" placeholder="Wpisz swoj email" name="email" id="email" value="<?php echo $email?>" />
        </div>
        <span id="register-email-error" class="error_log_info">Lorem Ipsum</span>
    </div>
    <!-- <div class="label-wrapper register-in-form">
        <label for="register_password">Hasło:</label>
        <div class="input-field">
            <input type="password" placeholder="Hasło musi zawierać 8 znaków" name="register_password" id="register_password" value="123456789" />
        </div>
        <span id="register-password-error" class="error_log_info">Lorem Ipsum</span> 
        
    </div>
    <div class="label-wrapper register-in-form label-wrapper-l">
        <label for="check_password">Hasło:</label>
        <div class="input-field">
            <input type="password" placeholder="Potwierdź hasło"  name="check_password" id="check_password" value="123456789" />
        </div>
        <span  id="password-check-error"class="error_log_info">Lorem Ipsum</span> 
    </div> -->
    <button class="register-in-btn" id="change_data">Zmień dane</button> 
</form>
</body>
</html>