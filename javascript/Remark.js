/*Remark messagebox functionality for increasing rows on keypress */
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

/*Adding the message on the messageboard */
const messageBtn = document.getElementById("messageBtn");
const messageBoard = document.querySelector(".remarkChat");

messageBtn.addEventListener("click",() =>{
    let message = document.createElement("div");
    message.className = "outgoingMsg";

    let msgtext = document.createElement("p");
    msgtext.textContent = messageInput.value;
    message.appendChild(msgtext);

    let msgTime = document.createElement("h6");
    msgTime.id = "chatMsgTime2";
    let time = new Date();
    msgTime.textContent = time.toLocaleString();
    message.appendChild(msgTime);

    messageBoard.appendChild(message);
    messageInput.value = "";

})