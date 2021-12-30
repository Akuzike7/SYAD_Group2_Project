<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/remark.css">
    <title>Remarks</title>
</head>
<body>
    <nav class="nav_bar">
        <div class="logo">
            <img src="../../Images/Must_Logo.png" width="60px" alt="" srcset="">
            <h4 class="logoTitle">
                Maintenance Portal
            </h4>
        </div>

        <div class="user">
            <h4>Akuzike Nchembe</h4>
            <h4>Student</h4>
        </div>

        <div class="links">
            <a class="navLink" href="./index.php">Dashboard</a>
            <a class="navLink" href="./Faults.php">Faults</a>
            <a class="navLink" href="./Report.php">Reports</a>
            
        </div>
    </nav>
    <div class="remarkside">
        <div class="remarkSideTab">
            <h5>Remarks</h5>
        </div>
        <div class="remark">
            <div class="remarkDetail">
                <div class="RFid">
                    <h4>R1</h4>
                </div>
                <div id="remarkD">
                    <h5>Broken urinal</h5>
                    <h6>we tried fixing it</h6>
                </div>
            </div>
            <div class="remarkDetails">
                <h5>9:23 am</h5>
            </div>
        </div>
    </div>
    <div class="remarkmain">
        <div class="remarkTitle">
            <div class="Fid">R1</div>
            <h5>Broken urinal</h5>
            <h5>9:23 am</h5>
        </div>
        <div class="remarkChat">
            <div class="outgoingMsg">
                <p>hey</p>
                <h6>9:00 PM</h6>
            </div>
            <div class="incomingMsg">
                <p>hi</p>
                <h6>9:02 PM</h6>
            </div>
        </div>
        <div class="remarkMessagebox">
            <textarea name="comment" id="comment" cols="30" rows="1" placeholder="comment here"></textarea>
            <button id="messageBtn"><img src="../../Images/send_comment_48px.png" width="24px" alt="" srcset=""></button>
        </div>
    </div>
    <script src="../../javascript/Remark.js"></script>
</body>
</html>