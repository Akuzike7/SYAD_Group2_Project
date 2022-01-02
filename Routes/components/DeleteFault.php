<form class="deleteForm" action="./faultHandler.php" method="POST" >
        <button class="close" id="close4">&times;</button>
        <h3 id="title">Delete Faults</h3>
        <table id="assignTable">
            <tr id="header">
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
            </tr>

        </table>
        <label class="formLabel" for="category">Technician</label>
        <input type="text" name="category" id="categoryInput"disabled>
        <input type="text" name="description" id="descriptionInput"disabled>
        <button class="formBtn"id="Cancel3Btn" type="">Cancel></button>
        <button class="formBtn"id="deleteFaultBtn" type="submit">Delete</button>
</form>
