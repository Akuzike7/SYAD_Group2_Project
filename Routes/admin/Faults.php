<?php
    require "../components/AutoLoader.php";
    
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
    <title>Faults</title>
</head>
<body>
   <?php require_once "../components/Header.php" ?>
   <?php require_once "../admin/faults.php"?>
    
    <div class="mainContent">
       
        <!--Left side panel-->
        <div class="LsideFault">
            
           <div class="tileL">

               <h4 class="tileTitle">Total Faults</h4>

               <div class="faultCat">

                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/graph_report_48px.png" width="20px" alt="" srcset="">
                           <h4>Reported</h4>
                       </div>
                       <h4>25</h4>
                   </div>
                   
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/analytics_48px.png" width="20px" alt="" srcset="">
                           <h4>Reported Today</h4>
                       </div>
                       <h4>13</h4>
                   </div>
              
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/task_completed_48px.png" width="20px" alt="" srcset="">
                           <h4>Resolved</h4>
                        </div>
                   <h4>9</h4>
                   </div>
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/work_authorisation_48px.png" width="20px" alt="" srcset="">
                           <h4>Resolved Today</h4>
                        </div>
                   <h4>3</h4>
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
                        <h4>17</h4>
                    </div> 
                    
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/voltage_24px.png" width="20px" alt="" srcset="">
                            <h4>Electronic</h4>
                        </div>
                        <h4>9</h4>
                    </div>
                
                  <div class="tileStat">
                      <div class="tileItem">
                          <img src="../../Images/welder_shield_24px.png" width="20px" alt="" srcset="">
                          <h4>Welding</h4>
                      </div>
                      <h4>28</h4>
                  </div>

                  <div class="tileStat">
                      <div class="tileItem">
                          <img src="../../Images/construction_carpenter_ruler_24px.png" width="20px" alt="" srcset="">
                          <h4>Carpentry</h4>
                      </div>
                      <h4>4</h4>
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
                                $user = new user;
                                $rows = $faults->getFaults();
                            ?>
                            <?php foreach($rows as $row):?>
                            <?php
                                $name = $row["firstname"]." ".$row["lastname"];
                                $tech = $user->getUserName($rows["a.id"]);
                            ?>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx"></td>
                                <td><?php echo $row["id"]?></td>
                                <td><?php echo $row["Date_Reported"]?></td>
                                <td><?php echo $row["category"]?></td>
                                <td><?php echo $row["description"]?></td>
                                <td><?php echo $row["location"]?></td>
                                <td><?php echo $row["technician"]?></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $row["phone"]?></td>
                                <td><?php echo $row["Status"]?></td>
                            </tr>

                            <?php endforeach?>
                            
                       
                      
    
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

                <button class="navLink" id="assignTech" disabled>Assign Technician
                    <img src="../../Images/worker_24px.png">
                </button>

                <button class="navLink" id="remark">Remark
                    <img src="../../Images/feedback_48px.png" width="24px" >
                </button>

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

                <button class="navLink" id="Remarked-faults">All Faults
                    <img src="../../Images/maintenance_48px.png" width="24px" >
                </button>

            </div>
           </div> 
           
    </div>

    <script src="../../javascript/fault.js"></script>
</body>
</html>