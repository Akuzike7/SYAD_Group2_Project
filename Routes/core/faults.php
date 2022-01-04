<?php

class faults extends database{

    //getting all faults
    public function getFaults(){
       $table = "faults";
       $table2 = "users";
       $table3 = "fault_technician";
       $this->query = $this->checkConnection()->prepare("SELECT a.*, firstname,lastname, FROM a.:table,b.:table2 WHERE a.user_id = b.id;");
       $result = $this->query;
   
       try{
           $result->execute(["table"=>$table,"table2"=>$table2,]);
           $row = $result->fetchAll(PDO::FETCH_ASSOC);
           return $row;

       }
       catch(PDOException $e){
            return "Failed to retrive faults".$e->getMessage();
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



}

