<?php
    require_once "../../core/database.php";
    require_once "../../core/faults.php";

    session_start();
    $user = $_SESSION["user_id"];
    

    if(!empty($_POST["id"]) && !empty($_POST["descript"]) && !empty($_POST["locate"]) && !empty($_POST["cate"]) && !empty($_POST["Status"])){
        
        $id = $_POST["id"];
        $category = $_POST["cate"];
        $description = $_POST["descript"];
        $location = $_POST["locate"];
        $status = $_POST["Status"];
        

        $fault = new faults();
        $fault->updateFault($id,$category,$description,$location,$status);
        
    }