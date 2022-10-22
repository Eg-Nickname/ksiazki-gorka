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
                console.log("dopd");
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
                localStorage.setItem("books",local_storage_data);
            }
            display_elements_on_offer_list();
        }
    })
}
get_data_for_mainpage();
const display_elements_on_offer_list = function(subject_array=[]){
    console.log(subject_array);
    const wrapper=document.querySelector('.books-wrapper')
    const books=JSON.parse(localStorage.getItem('books'));
    for(const subject of Object.keys(books)){
        for(const element of books[subject]){
            console.log(element);
            const div=document.createElement('div');
            $(div).addClass(`subject`);
            div.setAttribute('id',`${element['category']}${element['book_ID']}`);
            const img_div=document.createElement('div');
            $(img_div).addClass(`book-img`);
            console.log(`"../${element['picture']}"`);
            $(img_div).css(`background-image`,`url("${element['picture']}")`);
            const book_name=document.createElement('p');
            $(book_name).addClass(`book-name`);
            $(book_name).html(`${element['book_name']}`);
            const book_price=document.createElement('p');
            $(book_price).addClass(`book-price`);
            $(book_price).html(`Zaczyna się od 30 PLN`); //dodać najniższą cenę to bazy
            const button=document.createElement('button');
            $(button).addClass(`book-btn`);
            button.setAttribute('id',`book-btn${element['book_ID']}`);
            $(button).html('Sprawdź ofertę');
            div.append(img_div,book_name,book_price,button);
            $('.books-wrapper').append(div);
        }
    }
}
$('#sumbit_filters').on('click', function(){
    const checked_inputs=document.querySelectorAll('.subject_filter:checked');
    console.log(checked_inputs);
    const subject_array=[];
    for(const element of checked_inputs){
        subject_array.push(element.id);
    }
    display_elements_on_offer_list(subject_array);
});

const log_out = function (){
    $.ajax({
        url:'php_scripts/log_out.php',
        success: function(response){
            window.location.reload();
        }
    })
}
$('#log_out').on('click',log_out);