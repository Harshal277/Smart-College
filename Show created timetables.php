<?php
    include("Database.php");
    include("Functions.php");
    $countRows = 4; 
    echo "<table cellspacing='0'><tr>";
    $tables = mysqli_query($con,"SELECT * FROM `timetables`");
    while($row = mysqli_fetch_array($tables)){
        $tt_sem = $row['semister'];
        $tt_dept = $row['dept'];
        $Cdate = $row['date_created'];
        $table = $tt_dept.$tt_sem."i";
        if(($tt_sem == 1) or ($tt_sem == 2)){
            $class = "FY".$tt_dept;
        }elseif(($tt_sem == 3) or ($tt_sem == 4)){
            $class = "SY".$tt_dept;
        }else{
            $class = "TY".$tt_dept;
        }
        if($countRows==0){
            echo "</tr><tr>";
            $countRows = 4;
        }
        echo "<td id='$class'>";
            cardTimetable($class, $table, $Cdate);
        echo "</td>";
        $countRows--;
    }
    echo "</tr></table>";
?>