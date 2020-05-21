<?php
    include("Database.php");
    $days = array('MON','THU','WED','THE','FRI','SAT');                
    $sub = $_GET['sub'];
    $dept = $_GET['dept'];
    $id = $_GET['id'];
    $day = substr($id,1,1);
    $day = $days[$day-1];
    $slot = substr($id,6,1);
    $sem = $_GET['sem'];
    $abb = "";

    $abbsub = mysqli_query($con,"SELECT `teach_abb` FROM allocation WHERE `sub_abb` = '$sub'");
    while ($row = mysqli_fetch_array($abbsub)) {
        $abb = $row[0];
    }

    $timetables = mysqli_query($con, "SELECT * FROM timetables");
    while ($row = mysqli_fetch_array($timetables)) {
        $createdTables[] = $row['name'];
        $thistable = $createdTables[count($createdTables)-1];
    }
    unset($createdTables[count($createdTables)-1]);

    $ttcount = mysqli_num_rows($timetables);        
    if($ttcount > 0){                
        $countTables = count($createdTables);
        $indexTable = 0;
        while($indexTable < $countTables){
            $tname = $createdTables[$indexTable];
            $tableCheck = mysqli_query($con, "SELECT $day FROM $tname WHERE slot = $slot ");
            while ($row = mysqli_fetch_array($tableCheck)) {
                $teacher = $row[0];
            }
            $teacher = substr($teacher,4,3);
            if(strcmp($abb, $teacher) == 0 ){       // if equal
                showDrop();
                return;
            }
            else{
                $indexTable++;
            }            
        }
        saveTable($day,$sem,5,$sub,$abb,'T',$slot,$dept);
        echo "$sub <br>($abb)";
    }
    if($ttcount == 0){
        saveTable($day,$sem,5,$sub,$abb,'T',$slot,$dept);        
        echo "$sub <br>($abb)";
    }

    function saveTable($day,$sem,$no,$sub,$teacher,$st,$slot,$dept){
        global $con;
        $dept = strtolower($dept);
        $dept = trim($dept, "''");
        $nm = $sub."($teacher)";
        if($st=="T")
            $update = mysqli_query($con, "UPDATE $dept".$sem."i SET `$day` = '$nm' WHERE `slot` = '$slot'");
        if($st=="P")
            $update = mysqli_query($con, "UPDATE $dept".$sem."i SET `$day` = '$nm-P' WHERE `slot` = '$slot'");
            $no++;
            $update = mysqli_query($con, "UPDATE $dept".$sem."i SET `$day` = '$nm-P' WHERE `slot` = '$slot'");
    }

    function showDrop(){
        global $sem, $sub, $con, $id, $dept;
        $subarr = array();
        echo "<select id='$id' onchange='checkOverlap(this.value,this)' style='border:1px solid #f00;'>";
        $semSub = mysqli_query($con, "SELECT abbrivation FROM subject WHERE sem = $sem AND dept = $dept");
        while ($row = mysqli_fetch_array($semSub)) {
            $subarr[] = $row["abbrivation"];
        }
        for($i=0;$i<count($subarr);$i++){
            if($sub==$subarr[$i]){
                echo "<option value='$sub' selected>$subarr[$i]</option>";
            }
            else{
                echo "<option value='$subarr[$i]'>$subarr[$i]</option>";
            }
        }
        echo "</select>";
    }
?>