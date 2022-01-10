
<?php
    require_once "../core/database.php";
    require_once "../core/remark.php";

      $action = $_POST["action"];     

     if($action == 1){
        $remarkId = $_POST["remarkId"];
        $messages = new remark;
        $messages = $messages->getSpecificRemark($remarkId);
        $user = $_POST["userId"];
        
        $description = $_POST["description"];
        $location = $_POST["location"];
        $dateCreated;
        if(!empty($messages)){
          $dateCreated = $messages[0]["dateCreated"];

        }
        else{
          $dateCreated = new remark;
          $dateCreated = $dateCreated->getRemarkDate($remarkId);
          $dateCreated = $dateCreated["dateCreated"];
          
        }

     
        echo '<div class="remarkTitle">';
        echo '<div class="Fid">R'.$remarkId.'</div>';
        echo '<h5>'.$description.'</h5>';
        echo '<h5>'.$location.'</h5>';
        echo '<h5>'.$dateCreated.'</h5>';
        echo '</div>';
        echo '<div class="remarkChat">';
        
        
        

        if(!empty($messages)){
          
          if($messages[0]["user"] == $user){
            echo '<div class="outgoingMsg">';
            echo '<p>'.$messages[0]["remark"].'</p>';
            echo '<h6>'.$messages[0]["dateCreated"].'</h6>';
            echo '</div>';
          }

          foreach($messages as $message){
            if($message["user_id"] == $user){
              echo '<div class="outgoingMsg">';
              echo '<p>'.$message["response"].'</p>';
              echo '<h6>'.$message["date_created"].'</h6>';
              echo '</div>';
            }
            else{
              echo '<div class="incomingMsg">';
              echo '<p>'.$message["response"].'</p>';
              echo '<h6>'.$message["date_created"].'</h6>';
              echo '</div>';
            }
          }

        }

        
        echo '</div>';
        echo '</div>';
        echo '<div class="remarkMessagebox">';
        echo '<textarea name="comment" id="comment" cols="30" rows="1" placeholder="comment here"></textarea>';
        echo '<button id="messageBtn"><img src="../../Images/send_comment_48px.png" width="24px" alt="" srcset=""></button>';
        echo '</div>';
     }
     
     if($action == 2){

        $remarkId = $_POST["remarkId"];
        $user = $_POST["userId"];
        $response = $_POST["response"];

        $comment = new remark;
        $comment = $comment->respondRemark($remarkId,$response,$user);

        $messages = new remark;
        $messages = $messages->getSpecificRemark($remarkId);

  
        
        

        if(!empty($messages)){
          
          if($messages[0]["user"] == $user){
            echo '<div class="outgoingMsg">';
            echo '<p>'.$messages[0]["remark"].'</p>';
            echo '<h6>'.$messages[0]["dateCreated"].'</h6>';
            echo '</div>';
          }

          foreach($messages as $message){
            if($message["user_id"] == $user){
              echo '<div class="outgoingMsg">';
              echo '<p>'.$message["response"].'</p>';
              echo '<h6>'.$message["date_created"].'</h6>';
              echo '</div>';
            }
            else{
              echo '<div class="incomingMsg">';
              echo '<p>'.$message["response"].'</p>';
              echo '<h6>'.$message["date_created"].'</h6>';
              echo '</div>';
            }
          }

        }

        
        echo '</div>';
        echo '</div>';
        
        
      }
      echo '</div>';
    
  
      
     

    