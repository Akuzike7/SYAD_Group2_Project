

<form class="assignForm" action="../components/CRUD/AssignHandler.php" method="POST">
        <button class="close" id="close4">&times;</button>
        <h3 id="title">Assign Technician</h3>

        <table class="assignTable">
            <tr id="TableHeader">
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
            </tr>

        </table>
        
        <label class="formLabel" for="technician">Technician</label>
        <select name="technician" id="technician">
            <?php
                $rows = new user;
                $technicians = $rows->getRoleUsers(4);
                
                foreach($technicians as $technician){
                    echo "<option value = \"".$technician["id"]. "\">";
                    echo $technician["firstname"]." ".$technician["lastname"];
                    echo "</option>"; 
                }
            ?>
        </select>
        
        <input type="text" id="list_id" name="list_id" hidden>
        <button class="formBtn" id="CancelBtn" type="">Cancel</button>
        <button class="formBtn" id="assignFaultBtn" type="submit">Assign</button>
</form>