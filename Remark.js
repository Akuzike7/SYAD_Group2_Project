const messageInput = document.getElementById("comment");

messageInput.addEventListener("keypress",(e) =>{
    var rows = parseInt(messageInput.getAttribute("rows"));
    if(e.key =="Enter"){
        messageInput.setAttribute("rows",++rows);
    }
    if(messageInput.value == ""){
        messageInput.setAttribute("rows",1);
    }
});

const messageBtn = document.getElementById("messageBtn");
const messageBoard = document.querySelector(".chat");

messageBtn.addEventListener("click",() =>{
    var message = document.createElement("div");
    message.className = "outgoingMsg";

    var msgtext = document.createElement("p");
    msgtext.value = messageInput.value;
    message.append(msgtext);

    var msgTime = document.createElement("h6");
    msgTime.id = "chatMsgTime2";
    msgTime.value = Date.now();
    message.append(msgTime);

})