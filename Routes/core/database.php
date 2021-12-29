<?php

class database{
    
    public $server = 'localhost';
    public $username = 'root';
    public $password = 'pa55word';
    public $name = 'maintenance-portal';
    public $query;
    public $connection;

    //checking database connection
    public function checkConnection(){
        $this->connection = new mysqli('localhost','root','pa55word','maintenance-portal');
        if(!$this->connection){
            return die(mysqli_error($this->connection));
        }
    }

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
        $this->query = "SELECT * FROM $table WHERE user_id = $user_id;";
        $result = mysqli_query($this->connection,$this->query);

        if($result){
            return $result;
        }

        return die(mysqli_error($this->connection));
    }

    

    
}