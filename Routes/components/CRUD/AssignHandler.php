<?php
    require_once "../../core/database.php";
    require_once "../../core/UserFault.php";


    $technician = $_POST["technician"];
    $ids = explode(" ",$_POST["list_id"]);

    if(!empty($technician)){
        $fault = new UserFault;

        try{

            foreach($ids as $id){
                $fault->assignTechnician($id,$technician);
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        
        
    }
