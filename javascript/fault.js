
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

            if(active.length == 1){
                const remarkbtn = document.getElementById("remarkBtn");
                remarkbtn.removeAttribute("disabled");
            }
            
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

            if(active.length > 1 || active.length == 0){
                const remarkbtn = document.getElementById("remarkBtn");
                remarkbtn.setAttribute("disabled",true);
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
    const tableRows = document.querySelectorAll(".tableRow");
    const table = document.querySelector(".addTable");

    table.style.display = "none";

    tableRows.forEach((row) => {
        row.remove();
    })

    const List_ids = document.getElementById("list_id");
    List_ids.value = "";
    List_ids.innerHTML = null;

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
let array = "";


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
        
        array = array +name.textContent+"'";

        row.appendChild(name);
        
    });

    array = array +",";

    let arrays = document.getElementById("list_ids");
    
    arrays.innerHTML = array;
    console.log(arrays);
    

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
 
 //assign fault button when clicked
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




const cancelBtn4 = document.getElementById("CancelBtn4");

cancelBtn4.addEventListener("click",() =>{
    const tableRows = document.querySelectorAll(".tableRow");

    tableRows.forEach((row) => {
        row.remove();
    })
    
    const List_ids = document.getElementById("list_id");
    List_ids.value = "";

    assignFault_form.style.display = "none";
})

/*----------------------------------------------------------------------------------------------------------------------------------*/
//updating a fault
const update = document.getElementById("update");
const updateForm = document.querySelector(".updateForm");

update.addEventListener("click",() => {
    
    updateForm.style.display = "block";
    const checkbox = document.querySelectorAll("tr td input");

    checkbox.forEach((element) => {
        
        if(element.checked == true){
            let row = element.parentElement;
            let id = row.nextElementSibling;
            let description = row.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
            let category = row.nextElementSibling.nextElementSibling.nextElementSibling;
            let location = row.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
            let status = element.parentElement.parentElement.lastElementChild;
            
            let idInput = document.getElementById("id");
            idInput.value = id.textContent;
            
            let descript = document.getElementById("descript");
            descript.value = description.textContent;

            let cate = document.getElementById("cate");
            cate.value = category.textContent;

            let locate = document.getElementById("locate");
            locate.value = location.textContent;
           

            let statusInput = document.getElementById("Status");
            statusInput.value = status.textContent;
        }
    })

})

 //updating fault button when clicked
 const updateBtn = document.getElementById("UpdateBtn");
 
 updateBtn.addEventListener("click",() =>{
    let form = document.querySelector(".updateForm");
    form.submit();
 })

const closebtn2 = document.getElementById("close2");

closebtn2.addEventListener("click",() =>{
    updateForm.style.display = "none";
})

const cancelBtn2 = document.getElementById("CancelBtn2");

cancelBtn2.addEventListener("click",() =>{
    updateForm.style.display = "none";
})



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------*/
//deleting a fault

const deletes = document.getElementById("delete");
const deleteForm = document.querySelector(".deleteForm");

deletes.addEventListener("click",() =>{
    deleteForm.style.display = "block";

    let table = document.querySelectorAll(".ListFaults tr");
    
    const deleteTable = document.querySelector(".deleteTable");
    deleteTable.style.display = "table";

        
        
        table.forEach((element) => {
            let row = document.createElement("tr");
            row.style.fontSize = "smaller";
            row.className = "tableRow";
             
            let el = element.firstElementChild.firstChild;
            const tbody = document.querySelector(".deleteTable");
            

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
                            
                            let array = document.getElementById("list_ids2");
                            array.value = array.value +" "+id.textContent;
                            
                        

                    }


                    
                    
                    
                }
                        
                    
            })

     })
 
 //deleting fault button when clicked
 const deleteFaultBtn = document.getElementById("deleteFaultBtn");
 
 deleteFaultBtn.addEventListener("click",() =>{
    let form = document.querySelector(".deleteForm");
    form.submit();
 })
           
   

const closebtn3 = document.getElementById("close3");

closebtn3.addEventListener("click",() =>{
    const tableRows = document.querySelectorAll(".tableRow");

    tableRows.forEach((row) => {
        row.remove();
    })

    const List_ids = document.getElementById("list_ids2");
    List_ids.value = "";

    deleteForm.style.display = "none";
})




const cancelBtn3 = document.getElementById("CancelBtn3");

cancelBtn3.addEventListener("click",() =>{
    const tableRows = document.querySelectorAll(".tableRow");

    tableRows.forEach((row) => {
        row.remove();
    })
    
    const List_ids = document.getElementById("list_ids2");
    List_ids.value = "";

    deleteForm.style.display = "none";
})

/*---------------------------------------------------------------------------------------------------------------*/
//Remarking a fault

const remarkBtn = document.getElementById("remarkBtn");
const RemarkForm = document.querySelector(".RemarkForm");

remarkBtn.addEventListener("click",(e) =>{
    RemarkForm.style.display = "block";
    let table = document.querySelectorAll(".ListFaults #tableRow");
    let tbody = document.querySelector(".RemarkTable");
    let array;
    
    table.forEach((element) => {
        let row = document.createElement("tr");
            row.style.fontSize = "smaller";
            row.className = "tableRow";
        let checkbox = element.firstElementChild.firstElementChild;
        
        
        if(checkbox.checked == true){
            let id = element.firstElementChild.nextElementSibling;
            let date = element.firstElementChild.nextElementSibling.nextElementSibling;
            let description = element.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
            
            array = id.textContent+", "+description.textContent+", "+date.textContent; 
            let user = sessionStorage.getItem("username");
            console.log(user);
            
            const remark_array = document.getElementById("remark_array");
            remark_array.value = user+", " + array;
            console.log(remark_array.value);
            
        }

        if(element.firstElementChild.firstElementChild.checked == true){

                    let id = document.createElement("td");
                    let category = document.createElement("td");
                    let description = document.createElement("td");
                    let location = document.createElement("td");
                    let technician = document.createElement("td");

                    let child = element.firstElementChild.nextElementSibling;
                    id.textContent = child.innerHTML;
                    row.appendChild(id);
                   
                    category.textContent = child.nextElementSibling.nextElementSibling.innerHTML;
                    row.appendChild(category);
                    
                    description.textContent = child.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
                    row.appendChild(description);
                    
                    location.textContent = child.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
                    row.appendChild(location);

                    technician.textContent = child.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
                    row.appendChild(technician);


                    tbody.appendChild(row);
                    

                

        }


            
            
            
        
    })
   
    
})

const RemarkFaultBtn = document.getElementById("RemarkFaultBtn");
 
RemarkFaultBtn.addEventListener("click",() =>{
   let form = document.querySelector(".RemarkForm");
   form.submit();
})
          
  

const closebtn5 = document.getElementById("close5");

closebtn5.addEventListener("click",() =>{
   const tableRows = document.querySelectorAll(".tableRow");

   tableRows.forEach((row) => {
       row.remove();
   })

   const List_ids = document.getElementById("remark_array");
   List_ids.value = "";

   RemarkForm.style.display = "none";
})




const cancelBtn5 = document.getElementById("CancelBtn5");

cancelBtn5.addEventListener("click",() =>{
   const tableRows = document.querySelectorAll(".tableRow");

   tableRows.forEach((row) => {
       row.remove();
   })
   
   const List_ids = document.getElementById("remark_array");
   List_ids.value = "";

   RemarkForm.style.display = "none";
})