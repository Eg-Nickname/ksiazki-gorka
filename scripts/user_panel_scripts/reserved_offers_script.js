function get_reserved_offers(){
    $.ajax({
        url: '../php_scripts/user_panel/get_reserved_offers.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag: true
        },
        success: function(response){
            console.log(response.length);
            if(response.length==0){
                const p=document.createElement('p');
                p.style.fontSize='32px';
                p.style.color='black';
                p.innerHTML="Brak aktualnych wiadomości";
                p.style.textAlign='center';
                document.querySelector('.customer_box').append(p);
            }else{
                build_chatbox(response);
            }
        }
    })
}
function build_chatbox(response){
    document.querySelector('.customer_box').innerHTML="";
    for(const offer of response){
        console.log(offer)
        if(!document.getElementById(`customer${offer['customer']}`)){
            const custom_div=document.createElement('div');
            custom_div.id=`customer${offer['customer']}`;
            custom_div.classList.add('offer_info_wrapper');
            document.querySelector('.customer_box').append(custom_div);
            const offer_info=document.createElement('div');
            offer_info.classList.add('offer_info');
            const buyer=document.createElement('p');
            buyer.classList.add('buyer_name');
            const a=document.createElement('a');
            a.href=`../oferty-uzytkownika?seller=${offer.customer}`;
            a.innerHTML=` ${offer.name} ${offer.surname}`;
            buyer.innerHTML =`Kupujący:`;
            buyer.append(a);
            const chat_p=document.createElement('p');
            chat_p.classList.add('lovely_p');
            const img=document.createElement('img');
            img.src='../images/envelope.svg';
            img.alt='envelope';
            img.classList.add('offer_info_chatbtn');
            chat_p.append(img,'Otwórz czat');
            chat_p.addEventListener('click', function(){
                change_message_box(offer.customer,offer.name,offer.surname);
            })
            offer_info.append(buyer,chat_p);
            custom_div.append(offer_info);
            const sum=document.createElement('div');
            sum.classList.add('offer_info_sum');
            const string_p=document.createElement('p');
            string_p.classList.add('offer_sum');
            string_p.innerHTML='Suma:';
            const sum_price=document.createElement('p');
            sum_price.classList.add('offer_price_sum');
            sum_price.innerHTML='0 PLN';
            sum.append(string_p,sum_price);
            custom_div.append(sum);
        }
        const div=document.createElement('div');
        div.classList.add('offer_info_book_price');
        const button_box=document.createElement('div');
        const delete_btn=document.createElement('button');
        delete_btn.innerHTML="Anuluj";
        delete_btn.classList.add('operation_btn');
        delete_btn.addEventListener('click',function(){
            delete_from_cart(offer.offer_id,this)
        })
        const sold_btn=document.createElement('button');
        sold_btn.innerHTML="Sprzedana";
        sold_btn.classList.add('operation_btn');
        sold_btn.addEventListener('click',function(){
            sold(offer.offer_id,this);
        })
        button_box.append(delete_btn, sold_btn);
        const offer_book=document.createElement('p');
        offer_book.classList.add('offer_book');
        offer_book.innerHTML=offer.book_name;
        const offer_price=document.createElement('p');
        offer_price.classList.add('offer_price');
        offer_price.innerHTML=`${offer.price} PLN`;
        div.append(button_box,offer_book,offer_price);
        const par=document.getElementById(`customer${offer['customer']}`);
        const sum_div=par.querySelector(`.offer_info_sum`);
        sum_div.before(div);
        const new_cost=cost(par);
        sum_div.querySelector('.offer_price_sum').innerHTML=`${new_cost} PLN`;
    }
}
get_reserved_offers();
function cost(parent){
    console.log(parent)
    const price_paragraphs=Array.from(parent.querySelectorAll('.offer_price'));
    let cost=0;
    price_paragraphs.forEach(str_price=>{
        const value=str_price.innerHTML;
        const price=Number(value.replace(" PLN",""));
        cost+=price;
    })
    return cost
}
function change_message_box(chatter,name,surname){
    document.querySelector('.chat_user_box_name').innerHTML=`${name} ${surname}`;
    const msg_input=document.getElementById('message_input');
    msg_input.disabled=false;
    console.log(chatter);
}
function delete_from_cart(offer,btn){
    $.ajax({
        url:"../php_scripts/user_panel/change_offer_status.php",
        method:"POST",
        dataType:"json",
        data:{
            offer,
            status:"available"
        },
        success: function(response){
            if(response){
                after_changing_status(btn);
            }
        }
    })
}
function sold(offer,btn){
    $.ajax({
        url:"../php_scripts/user_panel/change_offer_status.php",
        method:"POST",
        dataType:"json",
        data:{
            offer,
            status:"sold"
        },
        success: function(response){
            if(response){
                after_changing_status(btn);
            }
        }
    })
}
function after_changing_status(btn){
    const book_div=btn.parentNode.parentNode;
    const parent_to_cost=book_div.parentNode;
    book_div.remove();
    check_if_offer_info_not_empty(parent_to_cost);
}
function check_if_offer_info_not_empty(element){
    if(element.childNodes.length<=2){
        element.remove();
        if(!document.querySelector('.customer_box').childNodes.length){
            const p=document.createElement('p');
            p.innerHTML="Brak aktualnych wiadomości";
            p.style.fontSize='32px';
            p.style.color='black';
            p.style.textAlign='center';
            document.querySelector('.customer_box').append(p);
        }
    }
    else{
        const new_cost=cost(element);
        element.querySelector('.offer_price_sum').innerHTML=`${new_cost} PLN`;
    }
}