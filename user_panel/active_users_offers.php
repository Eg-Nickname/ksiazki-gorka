<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje oferty</title>
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/get_own_offers.js"></script>
    <link rel="stylesheet" href="../style/oferty_add.css">
    <style>
        
section{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 2rem;
    padding: 6rem 2rem;
    max-width: 1140px;
    margin: 0 auto;
}

section .user_offer_box{
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    min-height: 500px;
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 1rem;
    row-gap: 2rem;
}

section .user_offer_box_image{
    /* background-image: url(../images/matm3podr.png); */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 210px;
    height: 300px;
    cursor: pointer;
    
}

section .user_offer_box_content{
    display: flex;
    flex-direction: column;
    row-gap: 1.5rem;
    justify-content:center;
    align-items:center;
    width: 100%;
}

section .user_offer_box_content_button_div{
    display: flex;
    flex-direction: row;
    column-gap: 1.5rem;
    justify-content:center;
    align-items:center;
    width: 100%;
}

section .user_offer_box_content a p{
    font-size: 16px;
    font-weight: 400;
    color: #A89887;
}

section .user_offer_box_content_price{
    font-size: 18px;
    font-weight: bold;
    color: #A89887;
}

section .user_offer_box_content_button{
    background-color: transparent;
    border: 1px solid #A89887;
    color: #000;
    cursor: pointer;
    font-size: 15px;
    font-weight: 400;
    overflow: hidden;
    padding: 1rem 1rem;
    text-align: center;
    transition: all 0.4s ease-in-out;
    vertical-align: middle;
    outline: none;
    text-transform: capitalize;
    border-radius: 5px;
    margin-top: 0.5rem;
    width: 80%;
    height: 100%;
    transition: all 0.5s ease-in-out;
}

section .user_offer_box_content_button:hover{
    background-color: #A89887;
    border: 1px solid #A89887;
    color: #fff;
    border-radius: 10px;
}

section p{
    font-size:16px;
    font-weight:normal;
    color: #A89887;
    text-align: center;
    height: 50px!important;
}
.modal-box{
    visibility:hidden;
    display: flex;
    position: fixed; 
    z-index: 1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 0%; 
    height: 0%; 
    overflow: auto; 
    background-color: rgba(0,0,0,0.8);
    justify-content:center;
    align-items:center;
    transition: all 0.5s ease-in-out;
    opacity: 0;
}

.close-modal-box{
    position: absolute;
    right: 0;
    top: 0;
    color: #A89887;
    font-size:32px;
    padding:8px 16px;
    cursor: pointer;
}

.delete-box-wrapper{
    display: none;
    flex-direction: column;
    row-gap: 2rem;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    padding: 6rem;
}

.change-price-box-wrapper{
    display: none;
    flex-direction: column;
    row-gap: 2rem;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    padding: 6rem;
}

.delete-text{
    font-size: 24px;
    font-weight: bold;
    color: #fff;
}
.delete-title{
    font-size: 18px;
    font-weight: normal;
    color: #fff;
}

.delete-popup{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

 .button-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
    gap: 4rem;
    width: 50%;
}

.input-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
    gap: 4rem;
    width: 50%;
}

.confirm-delete{
    padding: 1.5rem;
    margin: 1rem 0;
    border-radius: 10px;
    border: 1px solid #F5E9DC;
    /* border-radius: 10px; */
    background-color: transparent;
    color: #A88E87;
    outline: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    width: 50%;
}

.cancel-delete{
    padding: 1.5rem;
    margin: 1rem 0;
    border-radius: 10px;
    border: 1px solid #A88E87;
    /* border-radius: 10px; */
    background-color: #F5E9DC;
    color: #fff;
    outline: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    width: 50%;
}

.confirm-delete:hover
{
    transform: scale(1.1);
}

.cancel-delete:hover{
    transform: scale(1.1);
}

.confirm-change-price{
    padding: 1.5rem;
    margin: 1rem 0;
    border-radius: 10px;
    border: 1px solid #F5E9DC;
    /* border-radius: 10px; */
    background-color: transparent;
    color: #A88E87;
    outline: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    width: 50%;
}

.cancel-change-price{
    padding: 1.5rem;
    margin: 1rem 0;
    border-radius: 10px;
    border: 1px solid #A88E87;
    /* border-radius: 10px; */
    background-color: #F5E9DC;
    color: #fff;
    outline: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    width: 50%;
}

.confirm-change-price:hover
{
    transform: scale(1.1);
}

.cancel-change-price:hover{
    transform: scale(1.1);
}

.offer-image{
    display: none;
    max-width:512px;
    width:92%;
    margin: 0 auto;
}
/* .close-modal-box{
    position: absolute;
    right: 0;
    top: 0;
    color: #A89887;
    font-size:32px;
    padding:8px 16px;
    cursor: pointer;
}
.delete-popup{
    display:none;
    position: absolute;
    top: 50%;
    left: 50%;
    background:red;
    width: 200px;
    height: 200px;
} */

button {
    color: #A88E87;
}

.user_offer_image_button{
    background-color: #F5E9DC;
    border: 1px solid #A89887;
    color: #000;
    cursor: pointer;
    font-size: 12px;
    font-weight: 400;
    overflow: hidden;
    text-align: center;
    vertical-align: middle;
    outline: none;
    text-transform: capitalize;
    border-radius: 5px;
    width: 20%;
    transition: all 0.5s ease-in-out;
    padding: 0.5rem 1rem
}
.user_offer_image_button:hover{
    background-color: transparent;
    border: 1px solid #A89887;
    transform: scale(1.1);
}
.price_input{
    width: 80% !important;
}

@media only screen and (max-width:1000px) {
    section{
    grid-template-columns: 1fr 1fr 1fr;
    }
}

@media only screen and (max-width:750px) {
    section{
    grid-template-columns: 1fr 1fr;
    }
    .modal-box > div{
        padding: 0;
    }

    .input-wrapper{
        width: 80%;
    }

    .button-wrapper{
        width: 80%;
    }
}

@media only screen and (max-width:500px) {
    section{
    grid-template-columns: 1fr;
    padding: 6rem 3rem;
}
.delete-text {
    font-size: 22px;
    font-weight: bold;
    color: #fff;
}

.delete-title {
    font-size: 16px;
    font-weight: bold;
    color: #fff;
}
}
    </style>
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
                    <a id="messages-button"></a>
                    <a id="log_out"></a>
                </div>
        </div>
    </nav>
    <section></section>
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
    <div class="modal-box">
            <span class="close-modal-box">X</span>
            <img src="" class="offer-image">
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