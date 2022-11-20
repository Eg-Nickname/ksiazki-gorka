/////////////////////////////////////////////////////////////////////////////
//--------------------------------------------------------------------------
//Pobieranie elementów do localStorage, skopiowane z innego skryptu, bo eksport nie chiciał działać- Sadge
const get_data_for_mainpage = function (){

    localStorage.removeItem("books");
    $.ajax({
        url: 'php_scripts/get_data.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag:true
        },
        success: function(response){
            if(response[0]==false)
            { 
                let local_storage_data={
                    matematyka:[],
                    historia:[]
                };
                const books=response[2];
                for(const element of books)
                {
                    const category=element.category;
                    local_storage_data[category].push(element);
                }
                local_storage_data=JSON.stringify(local_storage_data);
                localStorage.setItem("books",local_storage_data);;
            }
            display_sample_offer();
        }
    })
}
get_data_for_mainpage();
//------------------------------------------------------------------------------
// Pobieranie danych z url i wyświetlenie ich jako przykładowa książka
const display_sample_offer = function (){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const bookId=urlParams.get('number');
    const title = urlParams.get('title').replaceAll("-"," ");
    const category = urlParams.get('category');
    const books=JSON.parse(localStorage.getItem('books'));
    const subject=books[category];
    if(subject)
    {
        const data = {};
        for(const element of subject){
            if(element.book_ID==bookId && element.book_name==title){
                for(const key in element)
                {
                    data[key] = element[key];
                }
                break;
            }
        }
        console.log(data);
        if(Object.keys(data).length!=0){
            console.log(data.picture);
            $('.base-img').css('background-image',`url("${data.picturexl}")`);
            $('.category-path').append("<p>" + category + " > " + data.book_name + "<h2")
            $('.base-title').append("<h2>" + data.book_name + "<h2>")
            $('.publisher-name').append("<p> Wydawnictwo: " + data.publishing_house + "<p>")
            $('.date-name').append("<p> Data Wydania: " + data.release_date + "<p>")
            $('.isbn-name').append("<p> ISBN: " + data.ISBN + "<p>")
            $('.authors-name').append("<p> Autorzy: " + data.authors + "<p>")
            $('.base-text').append("<p>" + data.description + "<p>")
            
            // ('background-image',`url("${data.picture}")`);
            // `url("${element['picture']}")`
            show_users_offers(bookId);
        }
        else{
            document.querySelector('main').innerHTML="";
            $('main').append('<h1 class="no_exists">Strona nie istnieje</h1>')
        }
    }
    else{
        document.querySelector('main').innerHTML="";
        $('main').append('<h1 class="no_exists">Strona nie istnieje</h1>')
    }
}
const show_users_offers= function (bookId){
    $.ajax({
        url: 'php_scripts/show_users_offers.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            book_id:bookId
        },
        success: function(response){
            for(const offer of response){
                console.log(offer);
                const div=document.createElement('div');
                div.classList.add("user_offer_box");
                div.id=`oferta${offer.offer_id}`;
                const img_box=document.createElement('div');
                img_box.classList.add("user_offer_box_image");
                const div_content=document.createElement('div');
                div_content.classList.add("user_offer_box_content");
                const price=document.createElement('p');
                price.classList.add("user_offer_box_content_price");
                price.innerHTML=`${offer.price} PLN`;
                const button=document.createElement('button');
                button.classList.add("user_offer_box_content_button");
                button.innerHTML = "Zarezerwuj";
                $(button).on('click', function(){
                    declare_buy(Number(offer.offer_id));
                });
                div_content.append(price,button);
                div.append(img_box,div_content);

                document.querySelector('section').appendChild(div);
            }
        }
    })
}
const declare_buy = function(offer_id){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const bookId=Number(urlParams.get('number'));
    $.ajax({
        url:'php_scripts/declare_buy.php',
        type:'POST',
        dataType: 'JSON',
        data: {
            offer_id:offer_id,
            book_id:bookId,
        },
        success: function(response){
            if(!response["error"])
            {
                $(`#oferta${offer_id}`).fadeOut(1000);
                setTimeout(()=>{
                    document.getElementById(`oferta${offer_id}`).remove();
                },1000)
            }
        }
    });
}
////////////////////////////////////////////////////////////////////////////////////////////////
const show_image_popup= function (){
    let image_bg=$(this).css('background-image');
    image_bg=image_bg.split("/");
    console.log(image_bg);
    const src=image_bg[image_bg.length-2]+'/'+(image_bg[image_bg.length-1]).slice(0,-2);
    document.querySelector('.offer-image').src=src;
    $('.modal-box').css('visibility','visible');
}
$("body").on("click",'.user_offer_box_image',show_image_popup);
const hide_image_popup=function(){
    $('.modal-box').css('visibility','hidden');
}
$('.close-modal-box').on('click', hide_image_popup);
//--------------------------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////
const log_out = function (){
    $.ajax({
        url:'php_scripts/log_out.php',
        success: function(response){
            window.location.reload();
        }
    })
}
$('#log_out').on('click',log_out);