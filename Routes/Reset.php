<?php
    require_once "core/database.php";
    require_once "core/validation.php";

    
    $Login_directory = "index.php";  
    $valid = new validation();
    $form = $valid->validateReset();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Login.css">
    <script src="../javascript/app.js"></script>
    <title>Reset Password</title>
</head>
<body>
    <div class="form">
        <form  method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            
            <div class="LogoSection">
                <img id="Logo" src="../Images/Must_Logo.png" alt="" srcset="">
                <h2>Maintenance Portal</h2> 
            </div>

            <div class="TitleSection">
                <h2 id="title">Reset Password</h2>
            </div>
            

            <div class="fields">
                <label for="mail">Email</label>
                <input type="email" name="Email" id="mail" placeholder="email" >
            </div>

            <?php if(!$valid->val() && isset($_POST['submit'])): ?>
            <div class="error">
                 <?php if(array_key_exists("email",$valid->errors)):?>
                    <p style="margin:0 0 0 5px"><?php echo $valid->errors["email"]; ?></p>
                 <?php endif; ?>
            </div>
            <?php endif; ?>


            <div class="LoginBtn" >
                <input type="submit" name="submit" value="Reset" id="LoginBtn">
            </div>

            <div class="footer">
                <a href="<?php echo $Login_directory ?>">Login</a>
                <img src="../Images/enter_48px.png" onclick="navigate('<?php echo $Login_directory ?>')" width="20px" alt="" srcset="">
            </div>
        </form>
    </div>
    <script src="../javascript/reset.js"></script>
</body>
</html>