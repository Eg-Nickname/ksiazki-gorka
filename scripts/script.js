//Sprawdzanie czy użytkownik jest zalogowany, zwraca true, false, w sumie może się jednak przydać
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
//Dodanie wszystkich książek do localstorage
const get_data_for_mainpage = function (){
    localStorage.removeItem("books");
    $.ajax({
        url: 'php_scripts/get_data.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag:true
        },
        success: function(response){
            if(response[0]==false)
            {
                console.log("dopd");
                let local_storage_data={
                    matematyka:[],
                    historia:[]
                };
                const books=response[2];
                for(const element of books)
                {
                    const category=element.category;
                    local_storage_data[category].push(element);
                }
                local_storage_data=JSON.stringify(local_storage_data);
                localStorage.setItem("books",local_storage_data);
            }
            display_elements_on_mainpage();
        }
    })
}
get_data_for_mainpage();
//Zmiana wyświetlanych elementów na stronie głównej
const display_elements_on_mainpage = function(){
    console.log(this);
    const wrapper=document.querySelector('.books-wrapper')
    let category='matematyka';
    if(this){
        if(typeof(this.innerHTML)!='undefined')
        {
            category=(this.innerHTML).toLowerCase();
        }
    }
    const books=JSON.parse(localStorage.getItem('books'));
    const books_to_display=books[category];
    wrapper.textContent='';
    if(books_to_display)
    {
        for(const element of books_to_display){
            const div=document.createElement('div');
            $(div).addClass(`subject`);
            div.setAttribute('id',`book_offer${element['book_ID']}`);
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
            $(button).addClass(`book-btn`);
            button.setAttribute('id',`book-btn${element['book_ID']}`);
            $(button).html('Sprawdź ofertę');
            div.append(img_div,book_name,book_price,button);
            $('.books-wrapper').append(div);
        }
    }
    else return false;
}
$('.buttons-wrapper button').on('click',display_elements_on_mainpage);
/////////////////////////////////////
// $( document ).ajaxComplete(function() {
//     display_elements_on_mainpage();
//   });
// Pobieranie danych do wyświetlenia podstrony
const get_sample_book_data = function (){
    const btn_id=(this.getAttribute('id')).slice(-1);
    const book_id=($(this).parents().attr('id')).slice(-1); //Muszę to poprawić, bo 
    const offer_location=`oferta${book_id}`;
    window.location.href=offer_location;
}
$("body").on("click", ".book-btn",get_sample_book_data);
///////////////////////////////////////
// $(document).ready(function() {
    
// })

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