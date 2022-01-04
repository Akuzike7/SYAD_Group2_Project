<?php

class UserFault extends database{
    private $user;
    private $technician;
    private $fault;

    //getting faults reported by specific user
   public function getUserFaults($table,$user_id){
    $this->query = $this->checkConnection()->prepare("SELECT * FROM :table WHERE user_id = :user_id;");
    $result = $this->query;

    try{
         $result->execute(["table"=>$table,"user_id"=>$user_id]);
         $row = $result->fetchAll();
         return $row;
    }
    catch(PDOException $e){
         return "Failed to user faults ".$e->getMessage();
    }
     
}

   //assigning technician
   public function assignTechnician($id,$technician){
    $this->query = $this->checkConnection()->prepare("INSERT INTO fault_Technician(`fault_id`,`technician_id`) VALUES(:id,:technician);");
    $result = $this->query;
        
   try{
        $result->execute(["id"=>$id,"technician"=>$technician]);
        return true;
   }
   catch(PDOException $e){
        return "Failed to assign technician ".$e->getMessage();
   }
    
}

}