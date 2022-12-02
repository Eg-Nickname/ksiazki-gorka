<?php
session_start();
$is_logged_in=false;
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
    $is_logged_in =true;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta</title>
    <link rel="stylesheet" href="style/oferty.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            
            <div class="left-nav">
                <a href="index.php"><div class="nav-image"></div></a>
            </div>

            <div class="center-nav">
                <div class="nav-list">
                    <ul>
                        <li><a href="index.php#offers-section">Kategorie</a></li>
                        <li><a href="offer_page.php">Kup</a></li>
                        <li><a href="#">Sprzedaj</a></li>
                    </ul>
                </div>
            </div>

            <?php
            if($is_logged_in){
                echo<<<END
                <div class="right-nav-authorized">
                    <a id="user-panel-button"></a>
                    <a id="messages-button"></a>
                    <a id="log_out"></a>
                </div>
                END;
            }
            else{
                echo<<<END
                <div class="right-nav">
                    <a href="strona-logowania">Zaloguj się</a>
                </div>
                END;
            }
            ?>

        </div>
    </nav>

    <main>
        <div class="main-container">
            <div class="category-path">
                <!-- <p>Matematyka > Matematyka 3 podręcznik</p> -->
            </div>
            <div class="base-book-info">
                <div class="base-img">
                </div>
                <div class="base-info-wrapper">
                    <div class="base-title">
                        <!-- <h2></h2> -->
                    </div>
                    <div class="base-info">

                        <div class="publisher-info info-box-style">
                            <div class="publisher-icon icon-box-style">
                            <img src="images/book-bookmark.svg" alt="">
                            </div>
                            <div class="publisher-name name-box-style">
                            <!-- <p>Wydawnictwo WSIP</p> -->
                            </div>   
                        </div>
                        <div class="date-info info-box-style">
                            <div class="date-icon icon-box-style">
                                <img src="images/calendar.svg" alt="">
                                </div>
                                <div class="date-name name-box-style">
                                <!-- <p>Wydawnictwo WSIP</p> -->
                                </div>   
                        </div>
                        <div class="isbn-info info-box-style">
                            <div class="isbn-icon icon-box-style">
                                <img src="images/hastag.svg" alt="">
                                </div>
                                <div class="isbn-name name-box-style">
                                <!-- <p>Wydawnictwo WSIP</p> -->
                                </div> 
                            </div>
                        <div class="authors-info info-box-style">
                            <div class="authors-icon icon-box-style">
                                <img src="images/copyright.svg" alt="">
                                </div>
                                <div class="authors-name name-box-style">
                                <!-- <p>Wydawnictwo WSIP</p> -->
                                </div> 
                            </div>
                            </div>
                    <div class="break">
                    </div>
                    <div class="base-text">
                    </div>
                </div>

                <div class="base-price-info">
                <a id="go_to_offer">Przejdź do ofert</a>
                </div>
                </div>

            </div> 
            <div class="break"></div> 
            
            <section id="seller-offers">
                <!-- <div class="user_offer_box">
                    <div class="user_offer_box_image"></div>
                    <div class="user_offer_box_content">
                    <button>Tył</button>
                    <p class="user_offer_box_content_price">28 PLN</p>
                    <button class="user_offer_box_content_button">Kup teraz</button>
                    </div>
                </div> -->
                <!-- <div class="user_offer_box"></div>
                <div class="user_offer_box"></div>
                <div class="user_offer_box"></div> -->
                
            </section>
            <div class="modal-box">
                    <span class="close-modal-box">X</span>
                    <img src="" class="offer-image">
                </div> <!--- popup -->
                <div class="popup-order-box">
                 <p class="popup-order-box-alert"></p>   
                </div>
            </div>
            <div class="buy-popup">
                <div class="buy-confirm">
                    <div class="buy-button-wrapper">
                        <h1 class="title-buy buy-text"></h1>
                        <h2 class="price-buy buy-text"></h2>
                    <div class="button-wrapper">
                        <button class="confirm-buy">Biorę</button>
                        <button class="cancel-buy">Anuluj</button>
                    </div>
                    </div>
                </div>
            </div>
        <button id="scroll-to-top"></button>
        <h1 class="show_me_more">Pokaż więcej</h1>
    </main>
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
                            <li><a href="index.php#offers-section">Kategorie</a></li>
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
    <script src="scripts/jquery-3.6.1.min.js"></script>
    <script src="scripts/single_offer_script.js"></script>
</body>
</html>