function get_purchases(){
    $.ajax({
        url: '../php_scripts/user_panel/get_purchases.php',
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
                p.innerHTML="Jeszcze nic nie zarezerwowałeś";
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
        if(!document.getElementById(`seller${offer['seller']}`)){
            const custom_div=document.createElement('div');
            custom_div.id=`seller${offer['seller']}`;
            custom_div.classList.add('offer_info_wrapper');
            document.querySelector('.customer_box').append(custom_div);
            const offer_info=document.createElement('div');
            offer_info.classList.add('offer_info');
            const buyer=document.createElement('p');
            buyer.classList.add('buyer_name');
            const a=document.createElement('a');
            a.href=`../oferty-uzytkownika?seller=${offer.seller}`;
            a.innerHTML=` ${offer.name} ${offer.surname}`;
            buyer.innerHTML =`Sprzedający:`;
            buyer.append(a);
            const chat_p=document.createElement('p');
            chat_p.classList.add('lovely_p');
            const img=document.createElement('img');
            img.src='../images/envelope.svg';
            img.alt='envelope';
            img.classList.add('offer_info_chatbtn');
            chat_p.append(img,'Otwórz czat');
            chat_p.addEventListener('click', function(){
                change_message_box(offer.seller,offer.name,offer.surname);
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
        const offer_book=document.createElement('p');
        offer_book.classList.add('offer_book');
        offer_book.innerHTML=offer.book_name;
        const offer_price=document.createElement('p');
        offer_price.classList.add('offer_price');
        offer_price.innerHTML=`${offer.price} PLN`;
        div.append(offer_book,offer_price);
        const par=document.getElementById(`seller${offer['seller']}`);
        const sum_div=par.querySelector(`.offer_info_sum`);
        sum_div.before(div);
        const new_cost=cost(par);
        sum_div.querySelector('.offer_price_sum').innerHTML=`${new_cost} PLN`;
    }
}
get_purchases();
function cost(parent){
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