<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/style.css">
    <link rel="stylesheet" href="../components/style/Header.css">
    <title>Report</title>
    <script src="../../Chart.js-3.6.2/package/dist/chart.js"></script>
    <script src="../../javascript/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <?php
         require_once "../components/Header.php";
         require_once "../components/AutoLoader.php";
    ?>

    <div class="Report">
        
        <div class="ReportTitle">
            <h3>Report</h3>
        </div>
        <div>
            <?php
                $faultsStats = new faults;

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

                $weeks = $faultsStats->getCurrentWeekCategoryFaults(1);
                $week["plumbing"] = $weeks["week"];

                $weeks = $faultsStats->getCurrentWeekCategoryFaults(2);
                $week["electronic"] = $weeks["week"];

                $weeks = $faultsStats->getCurrentWeekCategoryFaults(3);
                $week["general"] = $weeks["week"];

                $weeks = $faultsStats->getCurrentWeekCategoryFaults(4);
                $week["welding"] = $weeks["week"];

                $weeks = $faultsStats->getCurrentWeekCategoryFaults(5);
                $week["carpentry"] = $weeks["week"];
                
                
            ?>
            <div class="ReportGraphs">

                <div class="ReportBarchart">
                        <canvas id="myChart" ></canvas>
                        <script>
                            let category= <?php 
                                    echo $week = json_encode($week);
                                 ?>;
                            
                            //setup
                            const data ={
                                labels:['Plumbing','Electronic','General','Welding','Carpentry'],
                                        datasets:[
                                            { 
                                                label:"Faults Reported ",
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
                                                text: 'Faults Reported Weekly ',
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
                <div class="ReportLinechart">
                        <canvas id="myChart2" ></canvas>
                        <script>
                            let monthly = false;
                                category= <?php 
                                    echo $week = json_encode($week);
                                 ?>;
                            
                            <?php
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
                            ?>
                            
            
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
                                    plugins: {
                                            title: {
                                                display: true,
                                                text: 'Faults Reported Monthly',
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
         
                        </script>
                </div>
            </div>
            <div class="ReportStats">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eligendi. Vitae, dolorum minima numquam officiis ex dolores non labore exercitationem earum aliquam perferendis aliquid nostrum quibusdam nulla aspernatur sequi hic!
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora neque commodi voluptates blanditiis, hic veniam soluta et doloremque aspernatur animi ipsa? Maxime reiciendis exercitationem doloremque itaque fuga, earum ab similique.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptates consequuntur dolore explicabo, consectetur officiis incidunt perferendis voluptatum dolorum, accusantium quis minus soluta, nihil obcaecati magni odit sit. Veritatis, dolorum.
                </p>
            </div>
            <div>
                <div class="ReportSummary">
                    <h3>Summary</h3>
                    <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eligendi. Vitae, dolorum minima numquam officiis ex dolores non labore exercitationem earum aliquam perferendis aliquid nostrum quibusdam nulla aspernatur sequi hic!
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora neque commodi voluptates blanditiis, hic veniam soluta et doloremque aspernatur animi ipsa? Maxime reiciendis exercitationem doloremque itaque fuga, earum ab similique.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptates consequuntur dolore explicabo, consectetur officiis incidunt perferendis voluptatum dolorum, accusantium quis minus soluta, nihil obcaecati magni odit sit. Veritatis, dolorum.
                    </p>
                </div>
            </div>
            <div style="display: flex;justify-content: flex-end;">
                <div class="ReportBtns">
                    <button class="ReportBtn">Print</button>
                </div>
            </div>
        </div>

    </div>
</body>
</html>