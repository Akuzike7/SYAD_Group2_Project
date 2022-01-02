<?php

class faults extends database{

    //getting all faults
    public function getFaults($table){
       $this->query = "SELECT * FROM $table;";
       $result = mysqli_query($this->connection,$this->query);
   
       if($result){
           $row = mysqli_fetch_assoc($result);
           return $row;
       }
   
       return die(mysqli_error($this->connection));
   }
   
   //getting faults reported by specific user
   public function getUserFaults($table,$user_id){
       $this->query = "SELECT * FROM '$table' WHERE user_id = '$user_id';";
       $result = mysqli_query($this->connection,$this->query);
   
       if($result){
           return $result;
       }
   
       return die(mysqli_error($this->connection));
   }

   //inserting fault reported by specific user
   public function reportFault($category,$description,$location,$phone,$user){
       
        $this->query = "SELECT id FROM fault_category WHERE Category = '$category';";
        $category_id = mysqli_query($this->connection,$this->query);
        echo "$category_id";
        $this->query = "INSERT INTO faults(`category_id`,`description`,`location`,`phone`,`user_id`)
                        VALUES('$category_id','$description','$location','$phone','$user')";
                        
        $result = mysqli_query($this->connection,$this->query);
        
        if($result){
            return $result;
        }

        return die(mysqli_error(($this->connection)));
   }

   //updating fault reported by specific user
   public function updateFault($id,$category,$description,$location,$phone,$user){
        $this->query = "SELECT id FROM fault_category WHERE Category = '$category';";
        $category_id = mysqli_query($this->connection,$this->query);

        $this->query = "UPDATE faults SET category_id = '$category_id', SET description = '$description', SET location = '$location',
                        SET phone = '$phone', SET user_id = '$user' WHERE id = '$id')";
                        
        $result = mysqli_query($this->connection,$this->query);
        echo "$category_id,$description,$location,$phone,$user";
        if($result){
            return $result;
        }

        return die(mysqli_error(($this->connection)));
   }


   //deleting fault reported by specific user
   public function deleteFault($id){
        $this->query = "DELETE FROM faults WHERE id = '$id';";
            
                        
        $result = mysqli_query($this->connection,$this->query);

        if($result){
            return $result;
        }

        return die(mysqli_error(($this->connection)));
   }


   //assigning technician
   public function assignTechnician($id,$technician){
        $this->query = "INSERT INTO fault_Technician(`fault_id`,`technician_id`) VALUES('$id','$technician');";
            
        
        $result = mysqli_query($this->connection,$this->query);

        if($result){
            return $result;
        }

        return die(mysqli_error(($this->connection)));
   }
}

