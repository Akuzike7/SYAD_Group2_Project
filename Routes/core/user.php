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
            return false;
        }
        
        
        
    }

    //register a new user
    public function registerUser($firstname,$lastname,$password,$phone,$email,$role){
        $this->query = $this->checkConnection()->prepare("INSERT INTO users(`firstname`,`lastname`,`password`,`phone`,`email`,`role`) VALUES(:fname,:lname,:password,:phone,:email,:role)");
        $result = $this->query;
        
        try{
            $result->execute(["fname"=>$firstname,"lname"=>$lastname,"password"=>$password,"phone"=>$phone,"email"=>$email,"role"=>$role]);    
            return true;

        }
        catch(PDOException $e){
            return false;
        }
        
        
        
    }

    //getting userName
    public function getUserName($id){
        $this->query = $this->checkConnection()->prepare("SELECT * FROM users WHERE id = :id;");
        $result = $this->query;
        
        try{
            $result->execute(["id"=>$id]);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;

        }
        catch(PDOException $e){
            return "Failed to get username ".$e->getMessage();
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
            return false;
        }
    }

    //deleting user
    public function deleteUser($email){
        $this->query = $this->checkConnection()->prepare("DELETE users WHERE email= :email;");
        $result = $this->query;
        
        try{
            $result->execute(["email"=>$email]);
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

    //getting role of user
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

    //getting number of users of different roles
    public function sumUsers($user){
        $this->query = $this->checkConnection()->prepare("SELECT COUNT(*) FROM users WHERE role_id = :id;");
        $result = $this->query;
        
        try{
            $result->execute(["id"=>$user]);
            $row = $result->fetch();
            return $row;

        }
        catch(PDOException $e){
            return "Failed to get username ".$e->getMessage();
        }
    }

    //getting all of users of different roles
    public function getRoleUsers($role){
        $this->query = $this->checkConnection()->prepare("SELECT * FROM users WHERE role_id = :id;");
        $result = $this->query;
        
        try{
            $result->execute(["id"=>$role]);
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        }
        catch(PDOException $e){
            return "Failed to get username ".$e->getMessage();
        }
    }
    
}