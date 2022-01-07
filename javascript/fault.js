
/*checkbox functionality*/
const tableRows = document.querySelectorAll("tr");
const RowsCheckBox = document.querySelectorAll("#select");
const RowsCheckBoxAll = document.querySelectorAll("#selectAll");
let state = false;
let active =[];

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

            if(active.length > 1){
                const updatebtn = document.getElementById("update");
                updatebtn.setAttribute("disabled",true);
    
                const assignbtn = document.getElementById("assignTech");
                assignbtn.setAttribute("disabled",true);
    
                const deletebtn = document.getElementById("delete");
                deletebtn.setAttribute("disabled",true);

            }

              
        }

        
    })
})

const checkBoxes = document.querySelectorAll("tr td input");


checkBoxes.forEach((checkbox) => {
    
    checkbox.addEventListener('change',() => {
        if(checkbox.checked == true){
            active.push(checkbox.id);
            
            const updatebtn = document.getElementById("update");
            updatebtn.removeAttribute("disabled");

            const assignbtn = document.getElementById("assignTech");
            assignbtn.removeAttribute("disabled");

            const deletebtn = document.getElementById("delete");
            deletebtn.removeAttribute("disabled");
        }
        else{
            active = active.filter(e => e !== checkbox.id);

            if(active.length == 0){
                const updatebtn = document.getElementById("update");
                updatebtn.setAttribute("disabled",true);

                const assignbtn = document.getElementById("assignTech");
                assignbtn.setAttribute("disabled",true);

                const deletebtn = document.getElementById("delete");
                deletebtn.setAttribute("disabled",true);
            }
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
    
    const assignTable = document.querySelector(".assignTable");
    assignTable.style.display = "table";

        
        
        table.forEach((element) => {
            let row = document.createElement("tr");
            row.style.fontSize = "smaller";
            row.className = "tableRow";
             
            let el = element.firstElementChild.firstChild;
            const tbody = document.querySelector(".assignTable");
            

                if(table[0].firstElementChild.firstElementChild !== el){

                    if(element.firstElementChild.firstElementChild.checked == true){
        
                            let id = document.createElement("td");
                            let category = document.createElement("td");
                            let description = document.createElement("td");
                            let location = document.createElement("td");

                            let child = element.firstElementChild.nextElementSibling;
                            id.textContent = child.innerHTML;
                            row.appendChild(id);
                           
                            category.textContent = child.nextElementSibling.nextElementSibling.innerHTML;
                            row.appendChild(category);
                            
                            description.textContent = child.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
                            row.appendChild(description);

                            location.textContent = child.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
                            row.appendChild(location);

                            tbody.appendChild(row);
                            
                            let array = document.getElementById("list_id");
                            array.value = array.value +" "+id.textContent;
                            
                        

                    }


                    
                    
                    
                }
                        
                    
            })

     })
    
 const assignFaultBtn = document.getElementById("assignFaultBtn");
 
 assignFaultBtn.addEventListener("click",() =>{
    let form = document.querySelector(".assignForm");
    form.submit();
 })
           
   

const closebtn4 = document.getElementById("close4");

closebtn4.addEventListener("click",() =>{
    const tableRows = document.querySelectorAll(".tableRow");

    tableRows.forEach((row) => {
        row.remove();
    })

    const List_ids = document.getElementById("list_id");
    List_ids.value = "";

    assignFault_form.style.display = "none";
})

const cancelBtn1 = document.getElementById("CancelBtn");

cancelBtn1.addEventListener("click",() =>{
    const tableRows = document.querySelectorAll(".tableRow");

    tableRows.forEach((row) => {
        row.remove();
    })
    
    const List_ids = document.getElementById("list_id");
    List_ids.value = "";

    assignFault_form.style.display = "none";
})

