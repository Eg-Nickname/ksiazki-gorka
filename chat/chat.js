let curent_chatter  = 0;

function get_messages(chatter){
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
                display_messages(response);
            }
        }
    })
}


function display_messages(messages){
    document.querySelector('.chat_messages').innerHTML="";
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
                    get_messages(curent_chatter);
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