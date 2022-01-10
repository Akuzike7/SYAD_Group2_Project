<form class="deleteForm" action="../components/CRUD/DeleteHandle.php" method="POST" >
        <button class="close" id="close3">&times;</button>
        <h3 id="title">Delete Faults</h3>
        <table class="deleteTable">
            <tr id="deleteHeader">
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
            </tr>

        </table>
        
        <input  type="text" name="list_id" id="list_ids2" hidden>
        <button class="formBtn" id="CancelBtn3" type="">Cancel</button>
        <button class="formBtn" id="deleteFaultBtn" type="submit">Delete</button>
</form>
