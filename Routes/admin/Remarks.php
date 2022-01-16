<?php
    require "../components/AutoLoader.php";
    require_once "../core/database.php";
    require_once "../core/remark.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/style.css">
    <link rel="stylesheet" href="../components/style/Header.css">
    <link rel="stylesheet" href="../../Style/Remark.css">
    <script src="../../javascript/jquery-3.6.0.min.js"></script>
    <script>
        <?php 
            session_start();
            $user = $_SESSION["user_id"];
            $remarks = new remark;
            $remarks = $remarks->getAllRemarks();

            $remarkedFaults = new faults;
            $remarkedFaults = $remarkedFaults->getRemarkedFaults();
        ?>
        $(document).ready(() =>{
            const remarks = document.querySelectorAll(".remark");

            remarks.forEach((element) => {

                let id = "#"+element.id;

            

                $(id).click(() =>{
                    const item = document.getElementById(element.id);
                    const comment = document.getElementById("comment");
                    const messageInput = document.getElementById("messageBtn");

                    comment.removeAttribute("hidden");
                    messageInput.removeAttribute("hidden");

                    let description = item.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.textContent;
                    let location = item.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.textContent;
                    
                    sessionStorage.setItem("remarkId",element.id);
                    $(".remarkmain").load("../components/RemarkAutoLoad.php",{
                        remarkId : element.id,
                        userId : <?php echo $user?>,
                        description : description,
                        location : location,
                        action : 1
                    })

                    
                })
            }),
            $(".remarkmain").on("keypress","#comment", (e) =>{
                const messageInput = document.getElementById("comment");
                
                let rows = parseInt(messageInput.getAttribute("rows"));
                if(e.key =="Enter"){
                    messageInput.setAttribute("rows",++rows);
                }
                if(messageInput.value == ""){
                    messageInput.setAttribute("rows",1);
                }
                
            }),
            $(".remarkmain").on("click","#messageBtn", () =>{
                const messageInput = document.getElementById("comment");

                if(messageInput.value != ""){
                    let user = <?php echo $user?>;
                    let remarkId = sessionStorage.getItem("remarkId");
                    let response = messageInput.value;
                    messageInput.value = null;
    
                    $(".remarkChat").load("../components/RemarkAutoLoad.php",{
                        userId : user,
                        remarkId : remarkId,
                        response : response,
                        action : 2
                    })
                    

                }
            })
        })
       
    </script>
    <title>Remarks</title>
</head>
<body>
   <?php require"../components/Header.php"?>
    <div class="remarkside">
        <div class="remarkSideTab">
            <h5>Remarks</h5>
        </div>
        
        <?php foreach($remarks as $remark):?>
        <div class="remark" id="<?php echo $remark["Rid"] ?>">
            <div class="remarkDetail">
                <div class="RFid">
                    <h4><?php echo "R".$remark["Rid"]?></h4>
                </div>
                <div id="remarkD">
                    <h5><?php echo $remark["description"]?></h5>
                    <h6><?php echo $remark["location"]?></h6>
                </div>
            </div>
            <div class="remarkDetails">
                <h5><?php echo $remark["dateCreated"]?></h5>
            </div>
        </div>
        <?php endforeach?>

    </div>
    <div class="remarkmain">
        
        <div class="remarkChat">
            
        </div>
        <div class="remarkMessagebox">
            <textarea name="comment" id="comment" cols="30" rows="1" placeholder="comment here" hidden></textarea>
            <button id="messageBtn" type="submit"><img src="../../Images/send_comment_48px.png" width="24px" alt="" srcset="" hidden></button>
         </div>
    </div>
    <script src="../../javascript/Remark.js"></script>
</body>
</html>