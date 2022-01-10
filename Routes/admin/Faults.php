<?php
    require_once "../components/AutoLoader.php";
   
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
            $("#Unassigned-faults").click(() =>{
                let userId = sessionStorage.getItem("user_id");
                $(".faults").load("../components/TableAutoLoad.php",{
                    action : '1',
                    userId : userId
                });
            });
            $("#Resolved-faults").click(() =>{
                let userId = sessionStorage.getItem("user_id");
                $(".faults").load("../components/TableAutoLoad.php",{
                    action : '2',
                    userId : userId
                });
            });
            $("#Unresolved-faults").click(() =>{
                let userId = sessionStorage.getItem("user_id");
                $(".faults").load("../components/TableAutoLoad.php",{
                    action : '3',
                    userId : userId
                });
            });
            $("#Remarked-faults").click(() =>{
                let userId = sessionStorage.getItem("user_id");
                $(".faults").load("../components/TableAutoLoad.php",{
                    action : '4',
                    userId : userId
                });
            });
            $("#All-faults").click(() =>{
                let userId = sessionStorage.getItem("user_id");
                console.log(userId);
                $(".faults").load("../components/TableAutoLoad.php",{
                    action : '5',
                    userId : userId
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
            $faultsStats = new faults;
            $totalReported = $faultsStats->sumFaultsReported();
            $totalResolved = $faultsStats->sumFaultsResolved();
            $totalReportedToday = $faultsStats->sumFaultsReportedToday();
            $totalResolvedToday = $faultsStats->sumFaultsResolvedToday();

            $totalPlumbingFaults = $faultsStats->sumFaultsReportedByCategory(1);
            $totalElectronicFaults = $faultsStats->sumFaultsReportedByCategory(2);
            $totalGeneralFaults = $faultsStats->sumFaultsReportedByCategory(3);
            $totalWeldingFaults = $faultsStats->sumFaultsReportedByCategory(4);
            $totalCarpentryFaults = $faultsStats->sumFaultsReportedByCategory(5);

           
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
               
           </div>

            
        </div>
        <!--Center where faults are listed--> 
        
            <div class="faults">
                    <?php require "../components/AddFault.php"?>
                    <?php require "../components/AssignFault.php"?>
                    <?php require "../components/UpdateFault.php"?>
                    <?php require "../components/DeleteFault.php"?>
                    <?php require "../components/RemarkFault.php"?>
                      
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
                                $faults = new faults;
                                $Tables = $faults->getFaults();
                               
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

                <button class="navLink" id="update" disabled>Update
                    <img src="../../Images/Update_24px.png" >
                </button>

                <button class="navLink" id="delete" disabled>Delete
                    <img src="../../Images/delete_trash_48px.png" width="24px">
                </button>
                <?php if($_SESSION["roleName"] == "Administrator"):?>
                <button class="navLink" id="assignTech" disabled>Assign Technician
                    <img src="../../Images/worker_24px.png">
                </button>

                <button class="navLink" id="remarkBtn" type="submit" disabled>Remark
                        <img src="../../Images/feedback_48px.png" width="24px" >
                </button>
                <?php endif?>  
              

            </div>
            <hr class="hrule" style="margin-top: 20px; margin-bottom: 10px;">
            <h4 class="tileTitle" style="margin-top: 10px;">Groupings</h4>

            <div class="tileOptions">

                <button class="navLink" id="Unassigned-faults">Unassigned Faults
                    <img src="../../Images/workers_48px.png" width="24px" >
                </button>

                <button class="navLink" id="Resolved-faults">Resolved Faults
                    <img src="../../Images/task_completed_48px.png" width="24px" >
                </button>

                <button class="navLink" id="Unresolved-faults">Unresolved Faults
                    <img src="../../Images/toolbox_48px.png" width="24px" >
                </button>

                <button class="navLink" id="Remarked-faults">Remarked Faults
                    <img src="../../Images/request_service_48px.png" width="24px" >
                </button>

                <button class="navLink" id="All-faults">All Faults
                    <img src="../../Images/maintenance_48px.png" width="24px" >
                </button>

            </div>
           </div> 
           
    </div>

    <script src="../../javascript/fault.js"></script>
</body>
</html>