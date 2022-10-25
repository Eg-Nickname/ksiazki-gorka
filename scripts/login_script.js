// document.addEventListener("DOMContentLoaded", () => {
//     const loginForm = document.querySelector(".sign-in-form");
//     const createAccountForm = document.querySelector(".register-in-form");
//     const box3 = document.querySelector(".box-3");
//     const h2signin = document.querySelector(".sign-in-text");
//     const h2signup = document.querySelector(".sign-up-text");
//     const psignin = document.querySelector(".sign-in-goto-span");
//     const psignup = document.querySelector(".sign-up-goto-span");
//     formlogin = document.querySelector(".form-container");
//     console.log(loginForm);
//     console.log(createAccountForm);

//     document.querySelector("#linkLogin").addEventListener("click", e => {
//         e.preventDefault();
//         loginForm.classList.remove("form--hidden");
//         createAccountForm.classList.add("form--hidden");
//         box3.classList.add("form--hidden");
//         h2signin.classList.remove("form--hidden");
//         h2signup.classList.add("form--hidden");
//         psignin.classList.add("form--hidden");
//         psignup.classList.remove("form--hidden");
//         formlogin.classList.add("form-login-container");
//     });

//     document.querySelector("#linkCreateAccount").addEventListener("click", e => {
//         e.preventDefault();
//         loginForm.classList.add("form--hidden");
//         createAccountForm.classList.remove("form--hidden");
//         box3.classList.remove("form--hidden");
//         h2signin.classList.add("form--hidden");
//         h2signup.classList.remove("form--hidden");
//         psignin.classList.remove("form--hidden");
//         psignup.classList.add("form--hidden");
//         formlogin.classList.remove("form-login-container");

//     });

// });
const change_login_content = function(){
    const register_form=document.querySelectorAll('.register-in-form');
    const register_span=document.querySelector('.sign-in-goto-span');
    const register_header=document.querySelector('.sign-up-text');
    const sign_in_form=document.querySelector('.sign-in-form');
    const sign_in_header=document.querySelector('.sign-in-text');
    const sign_in_span=document.querySelector('.sign-up-goto-span');
    $('#linkLogin').on('click',function(){
        $(register_form).addClass('form--hidden');
        $(register_span).addClass('form--hidden');
        $(register_header).addClass('form--hidden');
        $(sign_in_form).removeClass('form--hidden');
        $(sign_in_header).removeClass('form--hidden');
        $(sign_in_span).removeClass('form--hidden');
    });
    $('#linkCreateAccount').on('click',function(){
        $(register_form).removeClass('form--hidden');
        $(register_span).removeClass('form--hidden');
        $(register_header).removeClass('form--hidden');
        $(sign_in_form).addClass('form--hidden');
        $(sign_in_header).addClass('form--hidden');
        $(sign_in_span).addClass('form--hidden');
    });
}
//logowanie
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
            window.location='strona-glowna';
        }
    })
}
$('#log_in').on('click',login_function);
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
change_login_content();