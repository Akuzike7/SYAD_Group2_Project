<?php

class UserFault extends database{
    

    //getting sum of faults reported by specific user
   public function sumUserFaults($role_id){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults INNER JOIN users ON faults.user_id = users.id WHERE role_id = :role_id;");
    $result = $this->query;

    try{
         $result->execute(["role_id"=>$role_id]);
         $row = $result->fetch();
         return $row;
    }
    catch(PDOException $e){
         return "Failed to user faults ".$e->getMessage();
    }
     
}

  //getting all user faults
  public function getUserFaults($user_id){
       
     $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
     INNER JOIN users ON  users.id = faults.user_id
     INNER JOIN fault_category ON fault_category.id = faults.category_id WHERE faults.user_id = :user_id;");
     $result = $this->query;
 
     try{
         $result->execute(["user_id" => $user_id]);
         $row = $result->fetchAll(PDO::FETCH_ASSOC);

         $this->query = $this->checkConnection()->prepare("SELECT users.firstname,users.lastname,fault_technician.fault_id FROM users
         INNER JOIN fault_technician ON  users.id = fault_technician.technician_id
         INNER JOIN faults ON faults.id = fault_technician.fault_id;");
         $result = $this->query;
         $result->execute();
         $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
         
         $faults = [$row,$row2];
         return $faults;

     }
     catch(PDOException $e){
          return false;
     }
     
 
     
 }

   //assigning technician
   public function assignTechnician($id,$technician){
    $this->query = $this->checkConnection()->prepare("INSERT INTO fault_Technician(`fault_id`,`technician_id`) VALUES(:id,:technician);");
    $result = $this->query;
        
     try{
          $result->execute(["id"=>$id,"technician"=>$technician]);
          header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Faults.php");
          return true;
     }
     catch(PDOException $e){
          return "Failed to assign technician ".$e->getMessage();
     }
    
}

   //getting user unassigned faults
   public function getUserUnassignedFaults($user_id){
       
     $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults,fault_technician
     INNER JOIN users ON  users.id = faults.user_id
     INNER JOIN fault_category ON fault_category.id = faults.category_id
     WHERE fault_technician.fault_id != faults.id;");
     $result = $this->query;
 
     try{
         $result->execute(["user_id" => $user_id]);
         $row = $result->fetchAll(PDO::FETCH_ASSOC);

         
         return $row;

     }
     catch(PDOException $e){
          return false;
     }
     
 
     
 }

     //getting user Resolved faults
     public function getUserResolvedFaults($user_id){
       
          $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
          INNER JOIN users ON  users.id = faults.user_id  
          INNER JOIN fault_category ON fault_category.id = faults.category_id
          INNER JOIN fault_technician ON fault_technician.fault_id = faults.id WHERE faults.status = 'Done' AND faults.user_id = :user_id;");
          $result = $this->query;
      
          try{
              $result->execute(["user_id"=>$user_id]);
              $row = $result->fetchAll(PDO::FETCH_ASSOC);
              $this->query = $this->checkConnection()->prepare("SELECT users.firstname,users.lastname,fault_technician.fault_id FROM users INNER JOIN fault_technician ON  users.id = fault_technician.technician_id  INNER JOIN faults ON faults.id = fault_technician.fault_id;");
              $result = $this->query;
              $result->execute();
              $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
              
              $faults = [$row,$row2];
              return $faults;
   
          }
          catch(PDOException $e){
               return false;
          }
          
      
          
      }
      
  //getting all user Unresolved faults
  public function getUserUnresolvedFaults($user_id){
       
     $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
     INNER JOIN users ON  users.id = faults.user_id  
     INNER JOIN fault_category ON fault_category.id = faults.category_id WHERE faults.status != 'Done' AND faults.user_id = :user_id;");
     $result = $this->query;
 
     try{
         $result->execute();
         $row = $result->fetchAll(PDO::FETCH_ASSOC);
         $this->query = $this->checkConnection()->prepare("SELECT users.firstname,users.lastname,fault_technician.fault_id FROM users INNER JOIN fault_technician ON  users.id = fault_technician.technician_id  INNER JOIN faults ON faults.id = fault_technician.fault_id;");
         $result = $this->query;
         $result->execute(["user_id" =>$user_id]);
         $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
         
         $faults = [$row,$row2];
         return $faults;

     }
     catch(PDOException $e){
          return false;
     }
     
 
     
 }
 
    //getting number of faults reported
    public function sumUserFaultsReported($user_id){
     $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE user_id = :user_id");
     $result = $this->query;

     try{
         $result->execute(["user_id" => $user_id]);
         $result = $result->fetch();
         return $result;
     }
     catch(PDOException $e){
          "Failed to get number of faults ".$e->getMessage();
     }
 }

 //getting number of faults reported today
 public function sumUserFaultsReportedToday($user_id){
     $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE DATE(date_created) = CURRENT_DATE() AND user_id = :user_id");
     $result = $this->query;

     try{
         $result->execute(["user_id" => $user_id]);
         $result = $result->fetch();
         return $result;
     }
     catch(PDOException $e){
          "Failed to get number of faults ".$e->getMessage();
     }
 }

 //getting number of faults resolved
 public function sumUserFaultsResolved($user_id){
     $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE Status = 'Done' AND user_id = :user_id");
     $result = $this->query;

     try{
         $result->execute(["user_id" => $user_id]);
         $result = $result->fetch();
         return $result;
     }
     catch(PDOException $e){
          "Failed to get number of faults ".$e->getMessage();
     }
 }

 //getting number of faults resolved today
 public function sumUserFaultsResolvedToday($user_id){
     $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE Status = 'Done' AND DATE(date_created) = CURRENT_DATE() AND user_id = :user_id");
     $result = $this->query;

     try{
         $result->execute(["user_id" => $user_id]);
         $result = $result->fetch();
         return $result;
     }
     catch(PDOException $e){
          "Failed to get number of faults ".$e->getMessage();
     }
 }

 //getting number of faults reported
 public function sumUserFaultsReportedByCategory($category_id,$user_id){
  $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE category_id=:id AND user_id = :user_id");
  $result = $this->query;

  try{
      $result->execute(["id"=>$category_id,"user_id" =>$user_id]);
      $result = $result->fetch();
      return $result;
  }
  catch(PDOException $e){
       "Failed to get number of faults ".$e->getMessage();
  }
}

   


}