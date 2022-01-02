<?php
    $technician = $_POST["technician"];
    $id = $_POST["id"];

    if(!empty($technician)){
        $fault = new faults;
        $fault->reportFault($category,$description,$location,$phone,$user);
        
    }