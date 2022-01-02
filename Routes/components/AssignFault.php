<form class="assignForm" action="../components/faultHandler.php" method="POST">
        <button class="close" id="close4">&times;</button>
        <h3 id="title">Assign Technician</h3>

        <table id="assignTable">
            <tr class="formHeader">
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
            </tr>

        </table>
        
        <label class="formLabel" for="technician">Technician</label>
        <select name="technician" id="technician"></select>
        <button class="formBtn"id="CancelBtn" type="">Cancel</button>
        <button class="formBtn"id="assignFaultBtn" type="submit">Assign</button>
</form>