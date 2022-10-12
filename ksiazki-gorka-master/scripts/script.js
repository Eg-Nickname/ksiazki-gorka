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
            console.log(response);
            
        }
    })
}
$('#register').on('click',register_function);
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