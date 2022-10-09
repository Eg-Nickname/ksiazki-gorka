//Sprawdzanie czy użytkownik jest zalogowany, zwraca true, false
const check_if_user_is_logged_in = function () {
    let is_logged_in=false;
    $.ajax({
        url: 'php_scripts/is_logged_in.php',
        type: 'POST',
        dataType: 'JSON',
        async:false,
        success: function (response){
            console.log(response);
            is_logged_in=response;
        },
    });
    return is_logged_in;
}
$('#click').on('click',function(){
    let a=check_if_user_is_logged_in();
    if(a==true){
        $('body').css('background','red')
    }else
    {
        $('body').css('background','black')
    }
})
//-----------------------------------------------------------------------
//Logowanie
const login_function = function(){
    console.log(4);
    $.ajax({
        url: 'php_scripts/login_script.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            email: $('#email').val(),
            password: $('#password').val()
        },
        success: function(response){
            console.log(response);
            if(response[2]==true)
            window.location='index.html';
        }
    })
}
$('#log_in').on('click',login_function);
//------------------------------
//Wylogowanie
const log_out = function (){
    $.ajax({
        url:'php_scripts/log_out.php',
        success: function(response){
            console.log(response);
        }
    })
}
$('#log_out').on('click',log_out);
//-------------------------------------------------------------------
//Rejestracja
const register_function = function (){
    $.ajax({
        url: 'php_scripts/register.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            register_email: $('#register_email').val(),
            register_password: $('#register_password').val(),
            check_password: $('#check_password').val(),
            name: $('#name').val(),
            surname: $('#surname').val(),
            username: $('#username').val()
        },
        success: function(response){

        }
    })
}
$('#register').on('click',register_function);
//Dodanie wszystkich książek do localstorage
const get_data_for_mainpage= function (){
    localStorage.removeItem("books");
    $.ajax({
        url: 'php_scripts/get_data.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag:true
        },
        success: function(response){
            let local_storage_data={
                matematyka:[],
                historia:[]
            };
            if(response[0]==false)
            {
                const books=response[2];
                for(const element of books)
                {
                    const category=element.category;
                    local_storage_data[category].push(element);
                }
                local_storage_data=JSON.stringify(local_storage_data);
                localStorage.setItem("books",local_storage_data);
            }
        }
    })
}
get_data_for_mainpage();
//Zmiana wyświetlanych elementów na stronie głównej
const display_elements_on_mainpage = function(){
    const wrapper=document.querySelector('.books-wrapper')
    let category='matematyka';
    if(wrapper.childElementCount!=0)
    {
        category=(this.innerHTML).toLowerCase();
    }
    const books=JSON.parse(localStorage.getItem('books'));
    const books_to_display=books[category];
    let item_id=1;
    wrapper.textContent='';
    if(books_to_display)
    {
        for(const element of books_to_display){
            const div=document.createElement('div');
            $(div).addClass(`item${item_id} subject`);
            const img_div=document.createElement('div');
            $(img_div).addClass(`book-img`);
            console.log(`"../${element['picture']}"`);
            $(img_div).css(`background-image`,`url("${element['picture']}")`);
            const book_name=document.createElement('p');
            $(book_name).addClass(`book-name`);
            $(book_name).html(`${element['book_name']}`);
            const book_price=document.createElement('p');
            $(book_price).addClass(`book-price`);
            $(book_price).html(`Zaczyna się od 30 PLN`); //dodać najniższą cenę to bazy
            const button=document.createElement('button');
            $(button).addClass(`item${item_id}-btn`);
            $(button).html('Sprawdź ofertę');
            div.append(img_div,book_name,book_price,button);
            $('.books-wrapper').append(div);
            item_id++;
        }
    }
}

$('.buttons-wrapper button').on('click',display_elements_on_mainpage);
$(document).ready(function() {
    display_elements_on_mainpage();
})
//-------------------------------------------------------------------
//To chyba trzeba będzie w php i z htacces zrobić
// let current_location = window.location.href;
// current_location=current_location.split('/');
// current_location=current_location[current_location.length-1];
// console.log(current_location);
// switch(current_location){
//     case 'login_page.html':
//         {
//             let is_logged_in=check_if_user_is_logged_in;
//             if(is_logged_in){
//                 window.location.replace('index.html');
//             }
//             break;
//         }
// }