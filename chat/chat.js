let current_chatter  = 0;
let last_message_send = "2069-03-31 00:21:37";//#wiedział
let type="all";
let refresh_chatter=setInterval(get_chatters,60000)
let refresh_messages;
function get_chatters(){
    console.log("reset")
    clearInterval(refresh_chatter);
    refresh_chatter=setInterval(get_chatters,60000)
    document.querySelector('.customer_box').textContent="";
    $.ajax({
        url: '../chat/get_chatters.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            type
        },
        success: function(response){
            if(response.length==0){
                empty_customer_box()
            }else{
                response.forEach(element => {
                    build_customer_box(element,type);
                });
            }
        }
    })
}
get_chatters()
function build_customer_box(data,type){
    
    const offer_div=build_offer_info_div(data)

    if(offer_div){
        document.querySelector('.customer_box').append(offer_div);
    }
    if(type!="all"){
        add_offers_to_wrapper(data,type);
    }
}
function build_offer_info_div({chatter,chatter_name}){
    if(!document.getElementById(`chatter${chatter}`)){
        const div_wrapper=document.createElement('div')
        div_wrapper.id=`chatter${chatter}`;
        div_wrapper.classList.add('offer_info_wrapper')
        const div = document.createElement('div')
        div.classList.add('offer_info')
        const p = document.createElement('p')
        p.classList.add("buyer_name")
        const a=document.createElement('a');
        const chatter_name_array=chatter_name.split(" ");
        a.href=`../oferty-uzytkownika?seller=${chatter}&name=${chatter_name_array[0]}-${chatter_name_array[1]}`;
        a.innerHTML=` ${chatter_name_array[0]} ${chatter_name_array[1]}`;
        p.append(a)
        const chat_p=document.createElement('p')
        chat_p.classList.add("lovely_p")
        const img=document.createElement('img')
        img.src="../images/envelope.svg"
        img.alt="envelope"
        img.classList.add("offer_info_chatbtn");
        chat_p.append(img,"Otwórz czat")
        chat_p.addEventListener('click',function(){
            change_message_box(chatter,chatter_name_array[0],chatter_name_array[1])
        })
        div.append(p,chat_p)
        div_wrapper.append(div)
        return div_wrapper
    }
    else{
        return false
    }
}
function change_message_box(chatter,name,surname){
    document.querySelector('.chat_box').scrollIntoView();
    if(current_chatter!=chatter){
        document.querySelector('.chat_user_box_name').innerHTML=`${name} ${surname}`;
        const msg_input=document.getElementById('message_input');
        msg_input.disabled=false;
        document.getElementById("message_send").disabled=false;
        console.log(chatter);
        current_chatter=chatter;
        get_all_messages(chatter);
    }
}
function add_offers_to_wrapper(data,type)
{
    // console.log(data)
    const offer_book_div=build_offer_book_div(data,type)
    const wrapper=document.getElementById(`chatter${data.chatter}`)
    wrapper.querySelector('.offer_info').after(offer_book_div)
    if(!wrapper.querySelector('.offer_info_sum')){
        console.log('nedd')
        const sum_div=build_sum_div();
        wrapper.append(sum_div)
    }
    update_cost(wrapper)
    // console.log(chatter,book_name,price,offer_id)
}
function add_sold_btn(element){
    console.log(element)
}
function update_cost(wrapper){
    const total_cost=cost(wrapper);
    const price_p=wrapper.querySelector('.offer_info_sum .offer_price_sum')
    price_p.innerHTML=`${total_cost} PLN`
}
function build_sum_div(){
    const sum_div=document.createElement('div')
    sum_div.classList.add('offer_info_sum')
    const p=document.createElement('p')
    p.classList.add('offer_sum')
    p.innerHTML="Suma:"
    const sum_price=document.createElement('p')
    sum_price.classList.add("offer_price_sum");
    sum_price.innerHTML="0 PLN"
    sum_div.append(p,sum_price)
    return sum_div
}
function build_offer_book_div({chatter,book_name,price,offer_id},type){
    console.log(type)
    const div=document.createElement('div');
    div.classList.add('offer_info_book_price');
    const offer_book=document.createElement('p');
    offer_book.classList.add('offer_book');
    offer_book.innerHTML=book_name;
    const offer_price=document.createElement('p');
    offer_price.classList.add('offer_price');
    offer_price.innerHTML=`${price} PLN`;
    const button_box=build_button_box(type,offer_id)
    div.append(button_box,offer_book,offer_price);
    return div
    // const par=document.getElementById(`seller${offer['seller']}`);
    // const sum_div=par.querySelector(`.offer_info_sum`);
    // sum_div.before(div);
    // const new_cost=cost(par);
    // sum_div.querySelector('.offer_price_sum').innerHTML=`${new_cost} PLN`;
}
function build_button_box(type,offer_id){
    const button_box=document.createElement('div');
    const delete_btn=document.createElement('button');
    delete_btn.classList.add('operation_btn')
    delete_btn.innerHTML="Anuluj"
    delete_btn.addEventListener('click',function(){
        delete_from_cart(offer_id,this)
    })
    button_box.append(delete_btn)
    if(type=="sell"){
        const sold_btn=document.createElement("button")
        sold_btn.classList.add("operation_btn")
        sold_btn.innerHTML="Sprzedana"
        sold_btn.addEventListener("click",function(){
            sold(offer_id,this)
        })
        button_box.append(sold_btn)
    }
    return button_box

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
            empty_customer_box()
        }
    }
    else{
        const new_cost=cost(element);
        element.querySelector('.offer_price_sum').innerHTML=`${new_cost} PLN`;
    }
}
function empty_customer_box(){
    const p=document.createElement('p');
    p.innerHTML="Brak aktualnych wiadomości";
    p.style.fontSize='32px';
    p.style.color='black';
    p.style.textAlign='center';
    document.querySelector('.customer_box').append(p);
}
document.querySelectorAll('.change_customer_box').forEach((el)=>{
    el.addEventListener("click",function(){
        if(type!=String(el.id)){
            type=String(el.id);
            get_chatters()
        }
    })
})
// wiadomości z użytkownikiem

function get_all_messages(chatter){
    current_chatter = chatter;
    $.ajax({
        url: '../chat/get_messages.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag: true,
            chatter: current_chatter
        },
        success: function(response){
            console.log(response);
            console.log(response.length);
            if(response.length==0){
                // Error braku wiadomości z wybrana osobą
            }else{
                // Wyświetl wiadomości jeśli istnieja
                document.querySelector('.chat_messages').innerHTML="";
                display_messages(response);
                clearInterval(refresh_messages)
                refresh_messages=setInterval(get_new_messages,60000);
            }
        }
    })
}


function display_messages(messages){
    for(const message of messages){
        const message_div = document.createElement('div');
        if(message["sender_id"] == current_chatter){
            message_div.classList.add('recived-message');
        }else{
            message_div.classList.add('sent-message');
        }
        message_div.innerHTML = message["message"];
        document.querySelector(".chat_messages").append(message_div);
    }
    last_message_send = messages[messages.length-1]["send_time"]
}

function send_message(){
    let message_to_send = document.querySelector("#message_input").value
    if(message_to_send.length == 0 || current_chatter===0)
    {
        // console.log("Nie wysyłaj pustej wiadomości")
        // Dodać komunikat o wysłaniu pustej wiadomości
        return;
    }
    else{
        $.ajax({
            url: '../chat/send_message.php',
            type: 'POST',
            dataType: 'JSON',
            data:{
                flag: true,
                chatter: current_chatter,
                message: message_to_send
            },
            success: function(response){
                console.log(response.length);
                if(response.length==0){
                    // Nie udało sie wysłać wiadomośći dodać error
                }else{
                    document.querySelector("#message_input").value = '';
                    // pobranie wiadomomśći z ostatnio wysłaną
                    get_new_messages(current_chatter);
                }
            }
        })
    }
}
document.getElementById("message_send").addEventListener("click",send_message)
document.addEventListener("keydown", (event) => {
    if (event.isComposing || event.key === 229) {
      return;
    }
    
    if (event.key === 'Enter'){
        send_message();
    }
});

// Ustawić odpalanie funkcji co x sekund
function get_new_messages(){
    console.log("Sprawdzenie nowych wiadomości")
    $.ajax({
        url: '../chat/get_new_messages.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag: true,
            chatter: current_chatter,
            last_message: last_message_send
        },
        success: function(response){
            console.log(response.length);
            if(response.length==0){
                // Brak nowych wiadomości
                console.log("Brak nowych wiadomości")
            }else{
                // Dodaj nowe wiadomości
                display_messages(response);
            }
        }
    })
}