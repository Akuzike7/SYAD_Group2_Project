<?php
    require "./core/database.php";
    require "./core/validation.php";
    
    $Login_directory = 'index.php';
    $valid = new validation();
    
    $form = $valid->validateRegister();
    
    if(!isset($form)){
        $valid->errors["mismatch"] = "mismatch";
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Login.css">
    <script src="../javascript/app.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="form">
        <form id="Register" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            
            <div class="LogoSection">
                <img id="Logo" src="../Images/Must_Logo.png" alt="" srcset="">
                <h2>Maintenance Portal</h2> 
            </div>

            <div class="TitleSection">
                <h2 id="title">Create Account</h2>
            </div>
            
            <div class="fields">
                <label for="fname">Firstname</label>
                <input type="text" name="Fname" id="Fname" placeholder="firstname" required>
            </div>

            <div class="fields">
                <label for="lname">Lastname</label>
                <input type="text" name="Lname" id="Lname" placeholder="lastname" required>
            </div>

            <div class="fields">
                <label for="mail">Email</label>
                <input type="email" name="Email" id="mail" placeholder="email" required>
            </div>
            <div class="fields">
                <label for="phone">Phone</label>
                <input type="text" name="Phone" id="phone" placeholder="phone" required>
            </div>

            <div class="fields">
                <label for="mail">Role</label>
                <select name="Role" id="role">
                    <option value="2">Student</option>
                    <option value="3">Lecturer</option>
                    <option value="4">Technician</option>
                </select>
            </div>

            <div class="fields">
                <label for="password">Password</label>
                <input type="password" name="Password" id="password" placeholder="password" required>
            </div>

            <div class="fields">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="CPassword" id="cpassword" placeholder="confirm password" >
            </div>

            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                <?php if(array_key_exists("email",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["email"]; ?></p>
                    <img src="../Images/error_48px.png" width="14px" alt="" srcset="">
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                <?php if(array_key_exists("email2",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["email2"]; ?></p>
                    <img src="../Images/error_48px.png" width="14px" alt="" srcset="">
                <?php endif; ?>
            </div>
            <?php endif; ?>

           
          
            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                <?php if(array_key_exists("password",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["password"]; ?></p>
                    <img src="../Images/error_48px.png" width="14px" alt="" srcset="">
                <?php endif; ?>
            </div>
            <?php endif; ?>

            

            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                 <?php if(array_key_exists("cpassword",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["cpassword"]; ?></p>
                 <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                <?php if(array_key_exists("mismatch",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["mismatch"]; ?></p>
                    <img src="../Images/error_48px.png" width="14px" alt="" srcset="">
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="LoginBtn" >
                <input type="submit" name="submit" value="Register" id="LoginBtn">
            </div>

            <div class="footer">
                <a href="<?php echo $Login_directory ?>">Login</a>
                <img src="../Images/enter_48px.png" onclick="navigate('<?php echo $Login_directory ?>')" width="20px">
            </div>
        </form>
    </div>
    
</body>
</html>