<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header('Location:../strona-logowania');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje zakupy</title>
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../chat/chat.js"></script>
    <script defer src="../scripts/log_out.js"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/chat.css">
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
            <li class="active"><a href="wiadomosci">Wiadomosci</a></li>
        </ul>
    </section>
    <div class="break"></div>
    <ul>
            <li><a class="change_customer_box" id="all">Wszystkie</a></li>
            <li><a class="change_customer_box" id="buy">Kupujesz</a></li>
            <li><a class="change_customer_box" id="sell">Sprzedajesz</a></li>
        </ul>
    <div class="container">
        <div class='customer_box'>
             <!-- <div class="offer_info_wrapper">
                <div class="offer_info">
                    <p class="buyer_name">Kupujący: Adam Małysz</p>
                    <p href="#" class="lovely_p"><img href="#" src="../images/envelope.svg" alt="envelope" class="offer_info_chatbtn">Otwórz czat</p>
                </div>
                <div class="offer_info_book_price">
                    <p class="offer_book">Matematyka na czasie</p>
                    <p class="offer_price">19 PLN</p>
                </div>
                <div class="offer_info_book_price">
                    <p class="offer_book">Matematyka na czasie 2</p>
                    <p class="offer_price">22 PLN</p>
                </div>
                <div class="offer_info_book_price">
                    <p class="offer_book">Matematyka na czasie 3</p>
                    <p class="offer_price">23 PLN</p>
                </div>
                <div class="offer_info_sum">
                    <p class="offer_sum">Suma:</p>
                    <p class="offer_price_sum">64 PLN</p>
                </div>
            </div> -->
        </div>
        <div class="chat_box">
            <div class="chat_user_box">
                <p class="chat_user_box_name">WYBIERZ KONWERSACJĘ</p>
            </div>
        <div class="chat-msg-container">
            <div class="chat_messages" style="color:black;">
            <!-- Wiadomości idą tutej -->
            </div>
        </div>
            <div class="input_box">
                <input type="text" name="message" id="message_input" placeholder="Napisz coś..." disabled>
                <button type="submit"  id="message_send"  disabled></button>
                <!-- onclick="send_message();" -->
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
    <div class="popup-order-box">
        <p class="popup-order-box-alert">Komunikat</p>
    </div>
</body>
</html>