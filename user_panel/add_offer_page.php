<?php
// session_start();
// if(!isset($_SESSION['logged_in'])){
//     header('Location:../strona-logowania');
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj ofertę</title>
    <script defer src="../scripts/jquery-3.6.1.min.js"></script>
    <script defer src="../scripts/user_panel_scripts/add_offer_page_script.js"></script>
    <style>
    .search-container {
    padding-top: 4rem;
    width: 95%;
    position: relative;
}
.search-input {
    width: 100%;
    padding: 1.2rem 2.4rem;
    background-color: #fff;
    font-size: 14px;
    line-height: 18px;
    color: #A89887;
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='29' height='29' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-size: 3rem 3rem;
    background-position: 95% center;
    border: 1px solid #A89887;
    transition: all 250ms ease-in-out;
    backface-visibility: hidden;
    transform-style: preserve-3d;
    /* text-transform:capitalize; */
}

.search-input::placeholder {
    color: #A89887;
    font-size: 14px;
    font-weight: normal;
}
.search-input:focus {
    outline: none
}
.suggestions-list{
    position: absolute;
    background:white;
    border: 1px solid #A89887;
    max-height:200px;
    width:100%;
    display: none;
}
.suggestions-list.active_suggestion{
    display:block;
}
.suggestion{
    display: flex;
    align-items: center;
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
    transition: all 250ms ease-in-out;
}
.suggestion:hover{
    background-color: #A88E87;
}
    </style>
</head>
<body>
    <form onsubmit="return false" enctype="multipart/form" id="offer_form">
    <div class="search-container">
        <input class="search-input" type="text" placeholder="Wybierz podręcznik">
        <input id="book_id" type="hidden">
        <div class="suggestions-list" id="suggestions_list"></div>
    </div>
    <!-- DAJ TU GDZIEŚ INFO ŻE ZDJĘCIE MUSI BYĆ JPG,PNG,JPEG -->
    <label for="price">Cena</label><input type="number" name="price" id="price">
    <label for="front_photo"></label><input type="file" name="front_photo" id="front_photo">
    <label for="back_photo"></label><input type="file" name="" id="back_photo">
    <p id="chosen">Wybierz podręcznik</p>
    <button id="submit">Wystaw ofertę</button>
    </form>
</body>
</html>