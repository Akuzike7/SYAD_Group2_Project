<?php
    require_once "../../core/database.php";
    require_once "../../core/faults.php";

    $ids = explode(" ",$_POST["list_id"]);

    if(!empty($ids)){
        $fault = new faults;

        try{
           
            foreach($ids as $id){
                $fault->deleteFault($id);
                rsort($ids);
                array_pop($ids);
                echo($id);
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        
        
    }
