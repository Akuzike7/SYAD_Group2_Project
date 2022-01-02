
<form class="addForm" action="../components/CRUD/AddHandler.php" method="POST">
            <button class="close" id="close">&times;</button>
            <h3 id="title">Report Fault</h3>

            <table class="addTable">
                    <tr id="TableHeader">
                        <th>Category</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Phone</th>
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
            <button class="formBtn" id="addBtn" disabled><img src="../../Images/add_list_48px.png" width="15px" alt="" srcset=""></button>
            <button class="formBtn" id="ReportBtn" type="submit" value="addFault" disabled>Report</button>
                   
</form>
   