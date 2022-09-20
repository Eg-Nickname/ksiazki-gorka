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
        }
    });
    return is_logged_in;
}
document.addEventListener('click',function(){
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
    $.ajax({
        url: 'php_scripts/login_script.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            email: $('#email').val(),
            password: $('#password').val()
        },
        success: function(response){

        }
    })
}
//-------------------------------------------------------------------
//Rejestracja
const register_function = function (){
    $.ajax({
        url: 'php_scripts/register_script.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            
        },
        success: function(response){

        }
    })
}
