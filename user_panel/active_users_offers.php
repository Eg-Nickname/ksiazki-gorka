<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje oferty</title>
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/log_out.js"></script>
    <script defer src="../scripts/user_panel_scripts/get_own_offers.js"></script>
    <link rel="stylesheet" href="../style/oferty_add.css">
    <link rel="stylesheet" href="../style/active_users.css">
    <link rel="stylesheet" href="../style/sub_menu.css">

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
                    <a id="user-panel-button" href="../user_panel/active_users_offers.php"></a>
                    <a id="messages-button" href="../user_panel/wiadomosci-sprzedaz"></a>
                    <a id="log_out"></a>
                </div>
        </div>
    </nav>
    <section id="sub-menu">
        <ul>
            <li><a href="#">Dane</a></li>
            <li><a href="#">Twoje oferty</a></li>
            <li><a href="#">Wystaw</a></li>
            <li><a href="#">Kupujesz</a></li>
            <li><a href="#">Sprzedajesz</a></li>
            <li class="active"><a href="#">Wiadomosci</a></li>
        </ul>
    </section>
    <section id="users_offers_box">
    <!-- <div class="modal-box">
        <span class="close-modal-box">X</span>
        <img src="" class="offer-image">
        </div>
        <div class="popup-order-box">
            <p class="popup-order-box-alert"></p>   
        </div>
        <div class="delete-popup">
        <div class="delete-confirm">
            <div class="delete-button-wrapper">
                <h1 class="title-delete delete-text"></h1>
                <p class="delete-title"></p>
            <div class="button-wrapper">
                <button class="confirm-delete">Usuń</button>
                <button class="cancel-delete">Anuluj</button>
            </div>
            </div>
        </div>
    </div>
    </div> -->
    </section>
    <div class="modal-box">
        <div class="delete-box-wrapper"> 
            <h1 class="title-delete delete-text"></h1>
            <p class="delete-title"></p>
            <div class="delete-popup">
                    <div class="button-wrapper">
                        <button class="confirm-delete">Usuń</button>
                        <button class="cancel-delete">Anuluj</button>
                    </div>
            </div>
        </div>
        <div class="change-price-box-wrapper"> 
            <h1 class="title-delete delete-text"></h1>
            <div class="input-wrapper">
                <input type="number" id="change-price-input" placeholder="Zmień cenę" class="price_input">
            </div>
            <div class="delete-popup">
                    <div class="button-wrapper">
                        <button class="confirm-change-price">Zmień</button>
                        <button class="cancel-change-price">Anuluj</button>
                    </div>
            </div>
        </div>     
            <!-- <img src="" class="offer-image"> -->
            <!-- <div class="popup-order-box">
                <p class="popup-order-box-alert"></p>   
            </div> -->
                    <!-- <div class="delete-popup">
                        <div class="button-wrapper">
                            <button class="confirm-delete">Usuń</button>
                            <button class="cancel-delete">Anuluj</button>
                        </div>
                    </div> -->
    </div>
    <div class="modal-box-img">
            <span class="close-modal-box">X</span>
            <img src="" class="offer-image">
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