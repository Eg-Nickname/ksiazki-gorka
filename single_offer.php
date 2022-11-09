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
                <div class="nav-image"></div>
            </div>

            <div class="center-nav">
                <div class="nav-list">
                    <ul>
                        <li><a href="#">Kategorie</a></li>
                        <li><a href="#">Kup</a></li>
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
                a
                </div>
                </div>

            </div> 
            <div class="break"></div> 
            
            <section>
                <div class="user_offer_box">
                    <div class="user_offer_box_image">

                    </div>
                    <div class="user_offer_box_content">
                    <a href="">
                        <p>Przod/Tył</p>
                    </a>
                    <p id="user_offer_box_content_price">28 PLN</p>
                    <button id="user_offer_box_content_button">Kup teraz</button>
                    </div>
                </div>
                <div class="user_offer_box"></div>
                <div class="user_offer_box"></div>
                <div class="user_offer_box"></div>
                <div class="modal-box"></div> <!--- popup -->
            </section>

        </div>
    </main>
    <script src="scripts/jquery-3.6.1.min.js"></script>
    <script src="scripts/single_offer_script.js"></script>
</body>
</html>