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
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/oferty_single.css">
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
                        <li><a href="user_panel/add_offer_page.php">Sprzedaj</a></li>
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
<div class="offer-wrapper"> 
    <div class="filters-wrapper">
        <div class="filters">
            <div class="subject-wrapper">
                <h3>Przedmiot</h3>
                <div>
                    <div>
                    <label for="matematyka">Matematyka<input type="checkbox" class="subject_filter" id="matematyka"></label>
                    </div>
                    <div>
                    <label for="historia">Historia<input type="checkbox" class="subject_filter" id="historia"></label>
                    </div>
                    <div>
                    <label for="fizyka">Fizyka<input type="checkbox" class="subject_filter" id="fizyka"></label>
                    </div>
                    <div>
                    <label for="chemia">Chemia<input type="checkbox" class="subject_filter" id="chemia"></label>
                    </div>
                    <div>
                    <label for="wos">WOS<input type="checkbox" class="subject_filter" id="wos"></label>
                    </div>
                </div>
                <!-- Historia<input type="checkbox" class="subject_filter" id="historia"> -->
            </div>
            <div class="part-wrapper">
            <h3>Część</h3>
            <div>
            <div>
                <label for="part1">1 <input type="checkbox" class="part_filter" id="part1"></label>
                </div>
                <label for="part2">2 <input type="checkbox" class="part_filter" name="" id="part2"></label>
                </div>
            </div>
            
            <div class="book-type-wrapper">
            <h3>Zakres</h3>
                <label for="podstawowy">Podstawowy<input type="checkbox" class="scope_filter" id="podstawowy"></label>
                <label for="rozszerzony">Rozszerzony<input type="checkbox" class="scope_filter" id="rozszerzony"></label>
            </div>
            <!-- <div class="book-price-wrapper">
            <h3>Cena</h3>
            <input type="range" class="" id="" min="10" max="40"> // chciałem zrobić takiego slidera z ceną od do, ale to za duzo jebania sie z js-emmax min pobierany z js 
            <label for="from">Od<input type="number" class="" id="from"></label>
            <label for="to">Do<input type="number" class="" id="to"></label>
            </div> -->
            
            <div class="filter-button-wrapper">
            <button id="sumbit_filters">Zastosuj</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="books">
            <div class="books-wrapper">
            </div>
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
    <script src="scripts/offer_page_script.js"></script>
</body>
</html>