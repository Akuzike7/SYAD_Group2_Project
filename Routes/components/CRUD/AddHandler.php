<?php
    require "../../core/database.php";
    require "../../core/faults.php";


    $category = $_POST["category"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $phone = $_POST["Phone"];
    session_start();
    $user = $_SESSION["user_id"];

    if(!empty($category) && !empty($description) && !empty($location) && !empty($phone)){
        

        $fault = new faults;
        $fault->reportFault($category,$description,$location,$phone,$user);
        
    }