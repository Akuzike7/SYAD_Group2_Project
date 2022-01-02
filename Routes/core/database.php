<?php

class database{
    
    public $dbserver = 'localhost';
    public $dbusername = 'root';
    public $dbpassword = 'pa55word';
    public $dbname = 'maintenance-portal';
    public $query;
    public $connection;

    //checking database connection
    public function checkConnection(){
        $this->connection = new mysqli($this->dbserver,$this->dbusername,$this->dbpassword,$this->dbname);
        if(!$this->connection){
            return die(mysqli_error($this->connection));
        }
    }  

    
}