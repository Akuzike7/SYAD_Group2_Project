
/*checkbox functionality*/
const tableRows = document.querySelectorAll("tr");
const RowsCheckBox = document.querySelectorAll("#select");
const RowsCheckBoxAll = document.querySelectorAll("#selectAll");
let state = false;

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

/* ------------------------------------------------------------------------- */

//prevent form from submitting
const faultsForm = document.querySelector(".faults");
const addFault_form = document.querySelector(".addForm");

faultsForm.onsubmit = (e) =>{
    e.preventDefault();
}

//adding a fault button, which displays the fault form
const faultData = [];
const add = document.getElementById("add");

add.addEventListener("click",() =>{
    addFault_form.style.display = "block";
})

const closebtn = document.getElementById("close");

closebtn.addEventListener("click",() =>{
    addFault_form.style.display = "none";
})

const addFaultcomponents = document.querySelectorAll(".addForm input,.addForm select");

addFaultcomponents.forEach((element) => {
    element.addEventListener("change",()=>{
        const addBtn = document.getElementById("addBtn");
        const ReportBtn = document.getElementById("ReportBtn");
        
        if(element.value == "" ){
            addBtn.setAttribute("disabled",true);
            ReportBtn.setAttribute("disabled",true);
        }
        if(addFaultcomponents[0].value != "" && addFaultcomponents[1].value != "" && addFaultcomponents[2].value != "" && addFaultcomponents[3].value != ""){
            addBtn.removeAttribute("disabled");
            ReportBtn.removeAttribute("disabled");
        }
        
        
    })
});

 
//add fault button function
const addFaults = document.getElementById("addBtn");

addFaults.addEventListener("click",() =>{
    const addTable = document.querySelector(".addTable");
    addTable.style.display = "table";

    let row = document.createElement("tr");
    row.style.fontSize = "smaller";
    row.className = "tableRow";

    let data = document.querySelectorAll(".addForm input,.addForm select");

    data.forEach((element) => {

        let name = document.createElement("td");
        name.value = element.value;

        if(element.name == "category"){
            name.style.order = "1";
            name.textContent = name.value;
        }
        if(element.name == "description"){
            name.style.order = "2";
            name.textContent = name.value;
        }
        if(element.name == "location"){
            name.style.order = "3";
            name.textContent = name.value;
        }
        if(element.name == "Phone"){
            name.style.order = "4";
            name.textContent = name.value;
        }
        
        row.appendChild(name);
        
    });

    const tbody = document.querySelector(".addTable");
    tbody.appendChild(row);

    data.forEach((element) =>{
        element.value = "";
    });
    
    
})

//report fault button when clicked
const ReportBtn = document.getElementById("ReportBtn");
ReportBtn.onclick = (e) =>{
    let form = document.querySelector(".addForm");
    form.submit();
    
}

/* --------------------------------------------------------------------------- */
//adding a assign button
const assign = document.getElementById("assignTech");
const assignFault_form = document.querySelector(".assignForm");

assign.addEventListener("click",() =>{
    assignFault_form.style.display = "block";

    let table = document.querySelectorAll(".ListFaults tr");
    let checkboxAll = document.getElementById("selectAll");
    let checkboxes = document.querySelectorAll("select");
    
    if(checkboxAll.firstElementChild.checked == true){
        const assignTable = document.querySelector("#assignTable");
        assignTable.style.display = "table";

        
        
        table.forEach((element) => {
            let row = document.createElement("tr");
            row.style.fontSize = "smaller";
            row.className = "tableRow";
            
            console.log(element);
            

            if(!table.firstElementChild){
                /*item.forEach((tem) =>{
                    let data = document.createElement("td");
                    data.value = element.value;
                
                    if(element.name == "category"){
                        data.style.order = "1";
                        data.textContent = data.value;
                    }
                    if(element.name == "description"){
                        data.style.order = "2";
                        data.textContent = data.value;
                    }
                    if(element.name == "location"){
                        data.style.order = "3";
                        data.textContent = data.value;
                    }
                    if(element.name == "Phone"){
                        data.style.order = "4";
                        data.textContent = data.value;
                    }
                    row.appendChild(data);
                });*/

                const tbody = document.querySelector("#assignTable");
                tbody.appendChild(row);
            }
                    
                
        })

     }
       
    })
    
     
           
   

const closebtn4 = document.getElementById("close4");

closebtn4.addEventListener("click",() =>{
    assignFault_form.style.display = "none";
})

const cancelBtn1 = document.getElementById("CancelBtn");

cancelBtn1.addEventListener("click",() =>{
    assignFault_form.style.display = "none";
})