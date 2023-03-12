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
    <title>Rejestracja/Logowanie</title>
    <link rel="stylesheet" href="style/logowanie.css">
    <script src="scripts/jquery-3.6.1.min.js"></script>
</head>
<body>
<div class="container">
        <div class="box-1">
            <div class="box-1-content">
                <h1>Lorem Ipsum Tralalaa, 
                    Tralala Kafvaraam</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a mattis augue, id elementum orci. 
                    Nulla condimentum et tellus sodales volutpat. Suspendisse rutrum ante rhoncus
                    .</p>
            </div>
        </div>
        <div class="box-1 box-1-hidden">
            <div class="box-1-content box-1-content-hidenn">
                <h1>Lorem Ipsum Tralalaa, 
                        Tralala Kafvaraam</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a mattis augue, id elementum orci. 
                        Nulla condimentum et tellus sodales volutpat. Suspendisse rutrum ante rhoncus
                        .</p>
            </div>
            
        </div>
    
    <div class="wrapper">
            <span class="sign-up-text form--hidden"><h2>Zarejestruj się</h2></span>
            <span class="sign-in-text"><h2>Zaloguj się</h2></span>
        <!-- <div class="box-2-3-wrapper"> -->
            
                    <form action="javascript:void(0);" class="register-in-form form--hidden " method="POST">

                        <div class="label-wrapper sign-up-form">
                            <label for="name">Imię:</label>
                            <div class="input-field">
                            <input type="text" placeholder="Wpisz imię" name="name" id="name" value="siema">
                            </div>
                            <span id="name-error" class="error_log_info">Lorem Ipsum</span>
                        </div>
                        <div class="label-wrapper sign-up-form label-wrapper-l">
                            <label for="surname">Nazwisko:</label>
                            <div class="input-field">
                            <input type="text" placeholder="Wpisz nazwisko" name="surname" id="surname" value="si"/>
                            </div>
                            <span id="surname-error" class="error_log_info">Lorem Ipsum</span>
                        </div>
                        <!-- <div class="label-wrapper sign-up-form">
                            <label for="username">Username:</label>
                            <div class="input-field">
                            <input type="text" placeholder="Wpisz nazwę użytkownika" name="username" id="username" value="2s"/>
                            </div>
                            <span id="username-error" class="error_log_info">Lorem Ipsum</span>
                            
                        </div> -->

                        <div class="label-wrapper register-in-form">
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
                        </div>
                        <div class="email-and-btn-container">
                            <div class="label-wrapper register-in-form label-wrapper-l">
                                <label for="register_email">Email:</label>
                                <div class="input-field">
                                <input type="email" placeholder="Wpisz swoj email" name="register_email" id="register_email" value="12@df.pl" />
                                </div>
                                <span id="register-email-error" class="error_log_info">Lorem Ipsum</span>
                            </div>
                            <button class="register-in-btn" id="register">Stwórz konto</button> 
                        </div>
                    </form>
                    
                    <form action="javascript:void(0);" class="sign-in-form" method="POST"> 
                        <div class="label-wrapper sign-in-form">
                            <label for="name">Adres Email:</label>
                            <div class="input-field">
                            <input type="email" placeholder="adres email" name="email" id="email" />
                            </div>
                            <span class="error_log_info_login">Lorem Ipsum</span> 
                        </div>
                        <div class="label-wrapper sign-in-form">
                            <label for="password">Hasło:</label>
                            <div class="input-field">
                                <input type="password" placeholder="Wpisz hasło" id="password" name="password" />
                            </div> 
                            <span class="error_log_info_login" id="login_result">h</span> 
                        </div>
                        <button class="sign-in-btn" id="log_in">Zaloguj się</button>
                        <!-- <button class="sign-in-btn-google" id="log_in_google"><span class="icon"></span>Zaloguj się za pomocą Google</button> -->
                        
                    </form>
                       
            <!-- </div> 
            <div class="box-3 form--hidden">
                <div class="form-container"> 
                    <form action="javascript:void(0);" class="register-in-form" method="POST">
                       
                    </form>
                </div>  
            </div> -->
        <!-- </div> -->
        <span class="error_log_info_password form--hidden">Hasło musi zawierać co najmniej 8 znaków, w tym cyfrę i wielką literę. <br> Nazwa użytkownika musi zawierać co najmniej 3 znaki oraz nie może zawierać znaków specjalnych</span>
        <span class="sign-up-goto-span"><p id="sign-up-goto">Nie masz jeszcze konta? &nbsp;<a id="linkCreateAccount"> Zarejestruj się</a></p></span>
        <span class="sign-in-goto-span form--hidden"><p id="sign-in-goto"> Masz już konto? &nbsp;<a id="linkLogin"> Zaloguj się</a></p></span>
    </div>  
   </div>
   <script src="scripts/login_script.js"></script> 
</body>
</html>