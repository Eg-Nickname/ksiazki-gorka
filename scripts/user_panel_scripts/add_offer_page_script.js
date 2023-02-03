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

/////////////////////////////////////////////////////
/////////////////////Drag and Drop////////////////////////////////
/////////////////////////////////////////////////////

//Nie działa gdy ktoś usunie wcześniej wgran zdjęcie

const draggerArea = document.querySelectorAll('#dragger');
const inputField = document.querySelectorAll('.fileInputField');
const fileName = document.querySelectorAll('.fileName');
const browseFile = document.querySelectorAll('#browseFile');

browseFile[0].addEventListener('click', () => {
    inputField[0].value = ""
    inputField[0].click();
    console.log(browseFile[0])
});

inputField[0].addEventListener('change', function(e) {
    file = this.files[0];
    fileHandler(file);
});

//Usuwanie Nazwy Pliku i resetowanie elementów
const deleteHandler = () => {
    const draggerElement = ` <div class="icon"><i class="fa-solid fa-images"></i></div><button class="browseFile" id="browseFile">Wybierz Plik</button> <input type="file" hidden id="front_photo" class="fileInputField" />`
    console.log(draggerElement);
    draggerArea[0].innerHTML = draggerElement
    fileName[0].innerHTML = ""
    draggerArea[0].classList.remove('active');
    console.log(browseFile[0]);
};
//Funckja sprawdzająca rozszerzenie pliku i pobierająca jego URL
const fileHandler = (file) => {
    const validExt = ["image/jpeg", "image/jpg", "image/png"] //Poprawne rozszerzenia
    if (validExt.includes(file.type)) {
        const fileReader = new FileReader();
        fileReader.onload = () => {
            const fileURL = fileReader.result;
            let imgTag = `<img src=${fileURL} alt=""/>`
            draggerArea[0].innerHTML = imgTag;
            let paragraph = `<div class="fileName"><p>${file.name.split('.')[0]}</p><i class="fa-solid fa-trash-can" onclick="deleteHandler(0)"></i></div>`
            fileName[0].innerHTML = paragraph;
        }
        fileReader.readAsDataURL(file);
        draggerArea[0].classList.add('active')
    } else {
        draggerArea[0].classList.remove('active');
    }}

/////////////////////2////////////////////////////////
browseFile[1].addEventListener('click', () => {
    inputField[1].value = ""
    inputField[1].click();
    console.log("Hej")
});
inputField[1].addEventListener('change', function(e) {
    file = this.files[0];
    fileHandler2(file);
});

//Usuwanie Nazwy Pliku, resetowanie buttona
const deleteHandler2 = () => {
    const draggerElement = ` <div class="icon"><i class="fa-solid fa-images"></i></div><button class="browseFile" id="browseFile">Wybierz Plik</button> <input type="file" hidden id="back_photo" class="fileInputField"/>`;
    draggerArea[1].innerHTML = draggerElement
    fileName[1].innerHTML = ""
    draggerArea[1].classList.remove('active');
};
//Wybranie pliku za pomocą eksploratora, pobranie jego nazwy
const fileHandler2 = (file) => {
    const validExt = ["image/jpeg", "image/jpg", "image/png"] //Poprawne rozszerzenia
    if (validExt.includes(file.type)) {
        const fileReader = new FileReader();
        fileReader.onload = () => {
            const fileURL = fileReader.result;
            let imgTag = `<img src=${fileURL} alt=""/>`
            draggerArea[1].innerHTML = imgTag;
            let paragraph = `<div class="fileName"><p>${file.name.split('.')[0]}</p><i class="fa-solid fa-trash-can" onclick="deleteHandler2(1)"></i></div>`
            fileName[1].innerHTML = paragraph;
        }
        fileReader.readAsDataURL(file);
        draggerArea[1].classList.add('active')
    } else {
        draggerArea[1].classList.remove('active');
    }}

////////////////////////////////SUBMIT////////////////////////////////

document.getElementById('submit').addEventListener('click', function() {
        const book_id = document.getElementById('book_id').value;
        const price = Math.round(Number(document.getElementById('price').value));
        console.log(inputField[0].files);
        const files1 = inputField[0].files;
        const files2 = inputField[1].files;
        // console.log(files1);
        // console.log(files2);
        // console.log("ravarbvar");
        // console.log(files1);
        // console.log("ravarbvar");
        // fileHandler(files1[0]);
        const data = new FormData();
        data.append('front_photo', files1[0]);
        data.append('back_photo', files2[0]);
        data.append('book_id', book_id);
        data.append('price', price);
        $.ajax({
          url: '../php_scripts/user_panel/add_offer_script.php',
          type: 'POST',
          data: data,
          contentType: false,
          processData: false,
          success: function(response) {
            console.log(response);
          }
        });
      });
// document.getElementById('submit').addEventListener('click', function(){
//     const book_id=document.getElementById('book_id').value;
//     const price = Math.round(Number(document.getElementById('price').value));
//     const data = new FormData();
//     const files=inputField[0].files;
//     const files2=inputField[1].files;
//     data.append('front_photo',files1[0]);
//     data.append('back_photo',files2[0]);
//     data.append('book_id',book_id);
//     data.append('price',price);
//     $.ajax({
//         url:'../php_scripts/user_panel/add_offer_script.php',
//         type:'POST',
//         data:data,
//         contentType:false,
//         processData:false,
//         success:function(response){
//             console.log(response);
//         }
//     })

// })