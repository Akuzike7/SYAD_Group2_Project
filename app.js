const user = document.getElementById('mail');
const password = document.getElementById('password');
const form = document.getElementById('Login');

var faultAdd_icon;
var route;

const faultData = [];
const remarksData = [];

const active = [];
const initialState = [];


function faultForm(){
   

}
function addFault(category,description,location,technician,reported,phone){
    faultData.push({
        "Date":Date.now(),
        "Category":category,
        "Description":description,
        "Location":location,
        "Technician":technician,
        "Reported-by":reported,
        "Phone":phone,
        "Status":"pending",
    });
    console.log(faultData);
}

function addRemark(FaultId,FaultLocation,FaultTitle){
    remarksData.push({
        "Id":"",
        "Title":FaultTitle,
        "Location":FaultLocation,
        "RecentTime":Date.now(),
        "Data":[{
            "Id":FaultId,
            "userId":user,
            "message":""
        }]
            
    });
}

function comment(id,message){
    remarksData.Data.push({
        "Id":id,
        "userId":user.id,
        "message":message

    }
    )
}
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
    const checkBoxes = document.querySelectorAll("tbody tr td input");
   
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



