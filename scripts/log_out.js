//Wylogowanie
function log_out (){
    $.ajax({
        url:'/górka_Allegro/ksiazki-gorka/php_scripts/log_out.php',
        success: function(response){
            window.location.reload();
        }
    })
}
$('#log_out').on('click',log_out);
//-------------------------------------------------------------------