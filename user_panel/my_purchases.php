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
</head>
<body>
<nav>
        <div class="nav-container">
            
            <div class="left-nav">
                <a href="../index.php"><div class="nav-image"></div></a>
            </div>

            <div class="center-nav">
                <div class="nav-list">
                    <ul>
                        <li><a href="../index.php#offers-section">Kategorie</a></li>
                        <li><a href="../offer_page.php">Kup</a></li>
                        <li><a href="../user_panel/add_offer_page.php">Sprzedaj</a></li>
                    </ul>
                </div>
            </div>
            
                <div class="right-nav-authorized">
                    <a id="user-panel-button" href="active_users_offers.php"></a>
                    <a id="messages-button" href="../user_panel/wiadomosci-sprzedaz"></a>
                    <a id="log_out"></a>
                </div>
        </div>
    </nav>


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
                <a href="index.php"><div class="footer-image"></div></a>
                <span class="break"></span>
            </div>

            <div class="footer-nav">
                <div class="footer-nav-responsive">
                    <div class="nav-list">
                        <ul>
                            <li><a href="#offers-section">Kategorie</a></li>
                            <li><a href="offer_page.php">Kup</a></li>
                            <li><a href="#">Sprzedaj</a></li>
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