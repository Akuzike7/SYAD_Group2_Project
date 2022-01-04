<?php

class database{
    
    private $dbserver;
    private $dbusername;
    private $dbpassword;
    private $dbname;
    private $charset;
    public $query;
    public $connection;
    

    //checking database connection
    public function checkConnection(){
      
        $this->dbserver = 'localhost';
        $this->dbusername = 'root';
        $this->dbpassword = 'pa55word';
        $this->dbname = 'maintenance-portal';
        $this->charset = 'utf8mb4';
        
        try{
            $dsn = "mysql:host=".$this->dbserver.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn,$this->dbusername,$this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e){
            echo "connection failed: ".$e->getMessage();
        }
        
    }  

    
}