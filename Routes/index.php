<?php
    require_once "./core/validation.php";
    
    $ResetPassword_directory = 'Reset.php';
    $Register_directory = 'Register.php';
    $valid = new validation();
    
    $form = $valid->ValidateLogin(true);
    
    if(!isset($form)){
        $valid->errors["creditional"] = "Incorrect creditionals";
        
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
    <title>Login</title>
</head>
<body>
    <div class="form">
        <form id="Login" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            
            <div class="LogoSection">
                <img id="Logo" src="../Images/Must_Logo.png" alt="" srcset="">
                <h2>Maintenance Portal</h2> 
            </div>

            <div class="TitleSection">
                <h2 id="title">Login</h2>
            </div>
            
            <div class="fields">
                <label for="mail">Email</label>
                <input type="email" name="Email" id="mail" placeholder="email" required>
            </div>

            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                <?php if(array_key_exists("email",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["email"]; ?></p>
                    <img src="../Images/error_48px.png" width="14px" alt="" srcset="">
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="fields">
                <label for="password">Password</label>
                <input type="password" name="Password" id="password" placeholder="password" required>
            </div>
          
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
                <?php if(array_key_exists("creditional",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["creditional"]; ?></p>
                    <img src="../Images/error_48px.png" width="14px" alt="" srcset="">
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="LoginBtn" >
                <input type="submit" name="submit" value="Login" id="LoginBtn">
            </div>

             <div class="footerHolder">
                 <div class="footer">
                     <a href="<?php echo $ResetPassword_directory ?>">Forgot Password?</a>
                     <img src="../Images/forgot_password_48px.png" onclick="navigate('<?php echo $ResetPassword_directory ?>')" width="20px">
                 </div>
                 <div class="footer">
                     <a href="<?php echo $ResetPassword_directory ?>">Register</a>
                     <img src="../Images/registration_48px.png" onclick="navigate('<?php echo $Register_directory ?>')" width="20px">
                 </div>
             </div>

        </form>
    </div>
    
</body>
</html>