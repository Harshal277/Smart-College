<?php
    include("Database.php");
    $dept = $_GET['dept'];
    $teachers = mysqli_query($con, "SELECT * FROM teacher WHERE dept = '$dept'");
    echo "Select Teacher <select name=\"teach\" id=\"teach\" style=\"margin:10px;\">";
    while($row = mysqli_fetch_array($teachers)){
        echo "<option value='". $row['abbrivation'] ."'>".$row['first_name']." ".$row['last_name']."</option>";
    }
    echo "</select>";
    echo "<input type='submit' class='btn'>";
?>