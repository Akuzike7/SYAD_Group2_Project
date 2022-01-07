<?php
require "AutoLoader.php";
  
echo '<table class="ListFaults">';

echo '<caption class="ListFaultTitle">Fault Activity Section</caption>';
echo '<tr id="header">';
echo '<th id="selectAll"><input type="checkbox" name="" id="selectRadio" value="1"></th>';
echo '<th>Id</th>';
echo '<th>Date</th>';
echo '<th>Category</th>';
echo '<th>Description</th>';
echo '<th>Location</th>';
echo '<th>Technician</th>';
echo '<th>Reported by</th>';
echo '<th>Phone</th>';
echo '<th>Status</th>';
echo '</tr>';

$action = $_POST['action'];

    $faults = new faults;
    

    if($action == '1'){
        $Tables = $faults->getUnassignedFaults();

        if($Tables){
            foreach($Tables as $row){
                echo '<tr id="tableRow">';
                echo '<td id="select"><input type="checkbox" name="selectionBx" id="<?php echo $row["fid"]?>"></td>';
                echo ' <td>'. $row["id"].'</td>';
                echo '<td>'.$row["date_created"].'</td>';
                echo '<td>'. $row["category"].'</td>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td>'.$row["location"].'</td>';
                echo '<td></td>';

                $name = $row["firstname"]." ".$row["lastname"];
        
                echo '<td>'.$name.'</td>';
                echo '<td>'.$row["phone"].'</td>';
                echo '<td>'.$row["status"].'</td>';
                echo '</tr>';
            }
        }

    }
    if($action == '2'){
        $Tables = $faults->getResolvedFaults();

        if($Tables){
            foreach($Tables[0] as $row){
                echo '<tr id="tableRow">';
                echo '<td id="select"><input type="checkbox" name="selectionBx" id="<?php echo $row["fid"]?>"></td>';
                echo ' <td>'. $row["id"].'</td>';
                echo '<td>'.$row["date_created"].'</td>';
                echo '<td>'. $row["category"].'</td>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td>'.$row["location"].'</td>';
                echo '<td>';
                    foreach($Tables[1] as $row2){
                        if($row["id"] == $row2["id"]){
                            echo $row2["firstname"]." ".$row2["lastname"];
                        }
                    }
                echo '</td>';

                $name = $row["firstname"]." ".$row["lastname"];
        
                echo '<td>'.$name.'</td>';
                echo '<td>'.$row["phone"].'</td>';
                echo '<td>'.$row["status"].'</td>';
                echo '</tr>';
            }
        }
    }

    if($action == '3'){
        $Tables = $faults->getUnresolvedFaults();

        if($Tables){
            foreach($Tables[0] as $row){
                echo '<tr id="tableRow">';
                echo '<td id="select"><input type="checkbox" name="selectionBx" id="<?php echo $row["fid"]?>"></td>';
                echo ' <td>'. $row["id"].'</td>';
                echo '<td>'.$row["date_created"].'</td>';
                echo '<td>'. $row["category"].'</td>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td>'.$row["location"].'</td>';
                echo '<td>';
                    foreach($Tables[1] as $row2){
                        if($row["id"] == $row2["id"]){
                            echo $row2["firstname"]." ".$row2["lastname"];
                        }
                    }
                echo '</td>';

                $name = $row["firstname"]." ".$row["lastname"];
        
                echo '<td>'.$name.'</td>';
                echo '<td>'.$row["phone"].'</td>';
                echo '<td>'.$row["status"].'</td>';
                echo '</tr>';
            }
        }
    }
    
    if($action == '4'){
        $Tables = $faults->getRemarkedFaults();

        if($Tables){
            foreach($Tables[0] as $row){
                echo '<tr id="tableRow">';
                echo '<td id="select"><input type="checkbox" name="selectionBx" id="<?php echo $row["fid"]?>"></td>';
                echo ' <td>'. $row["id"].'</td>';
                echo '<td>'.$row["date_created"].'</td>';
                echo '<td>'. $row["category"].'</td>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td>'.$row["location"].'</td>';
                echo '<td>';
                    foreach($Tables[1] as $row2){
                        if($row["id"] == $row2["id"]){
                            echo $row2["firstname"]." ".$row2["lastname"];
                        }
                    }
                echo '</td>';

                $name = $row["firstname"]." ".$row["lastname"];
        
                echo '<td>'.$name.'</td>';
                echo '<td>'.$row["phone"].'</td>';
                echo '<td>'.$row["status"].'</td>';
                echo '</tr>';
            }
        }

    }

    if($action == '5'){
        $Tables = $faults->getFaults();

        if($Tables){
            foreach($Tables[0] as $row){
                echo '<tr id="tableRow">';
                echo '<td id="select"><input type="checkbox" name="selectionBx" id="<?php echo $row["fid"]?>"></td>';
                echo ' <td>'. $row["id"].'</td>';
                echo '<td>'.$row["date_created"].'</td>';
                echo '<td>'. $row["category"].'</td>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td>'.$row["location"].'</td>';
                echo '<td>';
                    foreach($Tables[1] as $row2){
                        if($row["id"] == $row2["id"]){
                            echo $row2["firstname"]." ".$row2["lastname"];
                        }
                    }
                echo '</td>';

                $name = $row["firstname"]." ".$row["lastname"];
        
                echo '<td>'.$name.'</td>';
                echo '<td>'.$row["phone"].'</td>';
                echo '<td>'.$row["status"].'</td>';
                echo '</tr>';
            }
        }

    }



echo '</table>';

?>