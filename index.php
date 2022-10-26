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
    <title>Kiermasz książek</title>
    <script src="scripts/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="style/main.css">
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
                <div class="left-main">
                    <h2>
                        Kupuj I Sprzedawaj 
                        Używane Podręczniki 
                        Po Najlepszych Cenach
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Suspendisse nisi odio, molestie at dolor ut, tristique scelerisque. 
                    </p>
                    <div class="search-container">
                        <input class="search-input" type="text" placeholder="Znajdź swój podręcznik">
                        <div class="suggestions-list" id="suggestions_list">
                        </div>
                    </div>
                    <div class="main-images-responsive">
                        <div class="main-image1"></div>
                        <div class="main-image2"></div>
                        <div class="main-image3"></div>
                    </div>  
                </div>
                <div class="right-main">
                <div class="main-images">
                    <div class="main-image1"></div>
                    <div class="main-image2"></div>
                    <div class="main-image3"></div>
                </div>
                </div>
            </div>
        </main>

    <div class="container">
        <div class="oferrs-section">
            <div class="offers-text">
                <h3>Podręczniki Szkolne</h3>
                <p><a href="lista-ofert">Przeglądaj wszystko</a></p>
            </div>
            <div class="buttons-wrapper">
                <div class="buttons-wrapper-1">
                    <button type="button" name="historia" value="historia" class="btn">Historia</button>   
                    <button type="button" name="polski" value="polski" class="btn">J.Polski</button>   
                    <button type="button" name="angielski" value="angielski" class="btn">J.Angielski</button>   
                    <button type="button" name="matematyka" value="matematyka" class="active btn" focused>Matematyka</button>   
                    <button type="button" name="fizyka" value="fizyka" class="btn">Fizyka</button>   
                    <button type="button" name="chemia" value="chemia" class="btn">Chemia</button>   
                    <button type="button" name="biologia" value="biologia" class="btn">Biologia</button>   
                    <button type="button" name="informatyka" value="informatyka" class="btn">Informatyka</button>
                    <button type="button" name="wos" value="wos" class="btn">WOS</button>
                    <button type="button" name="hit" value="hit" class="btn">HiT</button>
                    <button type="button" name="geografia" value="geografia" class="btn">Geografia</button>
                    <button type="button" name="pp" value="pp" class="btn">PP</button>
                    <button type="button" name="zawodowe" value="zawodowe" class="btn">Zawodowe</button>
                </div>    
            </div>    
        </div>
            <div class="books">
                <div class="books-wrapper" id="books-wrapper">
                    <!-- <div class="item1 subject">
                        <div class="book-img item-img-1">
                        </div>
                        <p class="book-name">
                        Matematyka 4 podręcznik Z.R
                        </p>
                        <p class="book-price">
                        Zaczyna od 30 PLN
                        </p>
                        <button class="item1-btn">Sprawdź ofertę</button>
                    </div>
                    <div class="item2 subject">
                        <div class="book-img item-img-2">
                        </div>
                        <p class="book-name">
                        Matematyka 4 zbiór zadań Z.R
                        </p>
                        <p class="book-price">
                        Zaczyna od 25 PLN
                        </p>
                        <button class="item2-btn">Sprawdź ofertę</button>    
                    </div>
                    <div class="item3 subject">
                        <div class="book-img item-img-3">
                        </div>
                        <p class="book-name">
                        Matematyka 4 podręcznik Z.P
                        </p>
                        <p class="book-price">
                        Zaczyna od 30 PLN
                        </p>
                        <button class="item3-btn">Sprawdź ofertę</button>    
                    </div>
                    <div class="item4 subject">
                        <div class="book-img item-img-4">
                        </div>
                        <p class="book-name">
                        Matematyka 4 zbiór zadań Z.P
                        </p>
                        <p class="book-price">
                        Zaczyna od 30 PLN
                        </p>
                        <button class="item4-btn">Sprawdź ofertę</button>    
                    </div>
                    <div class="item5 subject">
                        <div class="book-img item-img-5">
                        </div>
                        <p class="book-name">
                        Matematyka 3 podręcznik Z.R
                        </p>
                        <p class="book-price">
                        Zaczyna od 30 PLN
                        </p>
                        <button class="item5-btn">Sprawdź ofertę</button>   
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div class="logo-footer">
                <div class="footer-image"></div>
                <span class="break"></span>
            </div>

            <div class="footer-nav">
                <div class="footer-nav-responsive">
                    <div class="nav-list">
                        <ul>
                            <li><a href="#">Kategorie</a></li>
                            <li><a href="#">Kup</a></li>
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
    <script src="scripts/script.js"></script> <!-- Jak skrypt będzie się wywalał to trzeba usunąć module, -->
</body>
</html>