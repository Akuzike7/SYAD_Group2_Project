<?php
    require_once "../components/AutoLoader.php";

    if(isset($_POST['logout'])){
        echo "it works";
        session_unset();
        session_destroy();
        header("Location:\SYAD_Group2_Project\Routes\index.php ");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/style/Header.css">
    <link rel="stylesheet" href="../../Style/style.css">
    <link rel="stylesheet" href="../../Style/Fault_Form.css">
    <script src="../../javascript/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(() => {
           
            $("#Resolved-faults").click(() =>{
                let id = sessionStorage.userId;
                $(".faults").load("../components/TableAutoLoad2.php",{
                    action : '1',
                    userId : id
                });
            });
            $("#Unresolved-faults").click(() =>{
                let id = sessionStorage.userId;
                $(".faults").load("../components/TableAutoLoad2.php",{
                    action : '2',
                    userId : id 
                });
            });
           
            $("#All-faults").click(() =>{
                let id = sessionStorage.userId;
                $(".faults").load("../components/TableAutoLoad2.php",{
                    action : '3',
                    userId : id
                }); 
            });
            
           
        })

        
        
    </script>
    <title>Faults</title>
</head>
<body>
   <?php require_once "../components/Header.php" ?>
    
    <div class="mainContent">
       
        <!--Left side panel-->
        <div class="LsideFault">
          <?php
            $faultsStats = new UserFault;
            $user_id = $_SESSION["user_id"];

            $totalReported = $faultsStats->sumUserFaultsReported($user_id);
            $totalResolved = $faultsStats->sumUserFaultsResolved($user_id);
            $totalReportedToday = $faultsStats->sumUserFaultsReportedToday($user_id);
            $totalResolvedToday = $faultsStats->sumUserFaultsResolvedToday($user_id);

            $totalPlumbingFaults = $faultsStats->sumUserFaultsReportedByCategory(1,$user_id);
            $totalElectronicFaults = $faultsStats->sumUserFaultsReportedByCategory(2,$user_id);
            $totalGeneralFaults = $faultsStats->sumUserFaultsReportedByCategory(3,$user_id);
            $totalWeldingFaults = $faultsStats->sumUserFaultsReportedByCategory(4,$user_id);
            $totalCarpentryFaults = $faultsStats->sumUserFaultsReportedByCategory(5,$user_id);

           
          ?>  
           <div class="tileL">

               <h4 class="tileTitle">Total Faults</h4>

               <div class="faultCat">

                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/graph_report_48px.png" width="20px" alt="" srcset="">
                           <h4>Reported</h4>
                       </div>
                       <h4><?php echo $totalReported[0] ?></h4>
                   </div>
                   
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/analytics_48px.png" width="20px" alt="" srcset="">
                           <h4>Reported Today</h4>
                       </div>
                       <h4><?php echo $totalReportedToday[0] ?></h4>
                   </div>
              
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/task_completed_48px.png" width="20px" alt="" srcset="">
                           <h4>Resolved</h4>
                        </div>
                   <h4><?php echo $totalResolved[0] ?></h4>
                   </div>
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/work_authorisation_48px.png" width="20px" alt="" srcset="">
                           <h4>Resolved Today</h4>
                        </div>
                   <h4><?php echo $totalResolvedToday[0] ?></h4>
                   </div>
               </div>
           </div>

           <div class="tileR">

               <h4 class="tileTitle">Fault Category</h4>

                <div class="faultCat"> 

                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/pipelines_24px.png" width="20px" alt="" srcset="">
                            <h4>Plummbing</h4>
                        </div>
                        <h4><?php echo $totalPlumbingFaults[0] ?></h4>
                    </div> 
                    
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/voltage_24px.png" width="20px" alt="" srcset="">
                            <h4>Electronic</h4>
                        </div>
                        <h4><?php echo $totalElectronicFaults[0] ?></h4>
                    </div>
                
                  <div class="tileStat">
                      <div class="tileItem">
                          <img src="../../Images/welder_shield_24px.png" width="20px" alt="" srcset="">
                          <h4>Welding</h4>
                      </div>
                      <h4><?php echo $totalWeldingFaults[0] ?></h4>
                  </div>

                  <div class="tileStat">
                      <div class="tileItem">
                          <img src="../../Images/construction_carpenter_ruler_24px.png" width="20px" alt="" srcset="">
                          <h4>Carpentry</h4>
                      </div>
                      <h4><?php echo $totalCarpentryFaults[0] ?></h4>
                  </div>

                  <div class="tileStat">
                      <div class="tileItem">
                          <img src="../../Images/wrench_48px.png" width="20px" alt="" srcset="">
                          <h4>General</h4>
                      </div>
                      <h4><?php echo $totalGeneralFaults[0] ?></h4>
                  </div>
              </div>
              
               <form method="POST" class="LogoutForm" >
                <button class="LogoutBtn" type="submit" name="logout" style="width: 100%;">
                    Logout
                </button>

            </form>
           </div>

            
        </div>
        <!--Center where faults are listed--> 
        
            <div class="faults">
                    <?php 
                        require_once "../components/AddFault.php";
                        require_once "../core/UserFault.php";
                    ?>
                    
                      
                    <table class="ListFaults">

                            <caption class="ListFaultTitle">Fault Activity Section</caption>
                            <tr id="header">
                                <th id="selectAll"><input type="checkbox" name="" id="selectRadio" value="1"></th>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Technician</th>
                                <th>Reported by</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            <?php 
                                $faults = new UserFault;
                                $user_id = $_SESSION["user_id"];
                                $Tables = $faults->getUserFaults($user_id);
                               
                            ?>
                            <?php if($Tables):?>
                               
                            <?php foreach($Tables[0] as $row):?>
                            
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id="<?php echo $row["id"]?>"></td>
                                <td><?php echo $row["id"]?></td>
                                <td><?php echo $row["date_created"]?></td>
                                <td><?php echo $row["category"]?></td>
                                <td><?php echo $row["description"]?></td>
                                <td><?php echo $row["location"]?></td>
                                <td><?php
                                        foreach($Tables[1] as $row2){
                                            
                                            if($row["id"] == $row2["fault_id"]){
                                                echo $row2["firstname"]." ".$row2["lastname"];
                                            }
                                        }
                                 ?>
                                </td>
                                <?php
                                     $name = $row["firstname"]." ".$row["lastname"];
                                ?>
                                <td><?php echo $name?></td>
                                <td><?php echo $row["phone"]?></td>
                                <td><?php echo $row["status"]?></td>
                            </tr>

                            <?php endforeach?>
                            <?php endif?>
                       
                      
    
                    </table>
                </div>
                

      <!--Right side Panel-->      
           <div class="tileLink">

            <h4 class="tileTitle">Options</h4>

            <div class="tileOptions">

                <button class="navLink" id="add">Add
                    <img src="../../Images/add_24px.png">
                </button>        
              

            </div>
            <hr class="hrule" style="margin-top: 20px; margin-bottom: 10px;">
            <h4 class="tileTitle" style="margin-top: 10px;">Groupings</h4>

            <div class="tileOptions">

                <button class="navLink" id="Resolved-faults">Resolved Faults
                    <img src="../../Images/task_completed_48px.png" width="24px" >
                </button>

                <button class="navLink" id="Unresolved-faults">Unresolved Faults
                    <img src="../../Images/toolbox_48px.png" width="24px" >
                </button>

                <button class="navLink" id="All-faults">All Faults
                    <img src="../../Images/maintenance_48px.png" width="24px" >
                </button>

            </div>
           </div> 
           
    </div>

    <script>

        sessionStorage.setItem("userId",<?php echo $_SESSION["user_id"] ?>);
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

    const List_ids = document.getElementById("list_ids");
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
    </script>
</body>
</html>