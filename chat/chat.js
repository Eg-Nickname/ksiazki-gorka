let curent_chatter  = 0;
let last_message_send = "2069-03-31 00:21:37";//#wiedział

function get_all_messages(chatter){
    curent_chatter = chatter;
    $.ajax({
        url: '../chat/get_messages.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
            flag: true,
            chatter: curent_chatter
        },
        success: function(response){
            console.log(response.length);
            if(response.length==0){
                // Error braku wiadomości z wybrana osobą
            }else{
                // Wyświetl wiadomości jeśli istnieja
                document.querySelector('.chat_messages').innerHTML="";
                display_messages(response);
            }
        }
    })
}


function display_messages(messages){
    for(const message of messages){
        const message_div = document.createElement('div');
        if(message["sender_id"] == curent_chatter){
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
    if(message_to_send.length == 0)
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
                chatter: curent_chatter,
                message: message_to_send
            },
            success: function(response){
                console.log(response.length);
                if(response.length==0){
                    // Nie udało sie wysłać wiadomośći dodać error
                }else{
                    document.querySelector("#message_input").value = '';
                    // pobranie wiadomomśći z ostatnio wysłaną
                    get_new_messages(curent_chatter);
                }
            }
        })
    }
}

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
            chatter: curent_chatter,
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