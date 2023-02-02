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
    document.querySelector('#chosen').innerHTML=`Podręcznik: ${name}, MEN: ${men}`;
    document.querySelector('.search-input').value=`${name}, MEN: ${men}`;
    document.getElementById('book_id').value=id;
}
document.getElementById('price').addEventListener('input',function(){
    const value=document.getElementById('price').value;
    document.querySelector('#chosen_price').innerHTML=`Cena ${value} PLN`;
})
document.querySelector('.search-input').addEventListener('input', function(){
    searching_function();
})
document.querySelector('.search-input').addEventListener('focus', function(){
    this.select();
    searching_function();
})
document.querySelector('.search-input').addEventListener('focusout', function(){
    const suggestions_list = document.querySelector('#suggestions_list');
    setTimeout(()=>{
        while(suggestions_list.childElementCount!=0){
            suggestions_list.firstChild.remove();
        }
    },150)
})
const browseFile = Array.from(document.querySelectorAll('.browseFile'));
for(const file of browseFile){
    const input=file.nextElementSibling;
    const parent=file.parentNode;
    file.addEventListener('click', () => {
        input.value = "";
        input.click();
    });
    input.addEventListener('change', function() {
        user_file = this.files[0];
        fileHandler(user_file,parent);
    }); 
}
const fileHandler = (file,parent) => {
    const validExt = ["image/jpeg", "image/jpg", "image/png"] //Poprawne rozszerzenia
    if (validExt.includes(file.type)) {
        const fileReader = new FileReader();
        fileReader.onload = () => {
            for(const child of parent.children){
                child.style.display = 'none';
            }
            const fileURL = fileReader.result;
            const img=document.createElement('img');
            img.src = fileURL;
            img.alt="";
            parent.appendChild(img);
            const paragraph = document.createElement('div');
            const p=document.createElement('p');
            p.innerHTML=file.name.split('.')[0];
            paragraph.appendChild(p);
            const i=document.createElement('i');
            i.classList.add('fa-solid','fa-trash-can');
            i.addEventListener('click',function(){
                deleteHandler(parent,img,paragraph);
            })
            paragraph.appendChild(i);
            paragraph.classList.add('fileName');
            parent.nextElementSibling.appendChild(paragraph);
        }
        fileReader.readAsDataURL(file);
        parent.classList.add('active')
    } 
    else {
        parent.classList.remove('active');
    }
}
const deleteHandler = (parent,img,paragraph) => {
    img.remove();
    paragraph.remove();
    const children=Array.from(parent.children);
    const input=children[children.length-1];
    input.value = '';
    for(const child of parent.children){
        child.style.display = null;
    }
    parent.classList.remove('active');
}
document.getElementById('submit').addEventListener('click', function() {
    const book_id = document.getElementById('book_id').value;
    const price = Math.round(Number(document.getElementById('price').value));
    const inputField = Array.from(document.querySelectorAll('.fileInputField'));
    const files1 = inputField[0].files;
    const files2 = inputField[1].files;
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
        response=JSON.parse(response);
        const error_spans=Array.from(document.querySelectorAll('.error_span'));
        error_spans.forEach(span=>{
            span.style.display=null;
        });
        if(response[0]){
            const error_id=response[2];
            console.log(error_id);
            const error_msg=response[1];
            error_id.forEach(error=>{
                document.getElementById(`${error}`).style.display='block';
                document.getElementById(`${error}`).innerHTML=error_msg[error];
            })
        }
      }
    });
  });


/////////////////////////////////////////////////////
/////////////////////Drag and Drop////////////////////////////////
/////////////////////////////////////////////////////

// const draggerArea = document.querySelectorAll('#dragger');
// const inputField = document.querySelectorAll('.fileInputField');
// const fileName = document.querySelectorAll('.fileName');
// const browseFile = Array.from(document.querySelectorAll('.browseFile'));

// browseFile[0].addEventListener('click', () => {
//     console.log('11');
//     inputField[0].value = "";
//     inputField[0].click();
//     console.log(browseFile[0])
// });

// // inputField[0].addEventListener('change', function(e) {
// //     file = this.files[0];
// //     fileHandler(file);
// // });

// //Usuwanie Nazwy Pliku i resetowanie elementów
// const deleteHandler = () => {
//     const draggerElement = ` <div class="icon"><i class="fa-solid fa-images"></i></div><button class="browseFile" id="browseFile">Wybierz Plik</button> <input type="file" hidden id="front_photo" class="fileInputField" />`
//     console.log(draggerElement);
//     draggerArea[0].innerHTML = draggerElement
//     fileName[0].innerHTML = ""
//     draggerArea[0].classList.remove('active');
//     console.log(browseFile[0]);
// };
// //Funckja sprawdzająca rozszerzenie pliku i pobierająca jego URL
// const fileHandler = (file) => {
//     const validExt = ["image/jpeg", "image/jpg", "image/png"] //Poprawne rozszerzenia
//     if (validExt.includes(file.type)) {
//         const fileReader = new FileReader();
//         fileReader.onload = () => {
//             const fileURL = fileReader.result;
//             let imgTag = `<img src=${fileURL} alt=""/>`
//             draggerArea[0].innerHTML = imgTag;
//             let paragraph = `<div class="fileName"><p>${file.name.split('.')[0]}</p><i class="fa-solid fa-trash-can" onclick="deleteHandler(0)"></i></div>`
//             fileName[0].innerHTML = paragraph;
//         }
//         fileReader.readAsDataURL(file);
//         draggerArea[0].classList.add('active')
//     } else {
//         draggerArea[0].classList.remove('active');
//     }}
//     console.log(browseFile[0]);
//     console.log(inputField[0]);
    
//     inputField[0].addEventListener('change', function(e) {
//         file = this.files[0];
//         fileHandler(file);
//     });
// /////////////////////2////////////////////////////////
// browseFile[1].addEventListener('click', function() {
//     inputField[1].value = ""
//     inputField[1].click();
//     console.log("Hej")
// });
// inputField[1].addEventListener('change', function(e) {
//     file = this.files[0];
//     fileHandler2(file);
// });

// //Usuwanie Nazwy Pliku, resetowanie buttona
// const deleteHandler2 = () => {
//     const draggerElement = ` <div class="icon"><i class="fa-solid fa-images"></i></div><button class="browseFile" id="browseFile">Wybierz Plik</button> <input type="file" hidden id="back_photo" class="fileInputField"/>`;
//     draggerArea[1].innerHTML = draggerElement
//     fileName[1].innerHTML = ""
//     draggerArea[1].classList.remove('active');
// };
// //Wybranie pliku za pomocą eksploratora, pobranie jego nazwy
// const fileHandler2 = (file) => {
//     const validExt = ["image/jpeg", "image/jpg", "image/png"] //Poprawne rozszerzenia
//     if (validExt.includes(file.type)) {
//         const fileReader = new FileReader();
//         fileReader.onload = () => {
//             const fileURL = fileReader.result;
//             let imgTag = `<img src=${fileURL} alt=""/>`
//             draggerArea[1].innerHTML = imgTag;
//             let paragraph = `<div class="fileName"><p>${file.name.split('.')[0]}</p><i class="fa-solid fa-trash-can" onclick="deleteHandler2(1)"></i></div>`
//             fileName[1].innerHTML = paragraph;
//         }
//         fileReader.readAsDataURL(file);
//         draggerArea[1].classList.add('active')
//     } else {
//         draggerArea[1].classList.remove('active');
//     }}

////////////////////////////////SUBMIT////////////////////////////////
