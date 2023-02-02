<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje oferty</title>
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/get_own_offers.js"></script>
    <style>
        
section{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 2rem;
    padding: 6rem 0;
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
    padding: 1rem 3rem;
    text-align: center;
    transition: all 0.4s ease-in-out;
    vertical-align: middle;
    outline: none;
    text-transform: capitalize;
    border-radius: 5px;
    margin-top: 0.5rem;
    width: 80%;
    transition: all 0.5s ease-in-out;
}

section .user_offer_box_content_button:hover{
    background-color: #A89887;
    border: 1px solid #A89887;
    color: #fff;
    border-radius: 10px;
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
.offer-image{
    max-width:512px;
    width:92%;
    margin: 0 auto;
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
.delete-popup{
    display:none;
    position: absolute;
    top: 50%;
    left: 50%;
    background:red;
    width: 200px;
    height: 200px;
}
    </style>
</head>
<body>
    <section></section>
    <div class="modal-box">
        <span class="close-modal-box">X</span>
        <img src="" class="offer-image">
        </div> <!--- popup -->
        <div class="popup-order-box">
            <p class="popup-order-box-alert"></p>   
        </div>
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
</body>
</html>