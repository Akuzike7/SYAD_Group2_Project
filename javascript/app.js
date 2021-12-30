const user = document.getElementById('mail');
const password = document.getElementById('password');
const form = document.getElementById('Login');

var faultAdd_icon;
var route;

const faultData = [];
const remarksData = [];

const active = [];
const initialState = [];

const closebtn = document.getElementById("close");

closebtn.addEventListener("click",() =>{
    const addFault_form = document.querySelector(".addForm");
    addFault_form.style.display = "none";
})

//adding a fault button, which displays the fault form
const add = document.getElementById("add");

add.addEventListener("click",() =>{
    const addFault_form = document.querySelector(".addForm");
    addFault_form.style.display = "block";
})

//adding a update button
const update = document.getElementById("update");

update.addEventListener("click",() =>{
    const updateFault_form = document.querySelector(".updateForm");
    updateFault_form.style.display = "block";
})

//adding a delete button
const deletes = document.getElementById("delete");

deletes.addEventListener("click",() =>{
    const deleteFault_form = document.querySelector(".deleteForm");
    deleteFault_form.style.display = "block";
})

//adding a assign button
const assign = document.getElementById("assignTech");

assign.addEventListener("click",() =>{
    alert("assign button");
    const addFault_form = document.querySelector(".assignForm");
    assignFault_form.style.display = "block";
})

//adding a remark button
const remark = document.getElementById("remark");

remark.addEventListener("click",() =>{
    const remarkFault_form = document.querySelector(".remarkForm");
    remarkFault_form.style.display = "block";
})


function changeImage(faultAdd_icon){
    document.getElementById("add").setAttribute("src",faultAdd_icon);
}

function navigate(route){
    location.href = route;
}


const tableRows = document.querySelectorAll("tbody tr");
const RowsCheckBox = document.querySelectorAll("#select");
const RowsCheckBoxAll = document.querySelectorAll("#selectAll");
var state = false;

tableRows.forEach((row) => {
    
    row.addEventListener("dblclick",() => {
        if(state == false){
            RowsCheckBoxAll.forEach((checkbox) =>{
                checkbox.style.display = "block";
            });
            RowsCheckBox.forEach((checkbox) =>{
                checkbox.style.display = "block";
            });
            state = true;
        }
        else{
            RowsCheckBoxAll.forEach((checkbox) =>{
                checkbox.style.display = "none";
            });
            RowsCheckBox.forEach((checkbox) =>{
                checkbox.style.display = "none";
            });
            state = false;
        }
        
    })

    
});

const SelectAll = document.querySelector('#selectRadio');

SelectAll.addEventListener('click', () => {
    const checkBoxes = document.querySelectorAll("tr td input");
   
    checkBoxes.forEach((checkbox) => {

        checkbox.addEventListener('click', () => {
            
            if(checkbox.checked == false) {
                SelectAll.checked = false;   
            }
            
        })

        if(SelectAll.checked) {
            checkbox.checked = true;

            const updatebtn = document.getElementById("update");
            updatebtn.removeAttribute("disabled");

            const assignbtn = document.getElementById("assignTech");
            assignbtn.removeAttribute("disabled");

            const deletebtn = document.getElementById("delete");
            deletebtn.removeAttribute("disabled");
           
        } else {
            checkbox.checked = false;

            const updatebtn = document.getElementById("update");
            updatebtn.setAttribute("disabled",true);

            const assignbtn = document.getElementById("assignTech");
            assignbtn.setAttribute("disabled",true);

            const deletebtn = document.getElementById("delete");
            deletebtn.setAttribute("disabled",true);
              
        }

        
    })
})



