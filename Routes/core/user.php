<?php


class user extends database{
    public $Id;
    public $name;
    public $email;
    public $password;
    public $role;

    //checking user if exist
    public function getUser($email){
        $this->query = "SELECT * FROM users WHERE email= '$email';";
        $result = mysqli_query($this->connection,$this->query);

        if($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        
        return die(mysqli_error($this->connection));
    }

    //updating user password
    public function updateUser($email,$password){
        $this->query = "UPDATE users SET password ='$password' WHERE email= '$email';";
        $result = mysqli_query($this->connection,$this->query);

        if($result){

            return $result;
        }
        
        return die(mysqli_error($this->connection));
    }


    public function deleteUser($email){

    }


    public  function getRole($id){
        $this->query = "SELECT role FROM roles WHERE id = '$id';";
        $result = mysqli_query($this->connection,$this->query);

        if($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        
        return die(mysqli_error($this->connection));

    }
    
}