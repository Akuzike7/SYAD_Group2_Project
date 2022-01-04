
<nav class="navBar">

        <div class="Logo">
            <img src="../../Images/Must_Logo.png" width="40px">
            <div class="LogoTitle">
                <h2>Maintenance Portal</h2>
               <div>
                   <h4>
                       <?php
                       session_start();
                            $user = $_SESSION["name"];
                            $roleName = $_SESSION["roleName"];
                            echo "$user";
                          
                       ?>
                   </h4>
                   <h4>
                       <?php
                           
                             echo "$roleName";
                            
                       ?>
                    </h4>  
               </div>
                
            </div>
            
        </div>
        
        <div class="navLinks">
            <a class="navLink" href="./index.php">Dashboard</a>
            <a class="navLink" href="./Faults.php">Faults</a>
            <a class="navLink" href="./Remarks.php">Remarks</a>
            <a class="navLink" href="./Report.php">Reports</a>

        </div>

    </nav>