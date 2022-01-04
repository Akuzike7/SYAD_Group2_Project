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
      /*  $this->connection = new mysqli($this->dbserver,$this->dbusername,$this->dbpassword,$this->dbname);
        
        if(!$this->connection){
            return die(mysqli_error($this->connection));
        }*/
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