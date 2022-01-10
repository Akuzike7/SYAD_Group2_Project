/*Remark messagebox functionality for increasing rows on keypress */
const messageInput = document.getElementById("comment");

messageInput.addEventListener("keypress",(e) =>{
    console.log("pressed");
    let rows = parseInt(messageInput.getAttribute("rows"));
    if(e.key =="Enter"){
        messageInput.setAttribute("rows",++rows);
    }
    if(messageInput.value == ""){
        messageInput.setAttribute("rows",1);
    }
});




