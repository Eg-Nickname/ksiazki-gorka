<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header('Location:../strona-logowania');
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
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/oferty_reserved.css">
    <link rel="stylesheet" href="../style/sub_menu.css">
</head>
<body>
<nav>
    <div class="nav-container">
        
        <div class="left-nav">
            <a href="../strona-glowna"><div class="nav-image"></div></a>
        </div>

        <div class="center-nav">
            <div class="nav-list">
                <ul>
                    <li><a href="../strona-glowna#offers-section">Kategorie</a></li>
                    <li><a href="../lista-ofert">Kup</a></li>
                    <li><a href="../user_panel/dodaj-oferte">Sprzedaj</a></li>
                </ul>
            </div>
        </div>
        
            <div class="right-nav-authorized">
                <a id="user-panel-button" href="dane-uzytkownika"></a>
                <a id="messages-button" href="../user_panel/wiadomosci"></a>
                <a id="log_out"></a>
            </div>
    </div>
</nav>
<section id="sub-menu">
        <ul>
            <li class="active"><a href="dane-uzytkownika">Dane</a></li>
            <li><a href="twoje-oferty">Twoje oferty</a></li>
            <li><a href="dodaj-oferte">Wystaw</a></li>
            <li><a href="wiadomosci-kupno">Kupujesz</a></li>
            <li><a href="wiadomosci-sprzedaz">Sprzedajesz</a></li>
            <li><a href="wiadomosci">Wiadomosci</a></li>
        </ul>
    </section>
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
<footer>
        <div class="footer-container">
            <div class="logo-footer">
                <a href="../strona-glowna"><div class="footer-image"></div></a>
                <span class="break"></span>
            </div>

            <div class="footer-nav">
                <div class="footer-nav-responsive">
                    <div class="nav-list">
                        <ul>
                            <li><a href="../strona-glowna#offers-section">Kategorie</a></li>
                            <li><a href="../lista-ofert">Kup</a></li>
                            <li><a href="dodaj-oferte">Sprzedaj</a></li>
                        </ul>
                    </div>
                    <div class="social-box-responsive">
                        <div class="socials">
                            <a href="#"><span class="mail">gorckacost@mail.com</span></a>
                            <a href="#"><span class="location">Rabka-zdrój</span></a>
                        </div>
        
                    </div>
                    <div class="copyright">
                        <p>© 2022 Nazwa. Wszelkie prawa zastrzeżone </p>
                    </div>
                </div>
                
            </div>

            <div class="social-box">
                <div class="socials">
                    <span class="mail">gorckacost@mail.com</span>
                    <span class="location">Rabka-zdrój</span>
                </div>

            </div>
        </div>
    </footer>
</body>
</html>