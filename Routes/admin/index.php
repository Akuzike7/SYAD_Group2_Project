
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
    <title>Dashboard-admin</title>
</head>
<body id="body">
    <?php require_once "../components/Header.php";?>
    
    <div class="mainContent">
         <!--Left side panel-->
         <div class="LeftPanel">
            
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
                         <h4>9</h4>
                     </div> 
                     
                     <div class="tileStat">
                         <div class="tileItem">
                             <img src="../../Images/voltage_24px.png" width="20px" alt="" srcset="">
                             <h4>Electronic</h4>
                         </div>
                         <h4>12</h4>
                     </div>
                 
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/welder_shield_24px.png" width="20px" alt="" srcset="">
                           <h4>Wielding</h4>
                       </div>
                       <h4>15</h4>
                   </div>
 
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/construction_carpenter_ruler_24px.png" width="20px" alt="" srcset="">
                           <h4>Carpentry</h4>
                       </div>
                       <h4>3</h4>
                   </div>
                  
               </div>
               
            </div>

            <button class="LogoutBtn" onclick="navigate('../index.php')">
                Logout
            </button>
            
         </div>    

        <div class="CenterPanel">
            <div class="CRight">

                <div class="notifications">
                    <h4 class="tileTitle">Notifications</h4>

                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/online_maintenance_portal_48px.png" width="20px" alt="" srcset="">
                            <h4>Remarks</h4>
                        </div>
                        <h4>9</h4>
                    </div> 
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/error_48px.png" width="20px" alt="" srcset="">
                            <h4>Faults not resolved in 24hrs</h4>
                        </div>
                        <h4>9</h4>
                    </div> 
                    <div class="dashBtns">
                        <button class="dashboardBtn">Unassigned Faults</button>
                        <button class="dashboardBtn">Unresolved Faults</button>
                        <button class="dashboardBtn">Generate Report</button>
                        
                    </div>
                </div>

                <div class="LineChart">
                    <canvas id="myChart2" ></canvas>
                    <script>
        
                        //setup
                        const data2 ={
                            labels:['January','February','March','April','May','June','July','August','September','October','November','December'],
                                    datasets:[
                                        { 
                                            label:"Faults Reported Monthly",
                                            data:[4,5,3,9,5,6,2,9,15,25,11,23],
                                            backgroundColor:'rgb(64, 137, 233)',
                                        }
                                    ]
                                
                        }
        
                        //config block
                        const config2={
                            type:'line',
                                data:data2,
                            options:{ 
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
                <div class="Barchart">
                    <canvas id="myChart" ></canvas>
                    <script>
    
                        //setup
                        const data ={
                            labels:['Plumbing','Electronic','Wielding','Carpentry'],
                                    datasets:[
                                        { 
                                            label:"Faults Reported December",
                                            data:[9,12,15,3],
                                            backgroundColor:'rgb(64, 137, 233)',
                                        }
                                    ]
                                
                        }
    
                        //config block
                        const config={
                            type:'bar',
                                data,
                            options:{ 
                                
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
                        <h4>1500</h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/workers_48px.png" width="20px" alt="" srcset="">
                            <h4>Technicians</h4>
                        </div>
                        <h4>250</h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/lecturer_48px.png" width="20px" alt="" srcset="">
                            <h4>Lecturers</h4>
                        </div>
                        <h4>50</h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/administrator_male_48px.png" width="20px" alt="" srcset="">
                            <h4>Adminstrators</h4>
                        </div>
                        <h4>3</h4>
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
                        <h4>150</h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/workers_48px.png" width="20px" alt="" srcset="">
                            <h4>Technicians</h4>
                        </div>
                        <h4>50</h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/lecturer_48px.png" width="20px" alt="" srcset="">
                            <h4>Lecturers</h4>
                        </div>
                        <h4>30</h4>
                    </div>
                    <div class="tileStat">
                        <div class="tileItem">
                            <img src="../../Images/administrator_male_48px.png" width="20px" alt="" srcset="">
                            <h4>Adminstrators</h4>
                        </div>
                        <h4>39</h4>
                    </div>
              </div>
            </div>
        </div>
        
    </div>
    <script src="../../javascript/app.js" defer></script>
</body>
</html>