<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/reserved_offers_script.js"></script>
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
                    <a id="messages-button"></a>
                    <a id="log_out"></a>
                </div>
        </div>
    </nav>


    <div class="container">
        <div class='customer_box'>

            <div class="offer_info_wrapper">
                <div class="offer_info">
                    <p class="buyer_name">Kupujący: Adam Małysz</p>
                    <p href="#" id="zajebane_p"><img href="#" src="../images/envelope.svg" alt="envelope" class="offer_info_chatbtn">Otwórz czat</p>
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
            </div>

            <div class="offer_info_wrapper">
                <div class="offer_info">
                    <p class="buyer_name">Kupujący: Adam Małysz</p>
                    <p href="#" id="zajebane_p"><img href="#" src="../images/envelope.svg" alt="envelope" class="offer_info_chatbtn">Otwórz czat</p>
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
            </div>

            <div class="offer_info_wrapper">
                <div class="offer_info">
                    <p class="buyer_name">Kupujący: Adam Małysz</p>
                    <p href="#" id="zajebane_p"><img href="#" src="../images/envelope.svg" alt="envelope" class="offer_info_chatbtn">Otwórz czat</p>
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
            </div>

        </div>

        <div class="chat_box">
            <div class="chat_user_box">
                <p class="chat_user_box_name">Andrzej Kmicic</p>
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