<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/client.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navBar">

        <div class="Logo">
            <img src="../../Images/Must_Logo.png" width="40px">
            <div class="LogoTitle">
                <h2>Maintenance Portal</h2>
               <div>
                   <h4>Akuzike Nchembe</h4>
                   <h4>Student</h4>  
               </div>
                
            </div>
        </div>
        
        <div class="account">
            <img src="../../Images/male_user.png" width="36px" alt="" srcset="">
            <div>
                <h5>Student</h5>
                <h5>Akuzike Nchembe</h5>
            </div>
        </div>
    </nav>

    <div class="main">
        <div class="statistics">
            
            <select name="years" id="year">
                
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
        <div class="maincontent">
            <div class="left">
            </div>
                        
            <div class="right">
                <button class="dashBtn" onclick="faultForm()">Report fault</button>
            </div>
        </div>
    </div>
    <script src="../../app.js"></script>
</body>
</html>