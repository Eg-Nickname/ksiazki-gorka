function get_reserved_offers(){
    $.ajax({
        url: '../php_scripts/user_panel/get_reserved_offers.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag: true
        },
        success: function(response){
            for(const offer of response){
                console.log(offer)
                if(!document.getElementById(`customer${offer['customer']}`)){
                    const custom_div=document.createElement('div');
                    custom_div.classList.add('customer_box');
                    custom_div.id=`customer${offer['customer']}`;
                    document.querySelector('.container').append(custom_div);
                }
                const div=document.createElement('div');
                div.innerHTML=`${offer['book_name']} ${offer['price']}PLN`;
                document.getElementById(`customer${offer['customer']}`).append(div);
            }
        }
    })
}
get_reserved_offers();