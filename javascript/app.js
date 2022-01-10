let faultAdd_icon;
let route;

function changeImage(faultAdd_icon){
    document.getElementById("add").setAttribute("src",faultAdd_icon);
}

function navigate(route){
    location.href = route;
}




const btn1 = document.getElementById("Unassigned-faults");
const btn2 = document.getElementById("Unresolved_faults");

