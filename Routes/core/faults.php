<?php

class faults extends database{

    //getting all faults
    public function getFaults(){
       
       $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
       INNER JOIN users ON  users.id = faults.user_id
       INNER JOIN fault_category ON fault_category.id = faults.category_id;");
       $result = $this->query;
   
       try{
           $result->execute();
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
   
   //getting all unassigned faults
    public function getUnassignedFaults(){
       
       $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults,fault_technician
       INNER JOIN users ON  users.id != faults.user_id
       INNER JOIN fault_category ON fault_category.id != faults.category_id;");
       $result = $this->query;
   
       try{
           $result->execute();
           $row = $result->fetchAll(PDO::FETCH_ASSOC);

           
           return $row;

       }
       catch(PDOException $e){
            return false;
       }
       
   
       
   }

    //getting all assigned faults
    public function getAssignedFaults(){
       
       $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
       INNER JOIN users ON  users.id = faults.user_id  
       INNER JOIN fault_category ON fault_category.id = faults.category_id
       INNER JOIN fault_technician ON fault_technician.fault_id = faults.id;");
       $result = $this->query;
   
       try{
           $result->execute();
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

    //getting all Resolved faults
    public function getResolvedFaults(){
       
       $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
       INNER JOIN users ON  users.id = faults.user_id  
       INNER JOIN fault_category ON fault_category.id = faults.category_id
       INNER JOIN fault_technician ON fault_technician.fault_id = faults.id WHERE faults.status = 'Done';");
       $result = $this->query;
   
       try{
           $result->execute();
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


    //getting all Unresolved faults
    public function getUnresolvedFaults(){
       
       $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
       INNER JOIN users ON  users.id = faults.user_id  
       INNER JOIN fault_category ON fault_category.id = faults.category_id WHERE faults.status != 'Done';");
       $result = $this->query;
   
       try{
           $result->execute();
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

  
    //getting all Unresolved faults
    public function getRemarkedFaults(){
       
       $this->query = $this->checkConnection()->prepare("SELECT faults.id,faults.description,faults.location,faults.status,faults.date_created,faults.phone,users.firstname,users.lastname,fault_category.category FROM faults
       INNER JOIN users ON  users.id = faults.user_id  
       INNER JOIN fault_category ON fault_category.id = faults.category_id
       INNER JOIN remarks ON remarks.fault_id = faults.id;");
       $result = $this->query;
   
       try{
           $result->execute();
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
            
            if($user == 1 || $user == 4){
                return header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Faults.php ");        
            }
            else{
                return header("Location: \SYAD_GROUP2_PROJECT\Routes\client\index.php ");
            }
        }
        catch(PDOException $e){
            return "Failed to Report fault ".$e->getMessage();
        }
                        
        
        
   }

   //updating fault reported by specific user
   public function updateFault($id,$category,$description,$location,$status){
        $this->query = $this->checkConnection()->prepare("SELECT id FROM fault_category WHERE Category = :category;");
        $category_id = $this->query;
        
        try{
            $category_id->execute(["category"=>$category]);
            $cat_id = $category_id->fetch(PDO::FETCH_ASSOC);

            $this->query = $this->checkConnection()->prepare("UPDATE faults SET category_id = :category_id, description = :description,  location = :location, status = :status WHERE id = :id;");
                        
            $result = $this->query;
            $result->execute(["category_id"=>$cat_id["id"],"description"=>$description,"location"=>$location,"id"=>$id,"status"=>$status]);

            return header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Faults.php ");
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
            header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Faults.php");
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

//getting faults reported monthly
public function sumMonthlyFaults($month){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) as month FROM faults WHERE MONTH(date_created) = :month AND YEAR(date_created) = YEAR(CURRENT_DATE)");
    $result = $this->query;

    try{
        $result->execute(["month"=>$month]);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    catch(PDOException $e){
         "Failed to get number of faults ".$e->getMessage();
    }
}

//getting faults reported monthly category
public function sumMonthlyCategoryFaults($category_id,$month){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) as month FROM faults WHERE category_id=:id AND MONTH(date_created) = :month AND YEAR(date_created) = YEAR(CURRENT_DATE)");
    $result = $this->query;

    try{
        $result->execute(["id"=>$category_id,"month" => $month]);
        $result = $result->fetch();
        return $result;
    }
    catch(PDOException $e){
         "Failed to get number of faults ".$e->getMessage();
    }
}

//getting faults reported monthly category
public function sumCurrentMonthCategoryFaults($category_id){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) as month FROM faults WHERE category_id=:id AND MONTH(date_created) = MONTH(CURRENT_DATE) AND YEAR(date_created) = YEAR(CURRENT_DATE)");
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

//getting faults reported weekly category
public function sumCurrentWeekCategoryFaults($category_id){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) as week FROM faults WHERE category_id=:id AND WEEK(date_created) = WEEK(CURRENT_DATE) AND YEAR(date_created) = YEAR(CURRENT_DATE)");
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

//getting faults reported weekly category
public function getCurrentWeekCategoryFaults($category_id){
    $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) as week FROM faults WHERE category_id=:id AND WEEK(date_created) = WEEK(CURRENT_DATE) AND YEAR(date_created) = YEAR(CURRENT_DATE)");
    $result = $this->query;

    try{
        $result->execute(["id"=>$category_id]);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    catch(PDOException $e){
         "Failed to get number of faults ".$e->getMessage();
    }
}

//getting current month
public function getCurrentMonth(){
    $this->query = $this->checkConnection()->prepare("SELECT MONTHNAME(CURRENT_DATE) as month;");
    $result = $this->query;

    try{
        $result->execute();
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    catch(PDOException $e){
         "Failed to get number of faults ".$e->getMessage();
    }
}
}

