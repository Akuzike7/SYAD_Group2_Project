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
            require "database.php";
            require "user.php";

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
                   

                   $data = new database;
                   echo $data->checkConnection();
                   $row = $data->getUser($this->email);

                   //setting the user
                   user::$Id = $row["id"];
                   user::$email = $row["$email"];
                   user::$password = $row["$password"];
                   user::$name = $row["firstname"] ." ". $row["lastname"];
                   user::$role = $row["role"];
                   
                   //navigating to dashboard based on user role
                   if($this->password == $row["password"]){
                       if(user::$role == 1){
                            return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                       }
                       if(user::$role == 2){
                            return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                       }
                       if(user::$role == 3){
                            return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                       }
                       if(user::$role == 4){
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
                exit();
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
                $data = new database;
                echo $data->checkConnection();

                //reseting the password
                if(($this->password == $this->cpassword) && (isset($this->password) && isset($this->cpassword))){
                    $update = $data->updateUser($this->email,$this->password);
                }

                $row = $data->getUser($this->email);

                require "database.php";

                //setting the user
                user::$Id = $row["id"];
                user::$email = $row["$email"];
                user::$password = $row["$password"];
                user::$name = $row["firstname"] ." ". $row["lastname"];
                user::$role = $row["role"];

                //navigating to dashboard based on user role
                if($this->password == $row["password"]){
                    if($row['role'] == 1){
                        return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                    }
                    if($row['role'] == 2){
                        return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                    }
                    if($row['role'] == 3){
                        return header("Location: \SYAD_Group2_Project\Routes\client\index.php");
                    }
                    if($row['role'] == 4){
                        return header("Location: \SYAD_Group2_Project\Routes\admin\index.php");
                    }
                }
            }
        }

        public function val()
        {
            if(empty($this->errors)) {
                return true;
            }

            return false;
        }


    }