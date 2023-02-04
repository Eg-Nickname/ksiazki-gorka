function get_active_offers() {
    $.ajax({
        url: '../php_scripts/user_panel/get_own_offers.php',
        type: 'POST',
        dataType: 'json',
        success: function(response){
            if(response[0]){
                alert(response[1]);
            }
            else{
                const offers=response[2];
                for(const offer of offers){
                    // console.log(offer);
                    const div=document.createElement('div');
                    div.classList.add("user_offer_box");
                    div.id=`oferta${offer.offer_id}`;
                    const img_box=document.createElement('div');
                    img_box.style.backgroundImage=`url(../${offer.photo1})`;
                    img_box.classList.add("user_offer_box_image");
                    img_box.addEventListener("click",show_image_popup);
                    const div_content=document.createElement('div');
                    div_content.classList.add("user_offer_box_content");
                    const price=document.createElement('p');
                    const img_btn=document.createElement('button');
                    img_btn.innerHTML="Tył";
                    img_btn.classList.add("user_offer_image_button");
                    const image_photos={
                        front: offer.photo1,
                        back:offer.photo2
                    }
                    $(img_btn).on("click",function(){
                        change_offer_image(img_btn,image_photos);
                    });
                    const name=document.createElement('p');
                    name.innerHTML=offer.book_name;
                    price.classList.add("user_offer_box_content_price");
                    price.innerHTML=`${offer.price} PLN`;
                    const button=document.createElement('button');
                    button.classList.add("user_offer_box_content_button");
                    button.innerHTML = "Usuń";
                    $(button).on('click', function(){
                        delete_offer(offer)
                    });
                    const pricebutton=document.createElement('button');
                    pricebutton.classList.add("user_offer_box_content_button");
                    pricebutton.innerHTML = "Zmień Cenę";
                    $(pricebutton).on('click', function(){
                        change_price(offer)
                    }); 
                    const buttonDiv = document.createElement('div');
                    buttonDiv.classList.add("user_offer_box_content_button_div");
                    buttonDiv.append(pricebutton, button);
                    div_content.append(img_btn,name,price);
                    div.append(img_box,div_content,buttonDiv);
                    document.querySelector('section').appendChild(div);
                }
            }
        }
    })
}
get_active_offers();
function delete_offer(offer){
    $('.modal-box').css('visibility','visible');
    $('.modal-box').css('opacity','1');
    $('.modal-box').css('width','100%');
    $('.modal-box').css('height','101%');
    $('.offer-image').css('display','none');
    $('.change-price-box-wrapper').css('display','none');
    console.log(offer);
    console.log($('.confirm-delete'));
    const popupwrap = document.querySelector('.delete-box-wrapper');
    const popup=document.querySelector('.delete-popup');
    popupwrap.style.display = 'flex';
    popup.classList.add('delete-popup');
    document.querySelector('.delete-text').innerHTML="Potwierdź usunięcie oferty";
    document.querySelector('.delete-title').innerHTML=offer.book_name;
    $('.confirm-delete').on('click',function(){
        setTimeout(()=>{
            confirm_delete(offer.offer_id);
            popupwrap.style.display = 'none';
            hide_image_popup();
        },300)
        $('.confirm-delete').off('click');
        $('.cancel-delete').off('click');
        // hide_image_popup();
    });
    $('.cancel-delete').on('click',function(){
        $('.confirm-delete').off('click');
        $('.cancel-delete').off('click');
        hide_image_popup();
        popupwrap.style.display = 'none';
    });
}
function confirm_delete(offer_id){
    $.ajax({
        url: '../php_scripts/user_panel/delete_offer.php',
        type: 'POST',
        dataType: 'json',
        data:{
            offer:offer_id
        },
        success:function(response){
            if(response){
                document.getElementById(`oferta${offer_id}`).remove();
            }
        }
    })
}

function change_price(offer){
    const pricewrap= document.querySelector('.change-price-box-wrapper');
    const popup=document.querySelector('.change-price-box-wrapper .delete-popup');
    const inputwrap=document.querySelector('.change-price-box-wrapper .input-wrapper');
    pricewrap.style.display = 'flex';
    popup.classList.add('delete-popup');
    document.querySelector('.change-price-box-wrapper .delete-text').innerHTML="Zmień cenę";
    $('.change-price-box-wrapper').css('display','flex');
    $('.modal-box').css('visibility','visible');
    $('.modal-box').css('opacity','1');
    $('.modal-box').css('width','100%');
    $('.modal-box').css('height','101%');
    $('.confirm-change-price').on('click',function(){
        setTimeout(()=>{
            // confirm_delete(offer.offer_id);
            pricewrap.style.display = 'none';
            hide_price_popup();
        },300)
        $('.confirm-change-price').off('click');
        $('.cancel-change-price').off('click');
        // hide_image_popup();
    });
    $('.cancel-change-price').on('click',function(){
        $('.confirm-change-price').off('click');
        $('.cancel-change-price').off('click');
        pricewrap.style.display = 'none';
        hide_price_popup();
    });
    
}

function change_offer_image(img_btn,image_photos){
    const offer_div=img_btn.parentNode.parentNode;
    const img_div=offer_div.querySelector('.user_offer_box_image');
    const image=get_current_image(img_div);
    console.log(image);
    if(image==image_photos.front){
        $(img_div).css('background-image',`url(../${image_photos.back})`);
        img_btn.innerHTML="Przód";
    }
    else{
        console.log('tu');
        img_btn.innerHTML="Tył";
        $(img_div).css('background-image',`url(../${image_photos.front})`);
    }
};
function get_current_image(element){
    let image_bg=$(element).css('background-image');
    image_bg=image_bg.split("/");
    const src=image_bg[image_bg.length-2]+'/'+(image_bg[image_bg.length-1]).slice(0,-2);
    return src
}
function show_image_popup(){
    $('.offer-image').css('display','block');
    const src=get_current_image(this);
    document.querySelector('.offer-image').src=`../${src}`;
    $('.modal-box').css('visibility','visible');
    $('.modal-box').css('opacity','1');
    $('.modal-box').css('width','100%');
    $('.modal-box').css('height','101%');
    $('.change-price-box-wrapper').css('display','none');
}

function hide_image_popup(){
    $('.modal-box').css('visibility','hidden');
    $('.modal-box').css('opacity','0');
    $('.modal-box').css('width','0%');
    $('.modal-box').css('height','0%');
    const popupwrap = document.querySelector('.delete-box-wrapper');
    popupwrap.style.display = 'none';
    $('.offer-image').css('display','none');
}

function hide_price_popup(){
    $('.modal-box').css('visibility','hidden');
    $('.modal-box').css('opacity','0');
    $('.modal-box').css('width','0%');
    $('.modal-box').css('height','0%');
    const popupwrap = document.querySelector('.change-price-box-wrapper');
    popupwrap.style.display = 'none';
}
document.querySelector('.close-modal-box').addEventListener('click',hide_image_popup);

