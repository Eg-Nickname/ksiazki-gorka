function get_data_for_mainpage(){
    localStorage.removeItem("books");
    $.ajax({
        url: '../php_scripts/get_data.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag:true
        },
        success: function(response){
            if(response[0]==false)
            {
                let local_storage_data={};
                const books=response[2];
                for(const element of books)
                {
                    const category=element.category;//Tą zajefajną funkcję dać wszędzie
                    if(!local_storage_data[category]){
                        local_storage_data[category]=[];
                    }
                    local_storage_data[category].push(element);
                }
                local_storage_data=JSON.stringify(local_storage_data);
                localStorage.setItem("books",local_storage_data);
            }
        }
    })
}
get_data_for_mainpage();
const searching_function=function(){
    const search_bar=document.querySelector('.search-input');
    const suggestions_list = document.querySelector('#suggestions_list');
    $(suggestions_list).addClass('active_suggestion');
        while(suggestions_list.childElementCount!=0){
            suggestions_list.firstChild.remove();
        }
        const user_input=$('.search-input').val().toLowerCase();
        if(user_input){
            const books=JSON.parse(localStorage.getItem('books'));
            for(const category in books){
                for(const book of books[category]){
                    let title = (book.book_name);
                    const lower_title=title.toLowerCase();
                    if(lower_title.match(user_input) && suggestions_list.childElementCount<3){
                        const a=document.createElement('a');
                        a.innerHTML=`${title}, MEN: ${book.MEN}`;
                        title=(book.book_name.split(" ")).join("-");
                        a.addEventListener('click',function(){
                            chose_book(book.book_ID,book.book_name,book.MEN);
                        })
                        $(a).addClass("suggestion");
                        $(suggestions_list).append(a);
                    }
                }
            }
        }
}
function chose_book(id,name,men){
    document.querySelector('#chosen').innerHTML=`${name} MEN:${men}`;
    document.querySelector('.search-input').value=`${name} MEN:${men}`;
    document.getElementById('book_id').value=id;
}
document.querySelector('.search-input').addEventListener('input', function(){
    searching_function();
})
document.querySelector('.search-input').addEventListener('focus', function(){
    this.select();
    searching_function();
})
document.querySelector('.search-input').addEventListener('focusout', function(){
    console.log('i lost focus')
    const suggestions_list = document.querySelector('#suggestions_list');
    setTimeout(()=>{
        while(suggestions_list.childElementCount!=0){
            suggestions_list.firstChild.remove();
        }
    },150)
})
document.getElementById('submit').addEventListener('click', function(){
    const book_id=document.getElementById('book_id').value;
    const price = Math.round(Number(document.getElementById('price').value));
    const data = new FormData();
    const files=$('#front_photo')[0].files;
    const files2=$('#back_photo')[0].files;
    data.append('front_photo',files[0]);
    data.append('back_photo',files2[0]);
    data.append('book_id',book_id);
    data.append('price',price);
    $.ajax({
        url:'../php_scripts/user_panel/add_offer_script.php',
        type:'POST',
        data:data,
        contentType:false,
        processData:false,
        success:function(response){
            console.log(response);
        }
    })

})