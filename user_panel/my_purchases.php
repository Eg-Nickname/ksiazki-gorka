<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje zakupy</title>
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/my_purchases_script.js"></script>
    <script defer src="../scripts/log_out.js"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/oferty_reserved.css">
    <link rel="stylesheet" href="../style/sub_menu.css">
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
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
            <li><a href="dane-uzytkownika">Dane</a></li>
            <li><a href="twoje-oferty">Twoje oferty</a></li>
            <li><a href="dodaj-oferte">Wystaw</a></li>
            <li class="active"><a href="wiadomosci-kupno">Kupujesz</a></li>
            <li><a href="wiadomosci-sprzedaz">Sprzedajesz</a></li>
            <li><a href="wiadomosci">Wiadomosci</a></li>
        </ul>
    </section>

    <div class="container">
        <div class='customer_box'>
            
        </div>

        <div class="chat_box">
            <div class="chat_user_box">
                <p class="chat_user_box_name">WYBIERZ KONWERSACJĘ</p>
            </div>
            <div class="input_box">
                <input type="text" name="message" id="message_input" placeholder="Napisz coś..." disabled>
            </div>
        </div>
    </div>
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