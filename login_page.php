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
            <span class="sign-up-text"><h2>Zarejestruj się</h2></span>
            <span class="sign-in-text form--hidden"><h2>Zaloguj się</h2></span>
        <div class="box-2-3-wrapper">
            <div class="box-2">
                <div class="form-container">
                    
                    <form action="javascript:void(0);" class="register-in-form " method="POST">

                        <div class="label-wrapper sign-up-form">
                            <label for="name">Imię:</label>
                            <div class="input-field">
                            <input type="text" placeholder="Wpisz imię" name="name" id="name" value="siema">
                            </div>
                        </div>
                        <div class="label-wrapper sign-up-form">
                            <label for="surname">Nazwisko:</label>
                            <div class="input-field">
                            <input type="text" placeholder="Wpisz nazwisko" name="surname" id="surname" value="si"/>
                            </div>
                        </div>
                        <div class="label-wrapper sign-up-form">
                            <label for="username">Username:</label>
                            <div class="input-field">
                            <input type="text" placeholder="Wpisz nazwę użytkownika" name="username" id="username" value="2s"/>
                            </div>
                        </div>
                        <button class="register-in-btn" id="register">Stwórz konto</button> 
                    </form>
                    
                    <form action="javascript:void(0);" class="sign-in-form form--hidden" method="POST"> 
                        <div class="label-wrapper sign-in-form">
                            <label for="name">Adres Email:</label>
                            <div class="input-field">
                            <input type="email" placeholder="adres email" name="email" id="email" />
                            </div>
                        </div>
                        <div class="label-wrapper sign-in-form">
                            <label for="password">Hasło:</label>
                            <div class="input-field">
                                <input type="password" placeholder="Wpisz hasło" id="password" name="password" />
                            </div> 
                        </div>
                        <button class="sign-in-btn" id="log_in">Zaloguj się</button>
                        <!-- <button class="sign-in-btn-google" id="log_in_google"><span class="icon"></span>Zaloguj się za pomocą Google</button> -->
                        
                    </form>
                    
                    
                </div>         
            </div> 
            <div class="box-3">
                <div class="form-container"> 
                    <form action="javascript:void(0);" class="register-in-form" method="POST">
                        <div class="label-wrapper register-in-form">
                            <label for="register_email">Email:</label>
                            <div class="input-field">
                            <input type="email" placeholder="Wpisz swoj email" name="register_email" id="register_email" value="12@df.pl" />
                            </div>
                        </div>
                        <div class="label-wrapper register-in-form">
                            <label for="register_password">Hasło:</label>
                            <div class="input-field">
                                <input type="password" placeholder="Hasło musi zawierać 8 znaków" name="register_password" id="register_password" value="123456789" />
                            </div> 
                        </div>
                        <div class="label-wrapper register-in-form">
                            <label for="check_password">Hasło:</label>
                            <div class="input-field">
                                <input type="password" placeholder="Potwierdź hasło"  name="check_password" id="check_password" value="123456789" />
                            </div> 
                        </div>
                        <button class="register-in-btn-google" id="register_google"><span class="icon"></span><span id="google-text">Zarejestruj się z Google</span></button>
                    </form>
                </div>  
            </div>
        </div>
        <span class="sign-up-goto-span form--hidden"><p id="sign-up-goto">Nie masz jeszcze konta? &nbsp;<a href="#" id="linkCreateAccount"> Zarejestruj się</a></p></span>
        <span class="sign-in-goto-span"><p id="sign-in-goto"> Masz już konto? &nbsp;<a href="#" id="linkLogin"> Zaloguj się</a></p></span>
    </div>  
   </div>
   <script src="scripts/login_script.js"></script> 
</body>
</html>