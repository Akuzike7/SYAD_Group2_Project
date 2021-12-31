<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/style.css">
    <link rel="stylesheet" href="../../Style/Fault_Form.css">
    <title>Faults</title>
</head>
<body>
    <nav class="navBar">

        <div class="Logo">
            <img src="../../Images/Must_Logo.png" width="40px">
            <div class="LogoTitle">
                <h2>Maintenance Portal</h2>
               <div>
                   <h4>Akuzike Nchembe</h4>
                   <h4>Student</h4>  
               </div>
                
            </div>
        </div>
        
        <div class="navLinks">
            <a class="navLink" href="./index.php">Dashboard</a>
            <a class="navLink" href="./Remarks.php">Remarks</a>
            <a class="navLink" href="./Report.php">Reports</a>
            

        </div>

    </nav>
    
    <div class="mainContent">
       
        <!--Left side panel-->
        <div class="LsideFault">
            
           <div class="tileL">

               <h4 class="tileTitle">Total Faults</h4>

               <div class="faultCat">

                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/analytics_48px.png" width="20px" alt="" srcset="">
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
                           <img src="../../Images/maintenance_48px.png" width="20px" alt="" srcset="">
                           <h4>Resolved</h4>
                        </div>
                   <h4>9</h4>
                   </div>
                   <div class="tileStat">
                       <div class="tileItem">
                           <img src="../../Images/maintenance_48px.png" width="20px" alt="" srcset="">
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
        
            <form action="" method="POST" class="faults">
                    <div class="addForm">

                        <button class="close" id="close">&times;</button>
                        <h3 id="title">Report Fault</h3>

                        <div class="addTable">
                            <div class="formheader">
                                <h4>Id</h4>
                                <h4>Category</h4>
                                <h4>Description</h4>
                                <h4>Location</h4>
                                <h4>Phone</h4>
                            </div>

                        </div>

                        <label class="formLabel" for="category">Category</label>
                        <select name="category" id="category">
                            <option class="optCategory" value="Plumbing">Plumbing</option>
                            <option class="optCategory" value="Electronic">Electronic</option>
                            <option class="optCategory" value="Welding">Welding</option>
                            <option class="optCategory" value="Carpentry">Carpentry</option>
                        </select>
                        <label class="formLabel" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="2"></textarea>
                        <label class="formLabel" for="Location">Location</label>
                        <input type="text" name="location" id="Location">
                        <label class="formLabel" for="Phone">Phone</label>
                        <input type="text" name="Phone" id="Phone">
                        <button class="formBtn" id="addBtn"><img src="../../Images/add_list_48px.png" width="15px" alt="" srcset=""></button>
                        <button class="formBtn" id="ReportBtn" type="submit">Report</button>
                    </div>

                    <div class="assignForm">
                        <button class="close" id="close4">&times;</button>
                        <h3 id="title">Assign Technician</h3>
                        <table id="assignTable">
                            <tr id="header">
                                <th>Id</th>
                                <th>Category</th>
                                <th>Description</th>
                            </tr>

                        </table>
                        <label class="formLabel" for="category">Technician</label>
                        <select name="category" id="category">
                            <option class="optCategory" value="Plumbing">Plumbing</option>
                            <option class="optCategory" value="Electronic">Electronic</option>
                            <option class="optCategory" value="Welding">Welding</option>
                            <option class="optCategory" value="Carpentry">Carpentry</option>
                        </select>
                        <button class="formBtn"id="assignBtn"><img src="../../Images/add_list_48px.png" width="15px" alt="" srcset=""></button>
                        <button class="formBtn"id="assignFaultBtn" type="submit">Assign</button>
                    </div>

                    <div class="updateForm"></div>
                    <div class="deleteForm"></div>
                    
                      
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
                            
                        
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx"></td>
                                <td>1</td>
                                <td>6-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>2</td>
                                <td>8-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>3</td>
                                <td>3-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>4</td>
                                <td>18-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>5</td>
                                <td>9-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>6</td>
                                <td>20-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                            <tr id="tableRow">
                                <td id="select"><input type="checkbox" name="selectionBx" id=""></td>
                                <td>7</td>
                                <td>12-Dec-2021</td>
                                <td>Plumbing</td>
                                <td>Broken urinal</td>
                                <td>Hall 3 Floor 2</td>
                                <td>Tech</td>
                                <td>Akuzike Nchembe</td>
                                <td>0882888136</td>
                                <td>pending</td>
                            </tr>
                       
                      
    
                    </table>
                </form>
                

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

            </div>
           </div> 
           
    </div>

    <script src="../../javascript/app.js"></script>
</body>
</html>