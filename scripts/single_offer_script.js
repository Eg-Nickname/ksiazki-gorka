// import {get_data_for_mainpage} from './script.js';
// console.log(get_data_for_mainpage);
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
        url: 'php_scripts/show_user_offers',
        
    })
}
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