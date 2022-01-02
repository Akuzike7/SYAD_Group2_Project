<div class="updateForm">
<button class="close" id="close">&times;</button>
            <h3 id="title">Update Fault</h3>

            <table class="addTable">
                    <tr class="formHeader">
                        <th>Category</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                
            </table>

            <label class="formLabel" for="category">Category</label>

            <select name="category" id="category">
                <option class="optCategory" value="General">General</option>
                <option class="optCategory" value="Plumbing">Plumbing</option>
                <option class="optCategory" value="Electronic">Electronic</option>
                <option class="optCategory" value="Welding">Welding</option>
                <option class="optCategory" value="Carpentry">Carpentry</option>
            </select>

            <label class="formLabel" for="description">Description</label>
            <input name="description" id="description">
            <label class="formLabel" for="Location">Location</label>
            <input type="text" name="location" id="Location">
            <label class="formLabel" for="Phone">Phone</label>
            <input type="text" name="Phone" id="Phone">
            <input type="text" name="Status" id="Status">
            <button class="formBtn" id="CancelBtn2" type="submit" value="cancleFault">Cancel</button>
            <button class="formBtn" id="UpdateBtn" type="submit" value="updateFault">Update</button>
 </div>
