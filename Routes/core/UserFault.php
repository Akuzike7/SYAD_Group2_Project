<?php

class UserFault extends database{
    private $user;
    private $technician;
    private $fault;

    //getting sum of faults reported by specific user
   public function sumUserFaults($user_id){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE user_id = :user_id;");
    $result = $this->query;

    try{
         $result->execute(["user_id"=>$user_id]);
         $row = $result->fetch();
         return $row;
    }
    catch(PDOException $e){
         return "Failed to user faults ".$e->getMessage();
    }
     
}

    //getting faults reported by specific user
   public function getUserFaults($user_id){
    $this->query = $this->checkConnection()->prepare("SELECT * FROM faults WHERE user_id = :user_id;");
    $result = $this->query;

    try{
         $result->execute(["user_id"=>$user_id]);
         $row = $result->fetchAll(PDO::FETCH_ASSOC);
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