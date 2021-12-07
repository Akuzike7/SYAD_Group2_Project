const user = document.getElementById('mail');
const password = document.getElementById('password');
const form = document.getElementById('Login');

form.addEventListener('submit',(e) => {
    navigate("./admin/Dashboard-adminstrator.html");
})

var faultAdd_icon;
var route;

function addFault(){
    

}

function changeImage(faultAdd_icon){
    document.getElementById("add").setAttribute("src",faultAdd_icon);
}

function navigate(route){
    location.href = route;
}

