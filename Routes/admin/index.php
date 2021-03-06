<?php
    require "../components/AutoLoader.php";
    
    
    if(isset($_POST['logout'])){
    
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
    <link rel="stylesheet" href="../../Style/style.css">
    <link rel="stylesheet" href="../../Style/Remarks.css">
    <link rel="stylesheet" href="../../Style/responsive.css">
    <link rel="stylesheet" href="../components/style/Header.css">
    <script src="../../Chart.js-3.6.2/package/dist/chart.js"></script>
    <script src="../../javascript/jquery-3.6.0.min.js"></script>

    <title>Dashboard-admin</title>
</head>
<body id="body">
    <?php require_once "../components/Header.php";?>
    
    <div class="mainContent">
         <!--Left side panel-->
         <div class="LeftPanel">

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

            $categoryMonthlyFaults;

            
            $categoryMonthlyFaults = $faultsStats->sumCurrentMonthCategoryFaults(1);
            $months["plumbing"]  = $categoryMonthlyFaults["month"];

            $categoryMonthlyFaults = $faultsStats->sumCurrentMonthCategoryFaults(2);
            $months["electronic"]  = $categoryMonthlyFaults["month"];

            $categoryMonthlyFaults = $faultsStats->sumCurrentMonthCategoryFaults(3);
            $months["general"]  = $categoryMonthlyFaults["month"];

            $categoryMonthlyFaults = $faultsStats->sumCurrentMonthCategoryFaults(4);
            $months["welding"]  = $categoryMonthlyFaults["month"];

            $categoryMonthlyFaults = $faultsStats->sumCurrentMonthCategoryFaults(5);
            $months["carpentry"]  = $categoryMonthlyFaults["month"];
               
                
         
            $currentMonth = $faultsStats->getCurrentMonth();
            
            $monthlyFault = $faultsStats->sumMonthlyFaults(1);
            $monthy["january"] = $monthlyFault["month"];
            
            $monthlyFault = $faultsStats->sumMonthlyFaults(2);
            $monthy["february"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(3);
            $monthy["march"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(4);
            $monthy["april"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(5);
            $monthy["may"] = $monthlyFault["month"];

            $monthlyFault["june"] = $faultsStats->sumMonthlyFaults(6);
            $monthy["june"] = $monthlyFault["month"];

            $monthlyFaults = $faultsStats->sumMonthlyFaults(7);
            $monthy["july"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(8);
            $monthy["august"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(9);
            $monthy["september"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(10);
            $monthy["october"] = $monthlyFault["month"];

            $monthlyFault= $faultsStats->sumMonthlyFaults(11);
            $monthy["november"] = $monthlyFault["month"];

            $monthlyFault = $faultsStats->sumMonthlyFaults(12);
            $monthy["december"] = $monthlyFault["month"];
            

            $userStats = new user;
            $totalAdminstrators = $userStats->sumUsers(1);
            $totalStudents = $userStats->sumUsers(2); 
            $totalLectures = $userStats->sumUsers(3);
            $totalTechnicians = $userStats->sumUsers(4);

            $userFaultsStats = new UserFault;
            $totalAdminstratorsFaults = $userFaultsStats->sumUserFaults(1);
            $totalStudentsFaults = $userFaultsStats->sumUserFaults(2); 
            $totalLecturesFaults = $userFaultsStats->sumUserFaults(3);
            $totalTechniciansFaults = $userFaultsStats->sumUserFaults(4);

            
            
           
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
                           <h4>Wielding</h4>
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

        <div class="CenterPanel">
            <div class="CRight">
            <div class="notifications">
                    <h4 class="tileTitle">Dashboard</h4>

                    <div class="tileStat">
                        <div class="tileItem">
                        <?php
                                require_once "../components/AutoLoader.php";
                                $unremarked = new faults; 
                                $unremarked = $unremarked->getRemarkedFaults();
                                
                            ?>
                            <img src="../../Images/online_maintenance_portal_48px.png" width="20px" alt="" srcset="">
                            <h4>Remarks</h4>
                        </div>
                        <h4><?php print_r($unremarked[0][0]["total"])?></h4>
                    </div> 
                    <div class="tileStat">
                        <div class="tileItem">
                            <?php
                                require_once "../components/AutoLoader.php";
                                $unresolved = new faults; 
                                $unresolved = $unresolved->getUnresolvedFaults24();
                                
                            ?>
                            <img src="../../Images/error_48px.png" width="20px" alt="" srcset="">
                            <h4>Faults not resolved in 24hrs</h4>
                        </div>
                        <h4><?php echo $unresolved[0][0]["total"]?></h4>
                    </div> 
                    <div class="dashBtns">
                        <button class="dashboardBtn" id="Unassigned_faults">Unassigned Faults</button>
                        <button class="dashboardBtn" id="Unresolved_faults">Unresolved Faults</button>
                        <button class="dashboardBtn">Generate Report</button>
                        
                    </div>
                </div>
                

                <div class="LineChart">
                    <canvas id="myChart2" ></canvas>
                    <script>
                       let months = <?php  echo $monthy = json_encode($monthy)?>;
                       
                        //setup
                        const data2 ={
                            labels:['January','February','March','April','May','June','July','August','September','October','November','December'],
                                    datasets:[
                                        { 
                                            label:"Faults Reported Monthly",
                                            data:[months["january"],months["february"],months["march"],months["april"],months["may"],months["june"],months["july"],months["august"],months["september"],months["october"],months["november"],months["december"]],
                                            backgroundColor:'rgb(64, 137, 233)',
                                        }
                                    ]
                                
                        }
        
                        //config block
                        const config2={
                            type:'line',
                                data:data2,
                            options:{ 
                                
                                responsive: true,
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Faults Reported Monthly'
                                    },
                                    legend: {
                                        display:false,
                                    }
                                },
                                maintainAspectRatio:false,
                                   
                                    scale:{
                                        y:{
                                            beginAtZero: true,
                                        }
                                    }
                                }
                        }
                        //init / render block
                        const myChart2 = document.getElementById('myChart2');
        
                        const massPopChart2 = new Chart(myChart2,config2);
                               
                                    
                               
                                
        
                    </script>
                   </div>
            </div>
            <div class="CLeft">
            <div id="Overdue">
                    <table id="overdueTable">
                        <caption class="ListFaultTitle">Overdue Tasks</caption>
                        <tr id="overdueHead">
                            <th>id</th>
                            <th>Fault</th>
                            <th>Technician</th>
                            <th>Overdue</th>
                        </tr>
                        <?php foreach($unresolved[1] as $fault):?>
                        <tr>
                            <td><?php echo $fault["fault_id"]?></td>
                            <td><?php echo $fault["description"]?></td>
                            <td><?php echo $fault["firstname"]." ".$fault["lastname"]?></td>
                            <td><?php echo $fault["overdue"]?></td>
                        </tr>
                        <?php endforeach?>
                       
                        
                        
                       
                        
                    </table>
                    
                </div>
                <div class="Barchart">
                    <canvas id="myChart" ></canvas>
                    <script>
                        let category= <?php 
                                echo $months = json_encode($months)
                             ?>;
                        let month = <?php echo json_encode($currentMonth["month"])?>;

                        //setup
                        const data ={
                            labels:['Plumbing','Electronic','General','Welding','Carpentry'],
                                    datasets:[
                                        { 
                                            label:"Faults Reported "+month,
                                            data:[category["plumbing"],category["electronic"],category["general"],category["welding"],category["carpentry"]],
                                            backgroundColor:'rgb(64, 137, 233)',
                                        }
                                    ]
                                
                        }
    
                        //config block
                        const config={
                            type:'bar',
                                data,
                            options:{ 
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Faults Reported '+month,
                                        },
                                        legend: {
                                            display:false,
                                        }
                                    },
                                    maintainAspectRatio:false,
                                    scale:{
                                        y:{
                                            
                                            beginAtZero: true,
                                        }
                                    },
                                    
                                    
                                }
                        }
                        //init / render block
                        const myChart = document.getElementById('myChart');
    
                        const massPopChart = new Chart(myChart,config);
                               
                                    
                               
                                
     
                    </script>
            </div>
           
            
            
            </div>
           

        </div>
        <div class="RightPanel">
            <div class="tileL">
 
                <h4 class="tileTitle">Total Users</h4>
 
                <div class="faultCat">
 
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/student_male_48px.png" width="20px" alt="" srcset="">
                            <h4>Students</h4>
                        </div>
                        <h4><?php echo $totalStudents[0] ?></h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/workers_48px.png" width="20px" alt="" srcset="">
                            <h4>Technicians</h4>
                        </div>
                        <h4><?php echo $totalTechnicians[0] ?></h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/lecturer_48px.png" width="20px" alt="" srcset="">
                            <h4>Lecturers</h4>
                        </div>
                        <h4><?php echo $totalLectures[0] ?></h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/administrator_male_48px.png" width="20px" alt="" srcset="">
                            <h4>Adminstrators</h4>
                        </div>
                        <h4><?php echo $totalAdminstrators[0] ?></h4>
                    </div>
              </div>
            </div>
            <div class="tileL">
 
                <h4 class="tileTitle">Faults Reported</h4>
 
                <div class="faultCat">
 
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/student_male_48px.png" width="20px" alt="" srcset="">
                            <h4>Students</h4>
                        </div>
                        <h4><?php echo $totalStudentsFaults[0]?></h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/workers_48px.png" width="20px" alt="" srcset="">
                            <h4>Technicians</h4>
                        </div>
                        <h4><?php echo $totalTechniciansFaults[0]?></h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/lecturer_48px.png" width="20px" alt="" srcset="">
                            <h4>Lecturers</h4>
                        </div>
                        <h4><?php echo $totalLecturesFaults[0]?></h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/administrator_male_48px.png" width="20px" alt="" srcset="">
                            <h4>Adminstrators</h4>
                        </div>
                        <h4><?php echo $totalAdminstratorsFaults[0]?></h4>
                    </div>
              </div>
            </div>
        </div>
        
    </div>
    <script src="../../javascript/app.js" defer></script>
</body>
</html>