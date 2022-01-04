<?php


class user extends database{
    public $Id;
    public $name;
    public $email;
    public $password;
    public $role;

    //checking user if exist
    public function getUser($email){
        $this->query = $this->checkConnection()->prepare("SELECT * FROM users WHERE email = :email;");
        $result = $this->query;
        
        try{
            $result->execute(["email"=>$email]);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;

        }
        catch(PDOException $e){
            return "Incorrect creditinals ".$e->getMessage();
        }
        
        
        
    }

    //updating user password
    public function updateUser($email,$password){
        $this->query = $this->checkConnection()->prepare("UPDATE users SET password = :password WHERE email= :email;");
        $result = $this->query;
        
        try{
            $result->execute(["password"=>$password,"email"=>$email]);
            return true;
        }
        catch(PDOException $e){
            return "Failed to update".$e->getMessage();
        }
    }


    public function deleteUser($email){
        $this->query = $this->checkConnection()->prepare("DELETE users WHERE email= :email;");
        $result = $this->query;
        
        try{
            $result->execute(["email"=>$email]);
            return true;
        }
        catch(PDOException $e){
            return "Failed to delete".$e->getMessage();
        }
    }


    public  function getRole($id){
        $this->query = $this->checkConnection()->prepare("SELECT role FROM roles WHERE id = :id;");
        $result = $this->query;
        
        try{
            $result->execute(["id"=>$id]);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row["role"];
        }
        catch(PDOException $e){
            return "Failed to get role".$e->getMessage();
        }
        
        

    }
    
}