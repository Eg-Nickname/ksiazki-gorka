<?php
// session_start();
// if(!isset($_SESSION['logged_in'])){
//     header('Location:../strona-logowania');
//     exit();
// }
?>

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
    <title>Dodaj ofertę</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/log_out.js"></script>
    <script defer src="../scripts/user_panel_scripts/add_offer_page_script.js"></script>
    <link rel="stylesheet" href="../style/oferty_add.css">
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
                        <li><a href="../index.php">Kategorie</a></li>
                        <li><a href="../offer_page.php">Kup</a></li>
                        <li><a href="#">Sprzedaj</a></li>
                    </ul>
                </div>
            </div>
            <?php
            if($is_logged_in){
                echo<<<END
                <div class="right-nav-authorized">
                    <a id="user-panel-button" href ="../user_panel/active_users_offers.php"></a>
                    <a id="messages-button" href="../user_panel/wiadomosci-sprzedaz"></a>
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
        <form onsubmit="return false" enctype="multipart/form" id="offer_form">
        <div class="search-container">
            <h4>Podaj Tytuł:</h4>
            <input class="search-input" type="text" placeholder="Wybierz podręcznik">
            <input id="book_id" type="hidden">
            <div class="suggestions-list" id="suggestions_list"></div>
            <p class="error_span" id="title_error_span">Error</p>
        </div>
        <!-- DAJ TU GDZIEŚ INFO ŻE ZDJĘCIE MUSI BYĆ JPG,PNG,JPEG -->
        <div class="price-container">
        <h4>Cena</h4>
        <input type="number" name="price" id="price" placeholder="Podaj cenę w zł" class="price_input">
        <p class="error_span" id="price_error_span">Podałeś złą cene</p>
        </div>
        <div class="images-container">
        <div class="front_photo_wrapper">
        <h4>Zdjęcie Przód:</h4>
            <div id="dragger_wrapper">
            <div id="dragger" class="dragger">
                <div class="icon"><i class="fa-solid fa-images"></i></div>
                 <button class="browseFile" id="browseFile">Wybierz Plik</button> <input type="file" hidden id="front_photo" class="fileInputField" />
            </div>
            <div class="fileName"> </div>
            <p class="imgnote">Obsługiwane formaty: JPG, PNG, JPEG</p>
           
        </div>   
        <!-- <label for="front_photo">Zdjęcie - Przód</label><input type="file" name="front_photo" id="front_photo"> -->
        <p class="error_span" id="front_image_error_span">Problem z 1 zdjeciem</p>
        </div>
        <div class="back_photo_wrapper">
        <h4>Zdjęcie Tył:</h4>
        <div id="dragger_wrapper">
            <div id="dragger" class="dragger">
                <div class="icon"><i class="fa-solid fa-images"></i></div> <button class="browseFile" id="browseFile">Wybierz Plik</button> <input type="file" hidden id="back_photo" class="fileInputField" />
            </div>
            <div class="fileName"> </div>
            <p class="imgnote">Obsługiwane formaty: JPG, PNG, JPEG</p>
        </div>   
        <!-- <label for="front_photo">Zdjęcie - Przód</label><input type="file" name="back_photo" id="back_photo"> -->
        <p class="error_span" id="back_image_error_span">Problem z tylnim zdjeciem</p>
        </div>
        </div>
        <p id="chosen" class="chosen">Wybrany podręcznik: </p>
        <p id="chosen_price" class="chosen">Cena: </p>
        <button id="submit">Wystaw ofertę</button>
        <p class="error_span" id="submit_error_span">Error</p>
        </form>
        </div>
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
    <div class="popup-order-box">
        <p class="popup-order-box-alert"></p>   
    </div>
</body>
</html>