<?php
    require_once "../../core/database.php";
    require_once "../../core/remark.php";

    $remarkId = explode(",",$_POST["remark_array"]);
    $remarks = $_POST["remark"];
    
    $remark = new remark;
    
    try{
        $user_id = $remarkId[0];
        $fault_id = $remarkId[1];
        
        print_r($user_id);
        
        $remark->makeRemark($user_id,$fault_id,$remarks);
        
    }
    catch(Exception $e){
        return $e->getMessage();
    }

?>