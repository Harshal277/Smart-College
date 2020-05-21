<?php
    include("Database.php");
    $year = $_GET['year'];
    $tableName = "IT".$year;

    // Create Table
    mysqli_query($con, "DROP TABLE IF EXISTS $tableName");
    mysqli_query($con, "CREATE TABLE $tableName");
    
    if($year){    
    $deptarray = array("CO","ME","EJ","CE","EE");
    if($year == "FY"){
        $dispYear = "FIRST";
    }else if($year == "SY"){
        $dispYear = "SECOND";
    }else{
        $dispYear = "THIRD";
    }
    echo "<div id='showTT'><div id='table'>";
    echo "
        <div class='menu'>
            <button onclick='printTable()'>Print</button>
            <span><i class='fas fa-times' id='close-btn' onclick='closePrint()'></i><span>
        </div>
        <div class='divtable' id='divtable'>
            <div id='printIT'> ";
    echo "  <table cellspacing='0'>
                <tr class='info'><td colspan='8'><h1>SHREE DATTA POLYTECHNIC COLLEGE, DATTANAGAR, SHIROL</h1></td></tr>";
    echo "      <tr class='info'><td colspan='8'><h1>TIME TABLE FOR $dispYear YEAR SEMESTER FOR ALL BRANCHES FOR A.Y. ".date("Y")."</h1></td></tr>";
    echo "      <tr class='titletd'>
                    <td>Time</td>
                    <td>Class</td>
                    <td>Monday</td>
                    <td>Tuesday</td>
                    <td>Wednesday</td>
                    <td>Thursday</td>
                    <td>Friday</td>
                    <td>Saterday</td>  
                </tr>
    ";

    // get count
    if($year == "FY"){
        $tablecount = mysqli_query($con, "SELECT * FROM timetables WHERE semister=1 or semister=2");
    }elseif($year == "SY"){
        $tablecount = mysqli_query($con, "SELECT * FROM timetables WHERE semister=3 or semister=4");
    }elseif($year == "TY"){
        $tablecount = mysqli_query($con, "SELECT * FROM timetables WHERE semister=5 or semister=6");
    }
    $tablecount = mysqli_num_rows($tablecount);
        
    // Main Loop 6 times
    for($time = 1; $time < 7; $time++){
        if($time == 3 or $time == 5){
            $breakstart = $time - 1;
            $timestart = mysqli_query($con, "SELECT * FROM `timeslot` WHERE slot = '$breakstart'");
            $t = mysqli_fetch_array($timestart);
            $ressesstartTime = $t['endtime'];
            
            $timeend = mysqli_query($con, "SELECT * FROM `timeslot` WHERE slot = '$time'");
            $t = mysqli_fetch_array($timeend);
            $ressesendTime = $t['starttime'];

            if($time == 3){
                echo "<tr style='background: #efefef;'><td>$ressesstartTime - $ressesendTime </td><td colspan='7' style='letter-spacing: 20px;'>LUNCH BREAK</td></tr>";
            }
            if($time == 5){
                echo "<tr style='background: #efefef;'><td>$ressesstartTime - $ressesendTime </td><td colspan='7' style='letter-spacing: 20px;'>SHORT BREAK</td></tr>";
            }
        }
        echo "<tr>";
        $slots = mysqli_query($con, "SELECT * FROM `timeslot` WHERE slot = '$time'");
        while($row = mysqli_fetch_array($slots)){
            echo "<td rowspan='$tablecount'>".$row['starttime']." - ".$row['endtime']."</td>";
            // retrive class name
            if($year == "FY"){
                $class = mysqli_query($con, "SELECT * FROM timetables WHERE semister=1 or semister=2");
                while($row = mysqli_fetch_array($class)){
                    getClassData($row['name'],$time);
                }
            }
            elseif($year == "SY"){
                $class = mysqli_query($con, "SELECT * FROM timetables WHERE semister=3 or semister=4");
                while($row = mysqli_fetch_array($class)){
                    getClassData($row['name'],$time);
                }
            }
            elseif($year == "TY"){
                $class = mysqli_query($con, "SELECT * FROM timetables WHERE semister=5 or semister=6");
                while($row = mysqli_fetch_array($class)){
                    getClassData($row['name'],$time);
                }
            }
            elseif($year == "0"){
                $class = mysqli_query($con, "SELECT * FROM timetables WHERE semister=5 or semister=6");
                while($row = mysqli_fetch_array($class)){
                    getClassData($row['name'],$time);
                }
            }
        }
        echo "</tr>";
    }   

    echo "</table> </div>
    </div></div></div>";

}
        function getClassData($class,$time){
            global $con;
            $days = array('MON','THU','WED','THE','FRI','SAT');  
            echo "<td>$class</td>";
            for($d=0;$d<count($days);$d++){
                $day = $days[$d];
                $sub = mysqli_query($con, "SELECT $day FROM $class WHERE slot = $time");
                while($row = mysqli_fetch_array($sub)){
                    echo "<td>".$row[0]."</td>";
                }
            }
            echo "</tr>";
        }    
?>