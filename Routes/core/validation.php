<?php

class validation{
        
        private $email;
        private $password;
        private $hashedPassword;
        private $cpassword;
        private $firstname;
        private $lastname;
        private $role;
        private $phone;
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
                   return $this->errors["email"] = "Email is required ";
                }

                if(empty($_POST['Password']) || !isset($_POST['Password'])) {
                   return $this->errors["password"] = "Password is required ";
                }

                if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                    return $this->errors["email2"] = "Invalid email format"; 
                }

                if(isset($_POST['Email']) && isset($_POST['Password'])){
                    $this->email = $this->Sanitize($_POST['Email']);
                    $this->password = $this->Sanitize($_POST['Password']);
                }
                

                if(empty($this->errors)){
                   
                   //getting user details 
                   

                   $data = new user;
                   $data->checkConnection();

                   $row = $data->getUser($this->email);
                   
                   if(!$row){
                        return  $this->errors["creditinals"] = "incorrect creditinals";
                   }

                   //navigating to dashboard based on user role
                   if(password_verify($this->password,$row["password"])){ 
                        session_start();
                        $_SESSION["user_id"] = $row["id"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["password"] = $row["password"];
                        $_SESSION["name"] = $row["firstname"] ." ". $row["lastname"];
                        $_SESSION["role"] = $row["role_id"];
                        $_SESSION["roleName"] = $data->getRole($_SESSION["role"]);

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
                       return  $this->errors["creditinals"] = "incorrect creditinals";
                   }
                    
                }
                
            }

           
            

        }
        
        public function validateReset(){
            
            //reset password validation
            if(empty($_POST['Email']) || !isset($_POST['Email'])) {
                return $this->errors["email"] = "Email is required ";
               
            }
           
            if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                return $this->errors["email2"] = "Invalid email format"; 
            }
            session_start();
            $_SESSION["email"] = $_POST["Email"];

            return header("Location: \SYAD_GROUP2_Project\Routes\ResetPassword.php ");

            
        }
        

        public function validateResetPassword(){
            require_once "database.php";
            require_once "user.php";

            if(empty($_POST['Password']) || !isset($_POST['Password'])) {
               return $this->errors['password'] = "Password is required ";
            }

            if(empty($_POST['CPassword']) || !isset($_POST['CPassword'])) {
               return $this->errors['cpassword'] = "Confirm Password is required ";
            }

            if(!($this->password == $this->cpassword)){
              return  $this->errors['mismatch'] = "password and confirm password do not match";
            }

            //cleaning user input for security
            if(isset($_POST['Password']) && isset($_POST['CPassword'])){
                session_start();
                $this->email = $this->Sanitize($_SESSION["email"]);
                $this->password = $this->Sanitize($_POST['Password']);
                $this->cpassword = $this->Sanitize($_POST['CPassword']);
            }

            if(empty($this->errors)){
                   $data = new user;
                   $data->checkConnection();
                   
               
                   

                //reseting the password
                if(($this->password == $this->cpassword) && (isset($this->password) && isset($this->cpassword))){
                    $this->hashedPassword = password_hash($this->password,PASSWORD_DEFAULT);
                    $update = $data->updateUser($this->email,$this->hashedPassword);

                    $row = $data->getUser($this->email);

                    //navigating to dashboard based on user role
                   if(password_verify($this->password,$row["password"])){ 
                        
                        $_SESSION["user_id"] = $row["id"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["password"] = $row["password"];
                        $_SESSION["name"] = $row["firstname"] ." ". $row["lastname"];
                        $_SESSION["role"] = $row["role_id"];
                        $_SESSION["roleName"] = $data->getRole($_SESSION["role"]);

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
                        return  $this->errors["creditinals"] = "incorrect creditinals";
                    }
                    
                }

                   

                   
            }
        }

        public function validateRegister(){
            require_once "database.php";
            require_once "user.php";

            if(empty($_POST['Fname']) || !isset($_POST['Fname'])) {
                return $this->errors["fname"] = "firstname is required ";
            }

            if(empty($_POST['Lname']) || !isset($_POST['Lname'])) {
                return $this->errors["lname"] = "Lastname is required ";
            }

            if(empty($_POST['Email']) || !isset($_POST['Email'])) {
                return $this->errors["email"] = "Email is required ";
            }

            if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                return $this->errors["email2"] = "Invalid email format"; 
            }

            if(empty($_POST['Password']) || !isset($_POST['Password'])) {
                return $this->errors["password"] = "Password is required ";
            }

            if(empty($_POST['CPassword']) || !isset($_POST['CPassword'])) {
                return $this->errors["cpassword"] = "Confirm Password is required ";
            }

            if(empty($_POST['Phone']) || !isset($_POST['Phone'])) {
                return $this->errors["phone"] = "Phone nnumber is required ";
            }

            if(!($this->password == $this->cpassword)){
                return $this->errors["mismatch"] = "password and confirm password do not match";
            }
            
            if(empty($this->errors)){
                if(isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['CPassword'])&& isset($_POST['Role']) && isset($_POST['Phone'])){

                    $this->email = $this->Sanitize($_POST['Email']);
                    $this->firstname = $this->Sanitize($_POST["Fname"]);
                    $this->lastname = $this->Sanitize($_POST["Lname"]);
                    $this->role = $this->Sanitize($_POST["Role"]);
                    $this->phone = $this->Sanitize($_POST["Phone"]);
                    $this->password = $this->Sanitize($_POST["Password"]);
                    $this->hashedPassword = password_hash($this->password,PASSWORD_DEFAULT);

                    $user = new user;
                    $user = $user->registerUser($this->firstname,$this->lastname,$this->hashedPassword,$this->phone,$this->email,$this->role);
                }

                
                $data = new user;
                $row = $data->getUser($this->email);

                session_start();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["name"] = $row["firstname"] ." ". $row["lastname"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["roleName"] = $data->getRole($_SESSION["role"]);

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
        
        public function val()
        {
            if(empty($this->errors)) {
                return true;
            }

            return false;
        }


    }