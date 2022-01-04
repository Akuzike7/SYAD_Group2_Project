<?php

class validation{
        
        private $email;
        private $password;
        private $cpassword;
        private $token;
        public $errors = [];
        
        
                 
        //cleaning the user input for security
        public function Sanitize($input){
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);

            return $input;
        }



        public function ValidateLogin($login)
        {
            require_once "database.php";
            require_once "user.php";

            //login validation
            if($login) {
                if(empty($_POST['Email']) || !isset($_POST['Email'])) {
                    $this->errors["email"] = "Email is required ";
                }

                if(empty($_POST['Password']) || !isset($_POST['Password'])) {
                    $this->errors["password"] = "Password is required ";
                }

                if(isset($_POST['Email']) && isset($_POST['Password'])){
                    $this->email = $this->Sanitize($_POST['Email']);
                    $this->password = $this->Sanitize($_POST['Password']);
                }
                

                if(empty($this->errors)){
                   
                   //getting user details 
                   

                   $data = new user;
                   echo $data->checkConnection();
                   $row = $data->getUser($this->email);

                   //setting the user
                   if(isset($row["password"])){
                       session_start();
                       $_SESSION["user_id"] = $row["id"];
                       $_SESSION["email"] = $row["email"];
                       $_SESSION["password"] = $row["password"];
                       $_SESSION["name"] = $row["firstname"] ." ". $row["lastname"];
                       $_SESSION["role"] = $row["role"];
                       $_SESSION["roleName"] = $data->getRole($_SESSION["role"]);

                   }
                   else{
                       header("Location: \SYAD_Group2_Project\Routes\index.php");
                       
                   }
                   

                   //navigating to dashboard based on user role
                   if($this->password == $row["password"]){ 


                       if($_SESSION["role"] == 1){
                            return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                       }
                       if($_SESSION["role"] == 2){
                            return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                       }
                       if($_SESSION["role"] == 3){
                            return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                       }
                       if($_SESSION["role"] == 4){
                            return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                       }
                   }
                   else{
                       return  false;
                   }
                    
                }
                
            }

           
            

        }
        
        public function validateReset(){
            
            //reset password validation
            if(empty($_POST['Email']) || !isset($_POST['Email'])) {
                $this->errors["email"] = "Email is required ";
               
            }

            

            
        }

        public function validateResetPassword(){
            
            if(empty($_POST['Password']) || !isset($_POST['Password'])) {
                $this->errors['password'] = "Password is required ";
            }

            if(empty($_POST['CPassword']) || !isset($_POST['CPassword'])) {
                $this->errors['cpassword'] = "Confirm Password is required ";
            }

            if(!($this->password == $this->cpassword)){
                $this->errors['mismatch'] = "password and confirm password do not match";
            }

            //cleaning user input for security
            if(isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['CPassword'])){
                $this->email = $this->Sanitize($_POST['Email']);
                $this->password = $this->Sanitize($_POST['Password']);
                $this->cpassword = $this->Sanitize($_POST['CPassword']);
            }

            if(empty($this->errors)){
                $data = new user;
                echo $data->checkConnection();

                //reseting the password
                if(($this->password == $this->cpassword) && (isset($this->password) && isset($this->cpassword))){
                    $update = $data->updateUser($this->email,$this->password);
                }

                $row = $data->getUser($this->email);

                require_once "database.php";

                //setting the user
                session_start();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["name"] = $row["firstname"] ." ". $row["lastname"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["roleName"] = $data->getRole($_SESSION["role"]);

                //navigating to dashboard based on user role
                if($this->password == $row["password"]){
                    if($_SESSION["role"] == 1){
                        return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                    }
                    if($_SESSION["role"] == 2){
                        return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                    }
                    if($_SESSION["role"] == 3){
                        return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                    }
                    if($_SESSION["role"] == 4){
                        return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                    }
                }
            }
        }

        public function validateRegister(){

        }
        
        public function val()
        {
            if(empty($this->errors)) {
                return true;
            }

            return false;
        }


    }