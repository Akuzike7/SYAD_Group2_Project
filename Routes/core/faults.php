<?php

class faults extends database{

    //getting all faults
    public function getFaults(){
       $table = "faults";
       $table2 = "users";
       $table3 = "fault_technician";
       $table4 = "fault_category";
       $this->query = $this->checkConnection()->prepare("SELECT *,faults.id as fid FROM faults INNER JOIN users ON  users.id = faults.user_id  INNER JOIN fault_category ON fault_category.id = faults.category_id;");
       $result = $this->query;
   
       try{
           $result->execute();
           $row = $result->fetchAll(PDO::FETCH_ASSOC);

           $this->query = $this->checkConnection()->prepare("SELECT users.firstname,users.lastname,faults.id FROM users INNER JOIN fault_technician ON  users.id = fault_technician.technician_id  INNER JOIN faults ON faults.id = fault_technician.fault_id;");
           $result->execute();
           $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
           
           $faults = [$row,$row2];
           return $faults;

       }
       catch(PDOException $e){
            return false;
       }
       
   
       
   }
   


   //inserting fault reported by specific user
   public function reportFault($category,$description,$location,$phone,$user){
       
        $this->query = $this->checkConnection()->prepare("SELECT id FROM fault_category WHERE Category = :category;");
        $category_id = $this->query;

        try{
            $category_id->execute(["category" =>$category]);
            $cat_id = $category_id->fetch(PDO::FETCH_ASSOC);

            $this->query = $this->checkConnection()->prepare("INSERT INTO faults(`category_id`,`description`,`location`,`phone`,`user_id`)
                        VALUES(:category_id,:description,:location,:phone,:user_id)");
            $result = $this->query;
            $result->execute(["category_id"=>$cat_id["id"],"description"=>$description,"location"=>$location,"phone"=>$phone,"user_id"=>$user]);          
            return header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Faults.php ");        
        }
        catch(PDOException $e){
            return "Failed to Report fault ".$e->getMessage();
        }
                        
        
        
   }

   //updating fault reported by specific user
   public function updateFault($id,$category,$description,$location,$phone,$user){
        $this->query = $this->checkConnection()->prepare("SELECT id FROM fault_category WHERE Category = :category;");
        $category_id = $this->query;
        
        try{
            $category_id->execute(["category"=>$category]);
            $cat_id = $category_id->fetch(PDO::FETCH_ASSOC);

            $this->query = $this->checkConnection()->prepare("UPDATE faults SET category_id = :category_id, SET description = :description, SET location = :location,
                        SET phone = :phone, SET user_id = :user WHERE id = :id)");
                        
            $result = $this->query;
            $result->execute(["category_id"=>$cat_id["id"],"description"=>$description,"location"=>$location,"phone"=>$phone,"user"=>$user,"id"=>$id]);
            return true;
        }
        catch(PDOException $e){
            return "Failed to update fault ".$e->getMessage();
        }

        
   }


   //deleting fault reported by specific user
   public function deleteFault($id){
        $this->query = $this->checkConnection()->prepare("DELETE FROM faults WHERE id = :id;");
        $result = $this->query;    
                        
        try{
            $result->execute(["id"=>$id]);
            return true;
        }
        catch(PDOException $e){
            "Failed to delete fault ".$e->getMessage();
        }
   }

   //getting number of faults reported
   public function sumFaultsReported(){
       $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults");
       $result = $this->query;

       try{
           $result->execute();
           $result = $result->fetch();
           return $result;
       }
       catch(PDOException $e){
            "Failed to get number of faults ".$e->getMessage();
       }
   }

   //getting number of faults reported today
   public function sumFaultsReportedToday(){
       $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE DATE(date_created) = CURRENT_DATE()");
       $result = $this->query;

       try{
           $result->execute();
           $result = $result->fetch();
           return $result;
       }
       catch(PDOException $e){
            "Failed to get number of faults ".$e->getMessage();
       }
   }

   //getting number of faults resolved
   public function sumFaultsResolved(){
       $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE Status = 'Done'");
       $result = $this->query;

       try{
           $result->execute();
           $result = $result->fetch();
           return $result;
       }
       catch(PDOException $e){
            "Failed to get number of faults ".$e->getMessage();
       }
   }

   //getting number of faults resolved today
   public function sumFaultsResolvedToday(){
       $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE Status = 'Done' AND DATE(date_created) = CURRENT_DATE()");
       $result = $this->query;

       try{
           $result->execute();
           $result = $result->fetch();
           return $result;
       }
       catch(PDOException $e){
            "Failed to get number of faults ".$e->getMessage();
       }
   }

   //getting number of faults reported
   public function sumFaultsReportedByCategory($category_id){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM faults WHERE category_id=:id");
    $result = $this->query;

    try{
        $result->execute(["id"=>$category_id]);
        $result = $result->fetch();
        return $result;
    }
    catch(PDOException $e){
         "Failed to get number of faults ".$e->getMessage();
    }
}


}

