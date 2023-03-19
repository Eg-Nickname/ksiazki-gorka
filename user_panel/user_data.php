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
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/user_data_script.js"></script>
    <script defer src="../scripts/log_out.js"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/oferty_reserved.css">
    <link rel="stylesheet" href="../style/sub_menu.css">
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
    <style>
        /* jak chcesz to sobie pozmieniaj na display, ale żeby nie było tak jak na logowaniu */
        .error_log_info{
            visibility: hidden;
        }
        
        .active_error{
            visibility: visible !important;
        }
        .active_error_border{
            border-color: red;
        }
    </style>
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
    <!-- MASZ trochę styli wyżej -->
        <div>
            <label for="name">Imię:</label>
            <input type="text" placeholder="Wpisz imię" name="name" id="name" value="<?php echo $name?>">
            <span id="name-error" class="error_log_info">Lorem Ipsum</span>

            <label for="surname">Nazwisko:</label>
            <input type="text" placeholder="Wpisz nazwisko" name="surname" id="surname" value="<?php echo $surname?>"/>
            <span id="surname-error" class="error_log_info">Lorem Ipsum</span>

            <label for="register_email">Email:</label>
            <input type="email" placeholder="Wpisz swoj email" name="email" id="email" value="<?php echo $email?>" />
            <span id="email-error" class="error_log_info">Lorem Ipsum</span>
            <button id="change_data">Zmień dane</button> 
        </div>
        <div>
            <label for="new_password">Nowe hasło:</label>
            <input type="password" class="password_change" placeholder="Hasło musi zawierać 8 znaków" name="new_password" id="new_password" />
            <span id="new_password-error" class="error_log_info">Lorem Ipsum</span> 
            
            <label for="check_password">Potwierdź nowe hasło:</label>
            <input type="password" class="password_change" placeholder="Powtórz hasło"  name="check_password" id="check_password" />
            <span  id="check_password-error"class="error_log_info">Lorem Ipsum</span> 

            <label for="current_password">Podaj obecne hasło:</label>
            <input type="password" class="password_change" placeholder="Obecne hasło"  name="current_password" id="current_password" />
            <span  id="current_password-error"class="error_log_info">Lorem Ipsum</span> 

            <button id="change_password">Zmień hasło</button> 
        </div>

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
    <div class="popup-order-box">
        <p class="popup-order-box-alert"></p>   
    </div>
</body>
</html>