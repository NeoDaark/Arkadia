$(document).ready(function() {
    console.log('Chat');
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});

function Chat () {
    this.update = updateChat;
    this.send = sendChat;
    this.sendhs = sendChaths;
    this.sendhp = sendChathp;
    this.sendimg = sendChatImg;
    this.getState = getStateOfChat;
    this.loadxat = loadChat;
}

//gets the state of the chat
function getStateOfChat(file) {
    if(!instanse){
        instanse = true;
        $.ajax({
            type: "POST",
            url: "../../System/Partida_Chat.php",
            data: {'function': 'getState', 'file': file},
            dataType: "json",	
            success: function(data) {state = data.state;instanse = false;}
        });
    }	
}

//Updates the chat
function updateChat(file) {
    if(!instanse){
        instanse = true;
        $.ajax({
            type: "POST",
            url: "../../System/Partida_Chat.php",
            data: {'function': 'update','state': state,'file': file},
            dataType: "json",
            success: function(data) {
                console.log(data);
                if(data.text){
                    for (var i = 0; i < data.text.length; i++) {
                        var content = $('#chat-container').html();
                        $('#chat-container').empty();
                        $('#chat-container').html(content +' '+data.text[i]);
                        var elem = document.getElementById('chat-container');
                        elem.scrollTop = elem.scrollHeight;
                    }	
                }
		instanse = false;
                state = data.state;
            }
        });
    }else {
        //setTimeout(updateChat(file), 1500);
    }
}
//Updates the chat
function loadChat(file) {
    $.ajax({
        type: "POST",
        url: "../../System/Partida_Chat.php",
        data: {'function': 'load','file': file},
        dataType: "json",
        success: function(data) {
            console.log(data);
            if(data.text){
                for (var i = 0; i < data.text.length; i++) {
                    var content = $('#chat-container').html();
                    $('#chat-container').empty();
                    $('#chat-container').html(content +' '+data.text[i]);
                }	
            }
            var elem = document.getElementById('chat-container');
            elem.scrollTop = elem.scrollHeight;
        }
    });
}

//send the message
function sendChat(message, nickname, color, file) { 
    updateChat(file);
    $.ajax({
        type: "POST",
        url: "../../System/Partida_Chat.php",
        data: {'function': 'send','message': message,'nickname': nickname,'file': file, 'color': color},
        dataType: "json",
        success: function(data){
            updateChat(file);
        }
    });
}

//send the hs tirada
function sendChaths(txt, val, nickname, color, file) { 
    updateChat(file);
    $.ajax({
        type: "POST",
        url: "../../System/Partida_Chat.php",
        data: {'function': 'sendhs','message': txt, 'val':val, 'nickname': nickname,'file': file, 'color': color},
        dataType: "json",
        success: function(data){
            console.log(data);
            updateChat(file);
        }
    });
}
//send the hs tirada
function sendChathp(txt, val, nickname, color, file) { 
    updateChat(file);
    $.ajax({
        type: "POST",
        url: "../../System/Partida_Chat.php",
        data: {'function': 'sendhp','message': txt, 'val':val,'nickname': nickname,'file': file, 'color': color},
        dataType: "json",
        success: function(data){
            console.log(data);
            updateChat(file);
        }
    });
}

//send the image message
function sendChatImg(imagen, nickname, color, file) { 
    updateChat(file);
    $.ajax({
        type: "POST",
        url: "../../System/Partida_Chat.php",
        data: {'function': 'sendimg','message': imagen,'nickname': nickname,'file': file, 'color': color},
        dataType: "json",
        success: function(data){
            updateChat(file);
        }
    });
}
