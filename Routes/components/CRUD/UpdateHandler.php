<?php
    print_r($_POST);

    if(!empty($category) && !empty($description) && !empty($location) && !empty($phone)){
        $fault = new faults();
        $fault->reportFault($category,$description,$location,$phone,$user);
        
    }