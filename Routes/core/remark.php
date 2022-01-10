<?php

class remark extends database{

    public function makeRemark($user_id,$fault_id,$remark){
        try{
            $this->query = $this->checkConnection()->prepare("INSERT INTO remarks(`user_id`,`fault_id`,`remark`)
                        VALUES(:user_id,:fault_id,:remark)");
            $result = $this->query;
            $result->execute(["user_id"=>$user_id,"fault_id"=>$fault_id,"remark"=>$remark]); 
                     
            return header("Location: \SYAD_GROUP2_PROJECT\Routes\admin\Remarks.php ");        
        }
        catch(PDOException $e){
            return "Failed to Report fault ".$e->getMessage();
        }
                

    }

    public function getAllRemarks(){

        try{
            $this->query = $this->checkConnection()->prepare("SELECT remarks.id as Rid,remarks.user_id,remark,remarks.dateCreated,remarks.fault_id,faults.description,faults.location FROM `remarks` INNER JOIN faults ON remarks.fault_id = faults.id
            INNER JOIN users ON users.id = remarks.user_id;");
            $result = $this->query;

            $result->execute();
            $results = $result->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            return $e->getMessage;
        }
    }

    public function getSpecificRemark($remarkId){
        try{
            $this->query = $this->checkConnection()->prepare("SELECT remark,remarks.user_id as user, remarks.dateCreated,remark_response.user_id,remark_response.date_created,response FROM remarks INNER JOIN remark_response ON remarks.id = remark_response.remark_id WHERE remarks.id = :remarkId;");
            $results = $this->query;

            $results->execute(["remarkId" => $remarkId]);
            $results = $results->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
           return $this->$e->getMessage;
        }
    }
    
    public function getRemarkDate($remarkId){
        try{
            $this->query = $this->checkConnection()->prepare("SELECT dateCreated FROM remarks WHERE id = :remarkId");
            $result = $this->query;

            $result->execute(["remarkId" => $remarkId]);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e){
            return $this->$e->getMessage;
        }
    }

    public function respondRemark($remarkId,$response,$userId){
        try{
            $this->query = $this->checkConnection()->prepare("INSERT INTO remark_response(`user_id`,`remark_id`,`response`) VALUES(:user_id,:remark_id,:response)");
            $results = $this->query;

            $results->execute(["remark_id" => $remarkId,"user_id" => $userId,"response" => $response]);
            return true;
        }
        catch(PDOException $e){
            return $this->$e->getMessage;
        }
    }
    
}