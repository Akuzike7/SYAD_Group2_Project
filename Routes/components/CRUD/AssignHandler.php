<?php
    require_once "../../core/database.php";
    require_once "../../core/UserFault.php";


    $technician = $_POST["technician"];
    $ids = explode(" ",$_POST["list_id"]);

    if(!empty($technician)){
        $fault = new UserFault;

        foreach($ids as $id){
            $fault->assignTechnician($id,$technician);

        }

        
        
    }

    return header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Faults.php");