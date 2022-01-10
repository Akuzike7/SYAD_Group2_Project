

<form class="RemarkForm" action="../components/CRUD/RemarkHandler.php" method="POST">
        <button class="close" id="close5">&times;</button>
        <h3 id="title">RemarkTable</h3>

        <table class="RemarkTable">
            <tr id="TableHeader">
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
                <th>Technician</th>
            </tr>

        </table>
        
        <label class="formLabel" for="remark">Remark</label>
        <textarea class="" id="TxtareaRemark" name="remark" cols="10" rows="10"></textarea>
        
        <input type="text" id="remark_array" name="remark_array" hidden>
        <button class="formBtn" id="CancelBtn5" type="">Cancel</button>
        <button class="formBtn" id="RemarkFaultBtn" type="submit">Remark</button>
</form>