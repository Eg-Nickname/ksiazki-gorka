function get_chatters(type="all"){
    $.ajax({
        url: '../php_scripts/user_panel/get_purchases.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            type
        },
        success: function(response){
            console.log(response.length);
            if(response.length==0){
                const p=document.createElement('p');
                p.style.fontSize='32px';
                p.style.color='black';
                p.innerHTML="Nie pisałeś z nikim";
                p.style.textAlign='center';
                document.querySelector('.customer_box').append(p);
            }else{
                build_chatbox(response);
            }
        }
    })
}
