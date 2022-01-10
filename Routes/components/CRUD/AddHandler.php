<?php
    require "../../core/database.php";
    require "../../core/faults.php";

    session_start();
    $user = $_SESSION["user_id"];
    
   

    if(!empty($_POST["category"]) && !empty($_POST["description"]) && !empty($_POST["location"]) && !empty($_POST["Phone"])){
        $category = $_POST["category"];
        $description = $_POST["description"];
        $location = $_POST["location"];
        $phone = $_POST["Phone"];

        $fault = new faults;
        $fault->reportFault($category,$description,$location,$phone,$user);
        
    }
    
    
    if(!empty($_POST["list_ids"])){
        
        $faults = $_POST["list_ids"];
        $rows = explode(",",$faults);
        array_pop($rows);

        foreach($rows as $row){
            $elements = explode("'",$row);

            $fault = new faults;
            
            $fault->reportFault($elements[0],$elements[1],$elements[2],$elements[3],$user);
           
        }

    }
    

    