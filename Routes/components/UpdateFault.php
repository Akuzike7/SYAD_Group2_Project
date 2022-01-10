<form class="updateForm" action="../components/CRUD/UpdateHandler.php" method="Post">
<button class="close" id="close2">&times;</button>
            <h3 id="title">Update Fault</h3>

            <label class="formLabel" for="id">Id</label>
            <input class="updateInputs" name="id" id="id" readonly>

            <label class="formLabel" for="cate">Category</label>

            <select class="updateInputs" name="cate" id="cate">
                <option class="optCategory" value="General">General</option>
                <option class="optCategory" value="Plumbing">Plumbing</option>
                <option class="optCategory" value="Electronic">Electronic</option>
                <option class="optCategory" value="Welding">Welding</option>
                <option class="optCategory" value="Carpentry">Carpentry</option>
            </select>

            <label class="formLabel" for="descript">Description</label>
            <input class="updateInputs" name="descript" id="descript" readonly>
            <label class="formLabel" for="locate">Location</label>
            <input class="updateInputs" type="text" name="locate" id="locate" readonly>

            <label class="formLabel" for="Status">Status</label>
            <select class="updateInputs" name="Status" id="Status">
                <option class="optCategory" value="Pending">Pending</option>
                <option class="optCategory" value="Done">Done</option>
                <option class="optCategory" value="Resolved">Resolved</option>
            </select>

            <button class="formBtn" id="CancelBtn2" type="submit" value="cancelFault">Cancel</button>
            <button class="formBtn" id="UpdateBtn" type="submit" value="updateFault">Update</button>
</form>
